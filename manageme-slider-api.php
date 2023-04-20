<?php

/**
 * @link              wonderweb.ch
 * @since             1.0.6
 * @package           ManageMe_Slider_Api
 *
 * @wordpress-plugin
 * Plugin Name:       ManageMe Slider Api
 * Plugin URI:        manage-me.pro
 * Description:       Affiche les cours de manage-me.pro dans un slider.
 * Version:           1.0.6
 * Author:            Wonderweb
 * Author URI:        wonderweb.ch
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

define('MANAGEME_SLIDER_VERSION', '1.0.6');

require plugin_dir_path(__FILE__) . 'inc/manageme-slider-api-public.php';

if (is_admin()) {
    require_once plugin_dir_path(__FILE__) .'inc/manageme-slider-api-admin.php';
}



/**
 * Appel du slider avec paramètres dynamiques
 *
 * @return void
 */
function manageme_slider_script()
{
    $options = get_option('manageme_options');
    //print_r($options);
    // Autoplay
    $autoplay = $options['manageme_field_autoplay']?? null;
    // smartspeed
    $smartspeed = $options['manageme_field_smartspeed']?? null;
    // loop
    $loop = $options['manageme_field_loop']?? null;
    // marge
    $marge = $options['manageme_field_marge']?? null;
    // navtext
    $navtext = $options['manageme_field_navtext']?? null;
    // breakpoints, items, navigation
    $break_small = $options['manageme_field_break_small']?? null;
    $display_small = $options['manageme_field_display_small']?? null;
    $nav_small = $options['manageme_field_nav_small']?? null;
    $break_medium = $options['manageme_field_break_medium']?? null;
    $display_medium = $options['manageme_field_display_medium']?? null;
    $nav_medium = $options['manageme_field_nav_medium']?? null;
    $break_large = $options['manageme_field_break_large']?? null;
    $display_large = $options['manageme_field_display_large']?? null;
    $nav_large = $options['manageme_field_nav_large']?? null;

    $small = array( 'items' => $display_small , 'nav' => $nav_small );
    $medium = array( 'items' => $display_medium , 'nav' => $nav_medium );
    $large = array( 'items' => $display_large, 'nav' => $nav_large);
    $responsive = array( $break_small => $small, $break_medium => $medium, $break_large => $large );

    $responsiveJS = json_encode($responsive, JSON_FORCE_OBJECT);

    ?>
<script>
	function runSlider() {
		var owl = jQuery('.owl-carousel');

		owl.owlCarousel({
			<?php if ($smartspeed) {
			    echo "smartSpeed: ". $smartspeed .","."\n";
			} ?>
			<?php if ($loop === "1") {
			    echo "loop: true,"."\n";
			} ?>
			<?php if ($autoplay === "1") {
			    echo "autoplay: true,"."\n";
			}?>
			<?php if ($navtext) {
			    echo "navText: ".$navtext.","."\n";
			}?>
			<?php if ($marge) {
			    echo "margin: ". $marge .","."\n";
			} ?>
			autoplayTimeout: 1000,
			autoplayHoverPause: true,
			responsiveClass: true,
			responsive: <?php echo $responsiveJS;  ?>
		});

		jQuery('.play').on('click', function() {
			owl.trigger('play.owl.autoplay', [1000])
		})
		jQuery('.stop').on('click', function() {
			owl.trigger('stop.owl.autoplay')
		})
	}
</script>
<?php
}

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */

function run_manageme_slider_api()
{
    add_action('admin_init', 'manageme_settings_init');
    add_action('admin_menu', 'manageme_options_page');

    $options = get_option('manageme_options');

    // die();
    add_shortcode('manageme_slider', 'display_slider');
    if (is_array($options)) {
        $mysocietyAccess1 = $options['manageme_field_account'];
        $mysocietyAccess2 = $options['manageme_field_account2'];
        if ($mysocietyAccess1 || $mysocietyAccess2) {
            add_action('wp_enqueue_scripts', 'manageme_load_my_shorcode_resources');
        } else {
            return false;
        }
    }
}
run_manageme_slider_api();


function manageme_load_my_shorcode_resources()
{
    global $post, $wpdb;

    // determine whether this page contains "my_shortcode" shortcode
    $shortcode_found = false;
    if (has_shortcode($post->post_content, 'manageme_slider')) {
        $shortcode_found = true;
    } elseif (isset($post->ID)) {
        $result = $wpdb->get_var($wpdb->prepare(
            "SELECT count(*) FROM $wpdb->postmeta " .
            "WHERE post_id = %d and meta_value LIKE '%%manageme_slider%%'",
            $post->ID
        ));
        $shortcode_found = ! empty($result);
    }

    if ($shortcode_found) {
        add_action('wp_footer', 'manageme_slider_script', 20);
        wp_enqueue_style('manageme-slider-api-owlcss', plugin_dir_url(__FILE__) . 'js/owl/assets/owl.carousel.min.css', array(), MANAGEME_SLIDER_VERSION, 'all');
        wp_enqueue_style('manageme-slider-api-owldefcss', plugin_dir_url(__FILE__) . 'js/owl/assets/owl.theme.default.min.css', array(), MANAGEME_SLIDER_VERSION, 'all');
        wp_enqueue_style('manageme-slider-api-css', plugin_dir_url(__FILE__) . 'css/manageme-slider.css', array(), MANAGEME_SLIDER_VERSION, 'all');
        wp_enqueue_script('manageme-slider-api-js', plugin_dir_url(__FILE__) . 'js/manageme-slider.js', array( 'jquery' ), MANAGEME_SLIDER_VERSION, false);
    }
}
?>