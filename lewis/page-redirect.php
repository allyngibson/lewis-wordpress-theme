<?php
/*
Template Name: Custom -- Redirect to Link
 *
 * @package Lewis
 * @since 1.0
 * @version 1.0
 *
 * This template will allow you to redirect to another post,
 * page, or external website.  Place the URL in the post's
 * content field, and the page will redirect the link to
 * that URL.
 *
 */

the_post();
$url = get_the_content();
$url = wp_strip_all_tags( $url, true );
wp_redirect( $url );
exit;

?>