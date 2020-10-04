<?php
/**
*
* Plugin Name: ACF Block Pro
* Plugin URI: https://eatbuildplay.com/plugins/acf-block-pro/
* Description: Framework for rapidly building Gutenberg blocks using ACF Pro.
* Version: 1.0.0
* Author: Casey Milne, Eat/Build/Play
* Author URI: https://eatbuildplay.com/
*
*/

if( ! defined( 'ABSPATH' ) ) exit;

define('ACF_BLOCK_PRO_VERSION', '1.0.0');
define('ACF_BLOCK_PRO_PATH', __DIR__);
define('ACF_BLOCK_PRO_URL', plugins_url('/' . basename(__DIR__)));

class AcfBlockPro {


  public function __construct() {

    require_once( ACF_BLOCK_PRO_PATH . '/src/wp/post-type-acf-block.php' );
    require_once( ACF_BLOCK_PRO_PATH . '/src/acf/RegisterBlock.php' );

    $registerBlock = new ACFBP_RegisterBlock();

    add_action( 'acf/register_fields', array( $this, 'registerFields'));

  }

  public function registerFields() {
    require_once( ACF_BLOCK_PRO_PATH . '/vendor/acf-post-type-selector/acf-post-type-selector.php' );
  }


}

new AcfBlockPro();
