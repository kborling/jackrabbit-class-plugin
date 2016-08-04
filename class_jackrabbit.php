<?php
/*
Plugin Name: JackRabbitClass
Version:     1.0
Description: Display upcoming classes using JackRabbitClass API.
Plugin URI:  https://borlandiaweb.com
Author:     Kevin Borling <kevin@borlandiaweb.com>
Author URI:  https://borlandiaweb.com
*/

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Jackrabbit
{
  // JackRabbitClass API URL
  protected $apiUrl;
  // Incoming
  protected $data;

  /** Default Constructor */
  public function __construct()
  {
    // Set Plugin URL
    $this->pluginUrl = WP_PLUGIN_URL.'/ba-jackrabbit';
    // Initiate Actions
    $this->add_actions();
  }

  /**
    * Display Current Openings using JackRabbitClass API
    *
    * Builds query string from shortcode attributes.
    * Uses query string to call JackRabbitClass API.
    * Basic usage: [jr-class-listings orgID="12345"]
    *
    * @param array $atts Shortcode attributes
    *
    * @return string HTML with the contents of the JackRabbitClass API Call
   */
  public function current_openings($atts)
  {
    $this->apiUrl = '//app.jackrabbitclass.com/jr3.0/Openings/OpeningsJS?';
    $this->data = array();

    foreach ($atts as $key => $value) {
        $this->data[] = $key.'='.urlencode($value);
    }
    $this->apiUrl .= implode('&', $this->data);

    ob_start();
    ?>
    <!-- JackRabbitClass API Script -->
    <script type="text/javascript" src="<?php echo $this->apiUrl ?>"></script>
    <div class="jr-no-classes" style="display:none">
      <blockquote>"More classes coming soon!</blockquote>
    </div>
    <?php

    return ob_get_clean();
  }

  /** Shortcode / Action */
  public function add_actions()
  {
    add_shortcode('jr-class-listings', array($this, 'current_openings'));
    add_action('wp_enqueue_scripts', array($this, 'add_styles_scripts'));
  }

  /** Enqueue plugin style-file */
  public function add_styles_scripts()
  {
    wp_register_style('jackrabbit-style', $this->pluginUrl.'/inc/styles.css');
    wp_enqueue_style('jackrabbit-style');
  }
} // End Jackrabbit

// Initiate Jackrabbit Class
$jackrabbit = new Jackrabbit();
