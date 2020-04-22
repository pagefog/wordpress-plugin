<?php
/**
 * Plugin Name: Pagefog
 * Plugin URI: https://wordpress.org/plugins/pagefog
 * Description: Enables hosting link back to Pagefog.
 * Version: 1.0
 * Author: Pagefog
 * Author URI: https://pagefog.com
 */

defined( 'ABSPATH' ) or die();

if ( is_admin() ) {
	add_filter( 'admin_footer_text', 'pagefog_poweredby_text', 11 );
}
else {
	add_filter( 'widget_meta_poweredby', 'pagefog_meta_poweredby', 11 );
	add_action( 'twentyten_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentyeleven_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentytwelve_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentythirteen_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentyfourteen_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentyfifteen_credits', 'pagefog_poweredby_credit' );
	add_action( 'twentysixteen_credits', 'pagefog_poweredby_credit' );
}

$mail_config = __DIR__.'/mail.php';

if (file_exists($mail_config)) {
        require_once $mail_config;
}

function pagefog_link($title = 'Pagefog') {
	return '<a href="https://pagefog.com" target="_blank">'.$title.'</a>';
}

function pagefog_meta_poweredby() {
	return '<li><a href="https://wordpress.org">WordPress.org</a></li><li>'.pagefog_link().'</li>';
}

function pagefog_poweredby_text() {
	return pagefog_link('Hosted by Pagefog');
}

function pagefog_poweredby_credit() {
	echo pagefog_link('Hosted by Pagefog');
}
