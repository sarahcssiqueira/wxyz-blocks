<?php
/**
 * WP-CLI command to duplicate a block folder.
 *
 * Usage: wp wxyz block duplicate --from=block-w --to=block-new --title="Block New"
 */

namespace WXYZBlocks\CLI;

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

use WP_CLI;
use WP_CLI\Utils;

class BlockCommand {

	/**
	 * Duplicate a block folder under /blocks.
	 *
	 * ## OPTIONS
	 *
	 * [--from=<slug>]
	 * : Source block folder slug (existing folder under /blocks).
	 *
	 * [--to=<slug>]
	 * : Destination block folder slug (new folder under /blocks).
	 *
	 * [--title=<title>]
	 * : New block title (defaults to destination slug).
	 *
	 * [--namespace=<ns>]
	 * : Block namespace for block.json "name" (defaults to "wxyz").
	 *
	 * ## EXAMPLES
	 *
	 *   wp wxyz block duplicate --from=block-w --to=block-hero --title="Hero"
	 *
	 * @when after_wp_load
	 */
	public function duplicate( $args, $assoc_args ) {
		$from      = $assoc_args['from'] ?? '';
		$to        = $assoc_args['to'] ?? '';
		$title     = $assoc_args['title'] ?? '';
		$namespace = $assoc_args['namespace'] ?? 'wxyz';

		if ( $from === '' || $to === '' ) {
			WP_CLI::error( 'Missing required args. Use: --from=<slug> --to=<slug>' );
		}

		$this->assert_valid_slug( $from, '--from' );
		$this->assert_valid_slug( $to, '--to' );

		$blocks_dir = trailingslashit( plugin_dir_path( dirname( __FILE__, 2 ) ) ) . 'blocks/';

		$src = $blocks_dir . $from;
		$dst = $blocks_dir . $to;

		if ( ! is_dir( $src ) ) {
			WP_CLI::error( "Source block folder not found: {$src}" );
		}
		if ( file_exists( $dst ) ) {
			WP_CLI::error( "Destination already exists: {$dst}" );
		}

		WP_CLI::log( "Copying {$src} -> {$dst}" );
		$this->copy_dir( $src, $dst );

		// Update block.json if present.
		$block_json_path = $dst . '/block.json';
		if ( file_exists( $block_json_path ) ) {
			$json = json_decode( file_get_contents( $block_json_path ), true );
			if ( ! is_array( $json ) ) {
				WP_CLI::warning( "block.json exists but could not be parsed: {$block_json_path}" );
			} else {
				$new_title = $title !== '' ? $title : $this->humanize_slug( $to );

				// Update common keys.
				$json['name']  = "{$namespace}/{$to}";
				$json['title'] = $new_title;

				// If your blocks use a shared category, keep it:
				// $json['category'] = $json['category'] ?? 'wxyz-blocks';

				file_put_contents(
					$block_json_path,
					wp_json_encode( $json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . PHP_EOL
				);

				WP_CLI::success( "Updated block.json name/title for {$to}" );
			}
		} else {
			WP_CLI::warning( 'No block.json found in destination; copied folder as-is.' );
		}

		WP_CLI::success( 'Block duplicated. Next: run your build (e.g. npm run build) if needed.' );
	}

	private function assert_valid_slug( string $slug, string $flag_name ): void {
		// Allow lowercase letters, numbers, dashes only.
		if ( ! preg_match( '/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug ) ) {
			WP_CLI::error( "{$flag_name} must be a slug like 'block-hero' (lowercase, numbers, hyphens)." );
		}
	}

	private function humanize_slug( string $slug ): string {
		$slug = str_replace( '-', ' ', $slug );
		return ucwords( $slug );
	}

	private function copy_dir( string $src, string $dst ): void {
		// Create dest directory.
		if ( ! wp_mkdir_p( $dst ) ) {
			WP_CLI::error( "Could not create directory: {$dst}" );
		}

		$items = scandir( $src );
		if ( $items === false ) {
			WP_CLI::error( "Could not read directory: {$src}" );
		}

		foreach ( $items as $item ) {
			if ( $item === '.' || $item === '..' ) {
				continue;
			}

			$from = $src . '/' . $item;
			$to   = $dst . '/' . $item;

			if ( is_dir( $from ) ) {
				$this->copy_dir( $from, $to );
				continue;
			}

			// Skip node_modules or build artifacts if you want a "source only" copy:
			// if ( $item === 'node_modules' ) { continue; }

			if ( ! copy( $from, $to ) ) {
				WP_CLI::error( "Failed copying file: {$from} -> {$to}" );
			}
		}
	}
}
