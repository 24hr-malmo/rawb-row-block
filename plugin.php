<?php
/**
 * Plugin Name: rawb-row-block — CGB Gutenberg Block Plugin
 * Plugin URI: https://github.com/ahmadawais/create-guten-block/
 * Description: rawb-row-block — is a Gutenberg plugin created via create-guten-block.
 * Author: mrahmadawais, maedahbatool
 * Author URI: https://AhmadAwais.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	add_filter('headless_helper__rawb/row-block',  function($block, $format_blocks) {
		$parsed_block = new stdclass();
		$parsed_block->full_width = true;
        $parsed_block->blocks = $format_blocks($block->innerBlocks, $block->blockName);
        return $parsed_block;
    }, 10, 2);


	add_filter( 'allowed_block_types', function ( $allowed_blocks ) {
		array_push($allowed_blocks, 'rawb/row-block');
		return $allowed_blocks;
	}, 100);


/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
