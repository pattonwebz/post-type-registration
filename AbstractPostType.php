<?php
/**
 * Base class for use when registering post types.
 *
 * The minimum requirement here is to set a $name. You should also override the
 * labels and args - either via method override or by passing them into the
 * class before calling 'register'.
 *
 * @package   PattonWebz Post Type Registration Class
 * @version   0.2.1
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
	 * @var string
	 */
	public $name = 'post';

	/**
	 * The arguments used when registering this post type.
	 *
	 * NOTE: This is PHP 7+ only.
	 *
	 * @var array
	 */
	public $args = [];

	/**
	 * The arguments used when registering this post type.
	 *
	 * NOTE: This is PHP 7+ only.
	 *
	 * @var array
	 */
	public $labels = [];

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
			'name' => ucfirst( $this->name ),
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
