<?php
/*
Plugin Name: Weltall
Description: A plguin to get information about planets
Version: 1.0
Author: Maurice Pauluhn
*/

require_once __DIR__ . '/vendor/autoload.php';

use Michelf\Markdown;

defined('ABSPATH') or die('No script kiddies please!');

function weltall_get_latest_planets() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'planeten';

    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY ID DESC LIMIT 3", ARRAY_A);

    foreach ($results as &$planet) {
        $planet['zusatz'] = Markdown::defaultTransform($planet['zusatz']);
    }

    return $results;
}

function weltall_shortcode() {
    $planets = weltall_get_latest_planets();

    $output = '<div class="weltall-planeten">';
    foreach ($planets as $planet) {
        $output .= '<div class="planet">';
        $output .= '<h2>' . esc_html($planet['name']) . '</h2>';
        $output .= '<p><strong>Umfang:</strong> ' . esc_html($planet['umfang_km']) . ' km</p>';
        $output .= '<p><strong>Entfernung zur Sonne:</strong> ' . esc_html($planet['entfernung_sonne_km']) . ' km</p>';
        $output .= '<div>' . $planet['zusatz'] . '</div>';
        $output .= '</div>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('weltall', 'weltall_shortcode');
