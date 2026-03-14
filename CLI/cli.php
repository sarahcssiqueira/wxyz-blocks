<?php
/**
 * WP-CLI command to duplicate a block folder.
 *
 * Usage: wp wxyz block duplicate --from=block-w --to=block-new --title="Block New"
 */

namespace WXYZBlocks\CLI;

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	\WP_CLI::add_command( 'wxyz block', BlockCommand::class );
}
