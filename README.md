# WXYZ Blocks

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)
[![License: GPL v2](https://img.shields.io/badge/License-GPL_v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![Release Version](https://img.shields.io/github/release/sarahcssiqueira/xywz-blocks.svg)](https://github.com/sarahcssiqueira/wxyz-blocks/releases/latest)

A **developer-focused WordPress plugin** that bundles multiple Gutenberg blocks under a single plugin, plus a lightweight “framework” structure (service loader, block manager pattern, tests) to help maintain many blocks in one codebase.

This project is **not** intended to replace the official block scaffolding tool. If you want to scaffold a new standalone block/plugin project from scratch, use:

- `npx @wordpress/create-block@latest`

## Table of Contents

- [Introduction](#introduction)
- [Why this repo (vs create-block)](#why-this-repo-vs-create-block)
- [Requirements](#requirements)
- [Blocks included](#blocks-included)
- [Architecture](#architecture)
  - [Automatic registration via block.json](#automatic-registration-via-blockjson)
  - [Custom block category](#custom-block-category)
- [Developer workflow](#developer-workflow)
  - [Install](#install)
  - [Build](#build)
  - [Add a new block](#add-a-new-block)
  - [WP-CLI: duplicate a block folder](#wp-cli-duplicate-a-block-folder)
- [Tests](#tests)
- [License](#license)

## Introduction

WXYZ Blocks is a multi-block plugin that ships several example blocks (W/X/Y/Z) and demonstrates a maintainable structure for organizing multiple blocks inside a single plugin.

It is intended for **developers** who want a single plugin that contains multiple custom blocks and a scalable way to grow that set over time.

## Why this repo (vs create-block)

Use this repo when you want:

- **One plugin containing many blocks** (shared PHP bootstrap, shared conventions).
- A consistent, scalable structure to **register and maintain multiple blocks**.

Use `npx @wordpress/create-block@latest` when you want:

- A brand-new standalone block/plugin starter scaffold.

## Requirements

- WordPress environment
- PHP (same as your WordPress environment)
- Node.js + npm (only required for building block assets during development)

> Note: The exact Node/npm versions depend on the versions required by `@wordpress/scripts`. Prefer using an LTS Node release.

## Blocks included

- **Block W**: Receives an attribute and displays it in frontend.
- **Block X**: Shows latest posts.
- **Block Y**: Retrieves and displays data from an API.
- **Block Z**: Slider image.

## Architecture

### Automatic registration via block.json

Blocks are registered using `register_block_type()` pointing to each block’s folder. Asset loading should be handled by each block’s `block.json` (for example using `"editorScript": "file:./build/index.js"`, `"style": "file:./build/style-index.css"`, etc.).

This keeps the plugin code lightweight and avoids manual enqueue logic.

### Custom block category

The plugin registers a custom block category using the `block_categories_all` filter, so the bundled blocks can appear grouped in the inserter.

## Developer workflow

### Install

Clone this repository:

- `git clone https://github.com/sarahcssiqueira/wxyz-blocks`

Install dependencies:

- `composer install`
- `npm install`

### Build

Build block assets:

- `npm run build`

For development/watching:

- `npm run start`

### Add a new block

Recommended approach:

1. Create a new folder under `blocks/<your-block-slug>/`.
2. Ensure it contains a valid `block.json` file (and references built assets using `file:` entries).
3. Build assets (`npm run build`).

If you use automatic discovery in the block manager, no additional PHP changes should be required.

### WP-CLI: duplicate a block folder

When running WP-CLI, the plugin can load custom WP-CLI commands (only in WP-CLI context):

```php
// Load CLI commands only in WP-CLI context.
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once __DIR__ . '/inc/CLI/CreateBlockCommand.php';
	require_once __DIR__ . '/inc/CLI/cli.php';
}
```

Example usage:

- `wp wxyz block duplicate --from=block-w --to=block-hero --title="Hero"`

> Note: duplicating a block folder does not run the build step. You still need to run `npm run build`.

## Tests

The repo contains a WordPress PHPUnit test bootstrap and starter tests. (More tests are welcome.)

## License

This project is licensed under the license [GPLv2 or later](https://choosealicense.com/licenses/gpl-2.0/#).