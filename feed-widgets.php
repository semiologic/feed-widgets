<?php
/*
Plugin Name: Feed Widgets
Plugin URI: http://www.semiologic.com/software/feed-widgets/
Description: Creates a special sidebar that lets you insert widgets at the end of each post in your RSS feeds. Configure these widgets under <a href="widgets.php">Design / Widgets</a>, by selecting the Feed Widgets sidebar.
Version: 2.2
Author: Denis de Bernardy & Mike Koepke
Author URI: http://www.getsemiologic.com
Text Domain: feed-widgets
Domain Path: /lang
License: Dual licensed under the MIT and GPLv2 licenses
*/

/*
Terms of use
------------

This software is copyright Denis de Bernardy & Mike Koepke, and is distributed under the terms of the MIT and GPLv2 licenses.
**/



/**
 * feed_widgets
 *
 * @package Feed Widgets
 **/

class feed_widgets {

	/**
	 * Plugin instance.
	 *
	 * @see get_instance()
	 * @type object
	 */
	protected static $instance = NULL;

	/**
	 * URL to this plugin's directory.
	 *
	 * @type string
	 */
	public $plugin_url = '';

	/**
	 * Path to this plugin's directory.
	 *
	 * @type string
	 */
	public $plugin_path = '';

	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @return  object of this class
	 */
	public static function get_instance()
	{
		NULL === self::$instance and self::$instance = new self;

		return self::$instance;
	}


	/**
	 * Loads translation file.
	 *
	 * Accessible to other classes to load different language files (admin and
	 * front-end for example).
	 *
	 * @wp-hook init
	 * @param   string $domain
	 * @return  void
	 */
	public function load_language( $domain )
	{
		load_plugin_textdomain(
			$domain,
			FALSE,
			dirname(plugin_basename(__FILE__)) . '/lang'
		);
	}

	/**
	 * Constructor.
	 *
	 *
	 */

	public function __construct() {
		$this->plugin_url    = plugins_url( '/', __FILE__ );
		$this->plugin_path   = plugin_dir_path( __FILE__ );
		$this->load_language( 'feed-widgets' );

		add_action( 'plugins_loaded', array ( $this, 'init' ) );
    }

	/**
	 * init()
	 *
	 * @return void
	 **/

	function init() {
		// more stuff: register actions and filters
		add_action('init', array($this, 'panels'), -100);
        add_filter('the_content', array($this, 'display'), 100);
	}

	/**
	 * panels()
	 *
	 * @return void
	 **/
	function panels() {
		register_sidebar(
			array(
				'id' => 'feed_widgets',
				'name' => __('Feed Widgets (for use in feeds)', 'feed-widgets'),
				'before_widget' => '<div>',
				'after_widget' => '</div>' . "\n",
				'before_title' => '<h3>',
				'after_title' => '</h3>' . "\n",
				)
			);
	} # panels()


    /**
     * display()
     *
     * @param string $text
     * @return string
     */
	
	function display($text) {
		if ( !is_feed() )
			return $text;
		
		ob_start();
		dynamic_sidebar('feed_widgets');
		$widgets = ob_get_clean();

		$text .= "\n\n" . $widgets;
		
		return $text;
	} # display()
} # feed_widgets

$feed_widgets = feed_widgets::get_instance();