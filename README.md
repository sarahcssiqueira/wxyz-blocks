# XYW...Z Blocks

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Release Version](https://img.shields.io/github/release/sarahcssiqueira/xywz-blocks.svg)](https://github.com/sarahcssiqueira/xywz-blocks/releases/latest)

Structure to work with multiple Gutenberg blocks in a single plugin. Contains four main blocks.

## Requirements

- WordPress Environment
- Node.js 14.0.0 or later
- Npm 6.14.4 or later.
- It is not compatible with older versions.

## Blocks

### Block X

[To do]

### Block Y

[To do]

### Block W

[To do]

### Block Z

[To do]

### Custom block category

By default, the WordPress core provides some categories which you can assign to your Gutenberg blocks. However, to keep things organized, can be a good idea to create custom block categories for categorizing your plugin, categorize your blocks based on some features, etc.

To achieve that, you can create your custom block category using the WordPress block filter `block_categories_all`.

Example: **register_new_category** function:

```
//index.php

       function register_new_category ($categories) {
            $categories[] = array(
                'slug'  => 'custom-category',
                'title' => 'Custom Category'
            );

            return $categories;
        }

        add_filter( 'block_categories_all' , 'register_new_category');

```

## Usage

Clone (or download) this repository git clone https://github.com/sarahcssiqueira/xywz-blocks or download the [latest release](https://github.com/sarahcssiqueira/xywz-blocks/releases).

Run `npm install` && `npm run build`

## License

This project is licensed under the license [GPLv2 or later](https://choosealicense.com/licenses/gpl-2.0/#).
