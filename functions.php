<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function new_excerpt_length($len) {
  return 55;
}

add_filter('excerpt_length','new_excerpt_length');


/* Include custom fields for posts (like subtitle und so) */
include 'custom-fields.php';


/* Remove width/height attribute */
function kite_remove_image_size_attr( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'kite_remove_image_size_attr', 10 );
add_filter( 'image_send_to_editor', 'kite_remove_image_size_attr', 10 );

/**
 * Add custom image sizes
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add js scripts & jquery
 */
wp_enqueue_script('theme-scripts', get_template_directory_uri() .'/js/blog`.js', array('jquery'), null, true);

/* https://wordpress.stackexchange.com/questions/78833/knowing-the-total-number-of-posts-before-to-get-into-the-loop */
function wpse8170_get_posts_count() {
  global $wp_query;
  return $wp_query->post_count;
}

function post_fetured_image_json( $data, $post, $context ) {
  $featured_image_id = $data->data['featured_media']; // get featured image id
  $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'original' ); // get url of the original size
  if( $featured_image_url ) {
    $data->data['featured_image_url'] = $featured_image_url[0];
  }

    
  return $data;
}
add_filter( 'rest_prepare_post', 'post_fetured_image_json', 10, 3 );

function post_tags_json( $data, $post, $context ) {
  $tags = $data->data['tags']; // get featured image id
  $ret = array();
  foreach ($tags as $key => $tag) {
    $ret[] = get_tag($tag);
  }
  $data->data['tags_full'] = $ret;

  return $data;
}
add_filter( 'rest_prepare_post', 'post_tags_json', 10, 3 );


/* */

function your_prefix_get_meta_box( $meta_boxes ) {
  $prefix = 'session-';

  $meta_boxes[] = array(
    'id' => 'session-info',
    'title' => esc_html__( 'Session info', 'metabox-online-generator' ),
    'post_types' => array( 'post', 'page' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => false,
    'fields' => array(
      array(
        'id' => $prefix . 'author',
        'type' => 'text',
        'name' => esc_html__( 'Author', 'metabox-online-generator' ),
      ),
      array(
        'id' => $prefix . 'area',
        'type' => 'text',
        'name' => esc_html__( 'Area', 'metabox-online-generator' ),
      ),
      array(
        'id' => $prefix . 'time',
        'type' => 'text',
        'name' => esc_html__( 'Starting time (hh:mm)', 'metabox-online-generator' ),
      ),
      array(
        'id' => $prefix . 'duration',
        'type' => 'text',
        'name' => esc_html__( 'Duration in minutes', 'metabox-online-generator' ),
      )
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );
