<?php

/**
 * @link              https://www.riccardogiovarelli.it/
 * @since             1.0.0
 * @package           Astropix_Apod
 *
 * @wordpress-plugin
 * Plugin Name:       Astropix Apod
 * Plugin URI:        https://www.riccardogiovarelli.it/
 * Version:           1.0.0
 * Author:            Riccardo Giovarelli
 * Author URI:        https://www.riccardogiovarelli.it/
 * License:           GPL-3.0
 * Text Domain:       astropix-apod
 * Domain Path:       /languages
 */

 // The widget class
class Astropix_Apod extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'Astropix_Apod',
			__( 'Astropix Apod', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'rss_url'    => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // RSS url ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rss_url' ) ); ?>"><?php _e( 'RSS url', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rss_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss_url' ) ); ?>" type="text" value="<?php echo esc_attr( $rssUrl ); ?>" />
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['rss_url']    = isset( $new_instance['rss_url'] ) ? wp_strip_all_tags( $new_instance['rss_url'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$rssUrl    = isset( $instance['rss_url'] ) ? apply_filters( 'widget_rss_url', $instance['rss_url'] ) : '';

		// WordPress core before_widget hook (always include )
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

		// Display RSS url if defined
		if ( $rssUrl ) {
			echo $before_title . $rssUrl . $after_title;
		}

		echo '</div>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;
	}

}

// Register the widget
function my_register_custom_widget() {
	register_widget( 'Astropix_Apod' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );