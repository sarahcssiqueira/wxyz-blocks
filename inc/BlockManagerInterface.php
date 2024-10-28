<?php
/**
 * Block Manager Interface
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

interface BlockManagerInterface {
    public function blocks_list(): array;
    public function blocks_register(): void;
    public function blocks_enqueues(): void;
    public function custom_block_register(string $block): void;
    public function custom_block_enqueues(string $block): void;
}