<?php
/*
Plugin Name: Reading Time Estimator
Description: Displays estimated reading time for blog posts.
Version: 1.0
Author: Your Name
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Calculate reading time
function rte_calculate_reading_time( $content ) {
    if ( is_single() ) {
        $word_count = str_word_count( strip_tags( $content ) );
        $minutes = ceil( $word_count / 200 );
        $label = "Estimated Reading Time: {$minutes} min read";
        $content = "<p><em>{$label}</em></p>" . $content;
    }
    return $content;
}
add_filter( 'the_content', 'rte_calculate_reading_time' );
