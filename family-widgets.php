<?php
/**
* Plugin Name: Categorías y páginas por familia y profundidad
* Plugin URI: https://javibertolez.es/nuestros-plugins-wordpress/categorias-y-paginas-por-familia-y-profundidad/
* Description: Show with widgets and shortcodes the pages and categories you need based on their relationships and depth. Idea of: <a href="https://www.yoseomarketing.com/"> YoseoMarketing </a>
* Version: 1.6.1
* Author: Javibertolez
* Author URI: https://www.javibertolez.es
* License: GPL2
* License Uri: https://tldrlegal.com/license/gnu-general-public-license-v2
* Stable tag: 1.6
* Text Domain: categorias-y-paginas-por-familia-y-profundidad
* Domain Path: /languages
*/


load_plugin_textdomain( 'categorias-y-paginas-por-familia-y-profundidad', false, basename( dirname( __FILE__ ) ) . '/languages' );


require_once(dirname( __FILE__ ) . "/functions.php");

require_once(dirname( __FILE__ ) . "/related-cats.php");

require_once(dirname( __FILE__ ) . "/related-pages.php");

require_once(dirname( __FILE__ ) . "/shortcodes/shortcode-cats.php");

require_once(dirname( __FILE__ ) . "/shortcodes/shortcode-pages.php");