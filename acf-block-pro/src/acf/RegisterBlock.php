<?php

class ACFBP_RegisterBlock {


  public function __construct() {

    add_action('acf/init', array( $this, 'register' ));

  }

  public function register() {

    $blockPosts = get_posts(
      array(
        'numberposts' => -1,
        'post_type'   => 'acf-block'
      )
    );

    if( empty( $blockPosts )) {
      return;
    }

    foreach( $blockPosts as $blockPost ) {

      $blockTitle = $blockPost->post_title;
      $blockKey = str_replace(' ', '_', $blockTitle);
      $blockKey = strtolower( $blockKey );
      $id = $blockPost->ID;

      $description = get_field( 'acfbp_block_description', $id );
      $category = get_field( 'acfbp_category', $id );
      $icon = get_field( 'acfbp_icon', $id );

      // handle keywords entered in list
      $keywordArray = explode(',', get_field( 'acfbp_keywords', $id ));

      // handle keywords entered in list
      $postTypeValue = get_field( 'acfbp_post_types', $id );
      if( $postTypeValue != '' ) {
        $postTypes = explode(',', $postTypeValue);
      } else {
        $postTypes = [];
      }

      // get mode
      $mode = get_field( 'acfbp_mode', $id );

      // get align setting
      $align = get_field( 'acfbp_align', $id );
      if( !$align ) {
        $align = '';
      }

      $supportsAlign = get_field( 'acfbp_supports_align', $id );
      $supportsMode = get_field( 'acfbp_supports_mode', $id );
      $supportsMultiple = get_field( 'acfbp_supports_multiple', $id );

      acf_register_block_type(
        array(
          'name'              => $blockKey,
    	    'title'             => __( $blockTitle, 'acf-block-pro' ),
    	    'description'       => __( $description ),
    	    'render_callback'   => array( $this, 'render' ),
    	    'category'          => $category,
    	    'icon'              => $icon,
    	    'keywords'          => $keywordArray,
          'post_types'        => $postTypes,
          'mode'              => $mode,
          'align'             => $align,
          //'enqueue_script'    => '',
          //'enqueue_style'     => '',
          //'enqueue_assets'    => '',
          'supports'          => array(
            'align'     => $supportsAlign,
            'mode'      => $supportsMode,
            'multiple'  => $supportsMultiple
          )
        )
      );

    }

  }

  public function render( $block ) {

    $blockKey = str_replace( 'acf/', '', $block['name'] );
    require( ACF_BLOCK_PRO_PATH . '/blocks/' . $blockKey . '/templates/render.php' );

    /*
    print '<pre>';
    var_dump( $block );
    print '</pre>';
    */

  }

}
