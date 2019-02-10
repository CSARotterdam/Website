<?php
/*
Plugin Name: CSPConnections Recents Widget Per Post Type
Plugin URI: http://www.github.com/cspconnections/
Description: Add a widget that gets the most recent posts for a certain post type
Version: 0.1
Author: CSPConnections
Author URI: https://www.cspconnections.nl/
License: GPL2
 */

/**
 * A widget that allows the user to select a post type in order to display it most recent posts
 * @version 1.0
 * @since 0.1
 * @author Wesley van Schaijk
 */
class CSP_Post_Type_Recents extends WP_Widget {

	/**
	 * The constructor of CSP_Post_Type_Recents
	 * @version 1.0
	 * @since 0.1
	 */
	function __construct() {
		parent::__construct (
			"CSP_Post_Type_Recents",
			__( "Recents For Post Type", "csp-post-type-recents-plugin" ),
			array ( "description" => __( "Most recent posts for a certain post type", "csp-post-type-recents-plugin" ) )
		);
	}

	/**
	 * Get all the post types currently registered in WordPress, without the ones that are unnecessary
	 *
	 * @return array A list with all the registered post types
	 * @author Wesley van Schaijk
	 * @version 1.0
	 * @since 0.1
	 */
	private function get_all_post_types() {
		$post_types = get_post_types();

		unset( $post_types['attachment'] );
		unset( $post_types['revision'] );
		unset( $post_types['custom_css'] );
		unset( $post_types['nav_menu_item'] );
		unset( $post_types['customize_changeset'] );
		unset( $post_types['oembed_cache'] );
		unset( $post_types['user_request'] );
		unset( $post_types['wp_block'] );

		return $post_types;
	}

	/**
	 * Get all the post of a certain post type
	 *
	 * @param string $post_type the post type of which the posts should be collected
	 * @param int $number_of_posts the number of post that have to be collected
	 * @return array returns a list of posts
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function get_posts( string $post_type, int $number_of_posts ) {
		$arguments = array(
			"numberposts" => is_int( $number_of_posts ) ? $number_of_posts : 5,
			"post_type" => $post_type
		);

		return get_posts( $arguments );
	}

	/**
	 * Print the title of the plugin
	 *
	 * @param string $title contains the title of the plugin
	 * @param array $args contains the arguments provided by wordpress
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function print_title( string $title, $args = array() ) {
		if ( !empty( $title ) ) {
			echo key_exists( 'before_title', $args ) ? $args['before_title'] : "";
            echo $title;
            echo key_exists( 'after_title', $args ) ? $args['after_title'] : "";
		}
	}

	/**
	 * Print all the post in an unsorted list
	 *
	 * @param array $posts the posts that shall be printed
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function print_post_links( array $posts ) {
		if ( !empty( $posts ) ) {
			echo "<ul>";

			foreach( $posts as $post ) { ?>
				<li>
					<a href='<?php echo get_the_permalink( $post -> ID ); ?>'
					   title="<?php echo get_the_title( $post -> ID ); ?>">

						<?php echo get_the_title( $post -> ID ); ?>
					</a>
				</li>
			<?php }

			echo "</ul>";
		} else {
			echo "No posts to display";
        }
	}

	/**
	 * Print the form where the user fills in the title of the list
	 *
	 * @param string $title contains the title previously filled by the user
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function print_title_form( string $title) { ?>
		<p>
			<label for="<?php echo $this -> get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input
				class="widefat"
				id="<?php echo $this -> get_field_id( 'title' ); ?>"
				name="<?php echo $this -> get_field_name( 'title' ); ?>"
				type="text"
				value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php }

	/**
	 * Print the form where the user selects the posts types of the posts to be collected
	 *
	 * @param string $selected_type the post type that has earlier been selected
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function print_post_type_form( string $selected_type ) { ?>
		<p>
			<label for="<?php echo $this -> get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type:' ); ?></label>
			<select
				class="widefat"
				id="<?php echo $this -> get_field_id( 'post_type' ); ?>"
				name="<?php echo $this -> get_field_name( 'post_type' ); ?>" > <?php

				$post_types = $this -> get_all_post_types();

				foreach ( $post_types as $post_slug => $post_type ) {
					$selected = $post_slug == $selected_type ? 'selected="selected"' : ''; ?>

					<option
						value='<?php echo $post_slug; ?>'
						<?php echo $selected; ?>>

							<?php echo ucfirst( $post_type ); ?>
					</option>";
				<?php }

			?></select>
		</p>
	<?php }

	/**
	 * Print the form where the user fills in the number of posts that need to be collected
	 *
	 * @param int $requested_number the number that has been entered before
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	private function print_number_of_posts_form( int $requested_number ) { ?>
		<p>
			<label for="<?php echo $this -> get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of posts:' ); ?></label>
			<input
				class="widefat"
				id="<?php echo $this -> get_field_id( 'number_of_posts' ); ?>"
				name="<?php echo $this -> get_field_name( 'number_of_posts' ); ?>"
				type="number"
				value="<?php echo esc_attr( $requested_number ); ?>" />
		</p>
	<?php }

	/**
	 * Function that prints the widget
	 *
	 * @param array $args the arguments provided by WordPress
	 * @param array $instance the instance of the widget
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( "widget_title", $instance['title'] );
		$post_type = $instance['post_type'];
		$number_of_posts = $instance["number_of_posts"];

		if ( !empty( $post_type ) ) {
			echo key_exists( 'before_widget', $args ) ? $args['before_widget'] : "";

			$this -> print_title( $title, $args );
			$this -> print_post_links( $this -> get_posts( $post_type, $number_of_posts ) );

			echo key_exists( 'after_widget', $args ) ? $args['after_widget'] : "";
		}
	}

	/**
	 * Print the form that is used in the back-end of WordPress
	 *
	 * @param array $instance the current instance of the widget
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : "New title";
		$post_type = isset( $instance['post_type'] ) ? $instance['post_type'] : "";
		$number_of_posts = isset( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : 5;

		$this -> print_title_form( $title );
		$this -> print_post_type_form( $post_type );
		$this -> print_number_of_posts_form( $number_of_posts );
	}

	/**
	 * Save the data of the widget
	 *
	 * @param array $new_instance the data of the new instance
	 * @param array $old_instance the data of the previous instance
	 * @return array Returns the data of the final instance that will be stored to the database
	 * @version 1.0
	 * @since 0.1
	 * @author Wesley van Schaijk
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( !empty( $new_instance['title'] ) )
			? strip_tags( $new_instance['title'] )
			: strip_tags( $old_instance['title'] );

		$instance['post_type'] = ( !empty( $new_instance['post_type'] ) )
			? strip_tags( $new_instance['post_type'] )
			: strip_tags( $old_instance['post_type'] );

		$instance['number_of_posts'] = ( !empty( $new_instance['number_of_posts'] ) )
			? strip_tags( $new_instance['number_of_posts'] )
			: strip_tags( $old_instance['number_of_posts'] );

		return $instance;
	}
}

/**
 * Load the widget into WordPress
 */
function csp_load_recent_post_type_widget() {
	register_widget( "CSP_Post_Type_Recents" );
}

// Add the load function in order for WordPress to be able to use the widget
add_action( "widgets_init", "csp_load_recent_post_type_widget" );