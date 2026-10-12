<?php
/**
 * One-off: verify dark/light block styles are in dynamic editor CSS.
 */

$css_path = dirname(__DIR__) . '/vendor/aegis/framework/public/css/block-styles/dark.css';
echo file_exists($css_path) && str_contains(file_get_contents($css_path), '.wp-block-group.is-style-dark')
	? "dark.css ok\n"
	: "dark.css missing rule\n";

$response = apply_filters('pre_http_request', false, [], 'https://aegis-dynamic-styles');

if (! is_array($response) || ! isset($response['body'])) {
	echo 'no dynamic response: ' . gettype($response) . "\n";
	return;
}

$body = $response['body'];
echo str_contains($body, '.wp-block-group.is-style-dark')
	? "dynamic has dark rule\n"
	: "dynamic MISSING dark rule\n";
echo str_contains($body, '.wp-block-group.is-style-light')
	? "dynamic has light rule\n"
	: "dynamic MISSING light rule\n";
echo 'len=' . strlen($body) . "\n";
