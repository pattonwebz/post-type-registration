<?php
/**
 * Base class for use when registering post types.
 *
 * The minimum requirement here is to set a $name. You should also override the
 * labels and args - either via method override or by passing them into the
 * class before calling 'register'.
 *
 * @package   PattonWebz Post Type Registration Class
 * @version   0.2.2-dev
 * @since     0.1.0
 * @author    William Patton <will@pattonwebz.com>
 * @copyright Copyright (c) 2018-2019, William Patton
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace PattonWebz\PostType;

/**
 * Registers post types for use.
 *
 * @since  0.1.0
 */
abstract class AbstractPostType {

	/**
	 * The identifier for this post type.
	 *
	 * @since  0.1.0
	 * @var string
	 */
	public $name = 'post';

	/**
	 * Icon to use for this post type.
	 *
	 * @since 0.2.2
	 * @var string
	 */
	public $icon = 'dashicons-admin-post';

	/**
	 * The arguments used when registering this post type.
	 *
	 * @since  0.1.0
	 * @var array
	 */
	public $args = [];

	/**
	 * The arguments used when registering this post type.
	 *
	 * @since  0.1.0
	 * @var array
	 */
	public $labels = [];

	/**
	 * Sets up the properties for use when registering.
	 *
	 * @method __construct
	 * @since  0.2.2
	 * @param  array $args   The array of args to use when registering the CPT.
	 * @param  array $labels A custom labels array to use when registering the
	 *                       post. NOTE: If you are passing a custom $args array
	 *                       then this will not be included automatticaly so
	 *                       include it in $args['labels'] directly.
	 */
	public function __construct( array $args = [], array $labels = [] ) {
		$this->labels = ( ! empty( $labels ) ) ? $labels : $this->get_labels();
		$this->args   = ( ! empty( $args ) ) ? $args : $this->get_args();
	}

	/**
	 * Hook in and register the post type.
	 *
	 * @method register
	 * @since  0.1.0
	 */
	public function register() {
		add_action( 'init', [ $this, 'register_cpt' ], 0 );
	}

	/**
	 * Get the name of this post type.
	 *
	 * @method get_name
	 * @since  0.1.0
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Get the labels used with this post type.
	 *
	 * @method get_labels
	 * @since  0.1.0
	 *
	 * @return array
	 */
	public function get_labels() {

		return ( ! empty( $this->labels ) ) ? $this->labels : [
			'name' => ucwords( $this->name ),
		];
	}

	/**
	 * Get the post type registration args.
	 *
	 * @method get_args
	 * @since  0.1.0
	 *
	 * @return array
	 */
	public function get_args() {
		$labels = $this->get_labels();
		$name   = ( isset( $labels['menu_name'] ) ) ? $labels['menu_name'] : $this->name;

		return ( ! empty( $this->args ) ) ? $this->args : [
			'post_type' => $name,
			'label'     => $name,
			'labels'    => $labels,
			'menu_icon' => ( ! empty( $this->icon ) ) ? $this->icon : 'dashicons-admin-post',
			'public'    => true,
		];
	}
	/**
	 * Register the CPT used to hold posts.
	 *
	 * @since  0.1.0
	 */
	public function register_cpt() {
		if ( ! post_type_exists( $this->name ) ) {
			register_post_type( $this->name, $this->get_args() );
		}
	}
}
