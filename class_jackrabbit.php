<?php
/*
Plugin Name: Borlandia JackRabbitClass
Version:     1.0
Description: Display upcoming classes using JackRabbitClass API.
Plugin URI:  https://borlandiaweb.com
Author:     Kevin Borling <kevin@borlandiaweb.com>
Author URI:  https://borlandiaweb.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Jackrabbit {

  protected $apiUrl = '//app.jackrabbitclass.com/jr3.0/Openings/OpeningsJS?';
  // API Attributes
  protected $filter = false;
  protected $hidecols = false;
  protected $index = 0;
  protected $hide = array();

  public function __construct() {
    // Set Plugin Path
    $this->pluginPath = dirname(__FILE__);
    // Set Plugin URL
    $this->pluginUrl = WP_PLUGIN_URL . '/ba-jackrabbit';

    $this->add_actions();
  }

  public function current_openings($atts)
  {
      if (is_array($atts) && array_key_exists('category', $atts)) {
          $atts['Cat2'] = $atts['category'];
      }

      if (is_array($atts) && array_key_exists('filter', $atts)) {
          $this->filter = $atts['filter'];
      }

      if (is_array($atts) && array_key_exists('hidecols', $atts)) {
          $this->hidecols = $atts['hidecols'];
      }

      if (is_array($atts) && array_key_exists('index', $atts)) {
          $this->index = $atts['index'];
      }

      if (is_array($atts) && array_key_exists('hide', $atts)) {
          $this->hide = explode(',', $atts['hide']);
      }
      /*
      $atts = shortcode_atts(array(
      'OrgID' => '154418',
      'Cat2' => null,
      'Style' => 'color:#000000',
      'ClassStyle' => 'font-weight:bold',
      'ShowCols' => 'Instructors',
      'HideCols' => 'Gender,Openings,Ages,Description,Session',
      'Sort' => 'StartDate,StartTime',
    ), $atts);
    */

      $get_data = array();
      foreach ($atts as $key => $value) {
          $get_data[] = $key.'='.urlencode($value);
      }
      $this->apiUrl .= implode('&', $get_data);

      ob_start();
      ?>
    <script src="<?php echo $this->apiUrl ?>"></script>
    <div class="jr-no-classes" style="display:none">
      <blockquote>"More classes coming soon. If you'd like to be emailed when the classes become available, <a href="mailto:kevin@borlandiaweb.com?Subject=I am interested in any upcoming <?php echo $this->filter ?>classes">send us a message</a>."</blockquote>
    </div>
    <script>
      $ = jQuery;
      $(document).ready(function() {
      $(".jr-container").addClass('jr-container-<?php echo $this->index ?>');
      $('.jr-container-<?php echo $this->index ?>').removeClass("jr-container");
      <?php if ($this->hide) {
      foreach ($this->hide as $col) {
          ?>
      $('.jr-container-<?php echo $this->index ?>')
        .find('[data-title="<?php echo $col ?>"]')
        .remove();
      <?php
      }
  }
      ?>
      <?php if ($this->filter) {
      ?>
      $('.jr-container-<?php echo $this->index ?> > table > tbody')
        .find('th[data-title^=Class]:not(:contains(<?php echo $this->filter ?>))')
        .parent()
        .remove();
      <?php
  }
      ?>
      if($('.jr-container-<?php echo $this->index ?> > table > tbody > tr').length < 1) {
         $('.jr-no-classes').show();
         $('.jr-container-<?php echo $this->index ?>').remove(); } });
    </script>
    <?php
    return ob_get_clean();
  }

  public function add_actions() {
    add_shortcode('jr-class-listings', array($this, 'current_openings'));
    add_action( 'wp_enqueue_scripts', array($this, 'add_styles_scripts'));
  }

  /**
   * Enqueue plugin style-file
   */
  public function add_styles_scripts() {
      // Respects SSL, Style.css is relative to the current file
      wp_register_style( 'jackrabbit-style', $this->pluginUrl . '/inc/styles.css' );
      wp_enqueue_style( 'jackrabbit-style' );
  }

} // End Jackrabbit

$jackrabbit = new Jackrabbit();
