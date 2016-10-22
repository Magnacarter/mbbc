<?php
/**
 * Class : CWS Theme
 */
class CWS_Theme {

	/**
	 * var $post_type
	 */
	public $post_type;

	/**
	 * var $cpts
	 */
	protected $cpts;

	/**
	 * var $cats
	 */
	protected $cats;

	/**
	 * Constructor method; Register the Custom Post Type and then hook to "init"
	 *
	 * @param $post_type string
	 *
	 * @return void
	 */
	public function __construct( $post_type ) {

		$this->post_type = $post_type;
		$this->cpts      = array();
		$this->cats      = array();

		if ( ! post_type_exists( $this->cpts[$this->post_type] ) ) {

			//Register CPTs
			add_action( 'init', array( $this, 'cws_register_cpt' ) );

			//Register CPT categories
			add_action( 'init', array( $this, 'cws_register_cats' ) );

		}

	}

	/**
	 * Build the Custom Post Type
	 *
	 * @param $cpt_slug string
	 * @param $singular_label string
	 * @param $plural_label string
	 * @param $supports array
	 * @param $settings array
	 *
	 * @return void
	 */
	public function cws_build_cpt( $cpt_slug, $singular_label, $plural_label, $supports = array(), $settings = array() ) {

		$labels = array(
			'name'               => __( $singular_label, $this->post_type ),
			'singular_name'      => __( $singular_label, $this->post_type ),
			'add_new'            => __( 'Add New ' . $singular_label, $this->post_type ),
			'add_new_item'       => __( 'Add ' . $singular_label, $this->post_type ),
			'edit_item'          => __( 'Edit ' . $singular_label, $this->post_type ),
			'new_item'           => __( 'New ' . $singular_label, $this->post_type ),
			'all_items'          => __( 'All ' . $plural_label, $this->post_type ),
			'view_item'          => __( 'View ' . $singular_label, $this->post_type ),
			'search_items'       => __( 'Search ' . $singular_label, $this->post_type ),
			'not_found'          => __( 'No event found', $this->post_type ),
			'not_found_in_trash' => __( 'No event found in Trash', $this->post_type ),
			'parent_item_colon'  => __( '' ),
			'menu_name'          => __( $plural_label ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'page',
			'taxonomies'         => array( 'category', 'post_tag' ),
			'can_export'         => true,
			'has_archive'        => $slug,
			'hierarchical'       => true,
			'menu_position'      => null,
			'rewrite'            => array( 'slug' => $cpt_slug, 'with_front' => false ),
			'supports'           => $supports
		);

		$this->cpts[$this->post_type] = array_merge( $args, $settings );

	}

	/**
	 * Register the Custom Post Type
	 *
	 * @return void
	 */
	public function cws_register_cpt() {

		foreach ( $this->cpts as $key => $value ) {

			register_post_type( $key, $value );

		}

	}

	/**
	 * Build CPT categories
	 *
	 * @param $singular_label string
	 * @param $plural_label string
	 *
	 * @return void
	 */
	public function cws_build_cats( $singular_label, $plural_label ) {

		$labels = array(
			'name'              => _x( $singular_label, 'taxonomy general name' ),
			'singular_name'     => _x( $singular_label, 'taxonomy singular name' ),
			'search_items'      => __( 'Search ' . $plural_label ),
			'all_items'         => __( 'All ' . $plural_label ),
			'parent_item'       => __( 'Parent ' . $singular_label ),
			'parent_item_colon' => __( 'Parent ' . $singular_label ),
			'edit_item'         => __( 'Edit ' . $singular_label ),
			'update_item'       => __( 'Update ' . $singular_label ),
			'add_new_item'      => __( 'Add New ' . $singular_label ),
			'new_item_name'     => __( 'New ' . $singular_label ),
			'menu_name'         => __( $plural_label ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true
		);

		$this->cats[$this->post_type] = $args;

	}

	/**
	 * Register the CPT Categories
	 *
	 * @return void
	 */
	public function cws_register_cats() {

		foreach ( $this->cats as $args ) {

			register_taxonomy( $this->post_type . '-category', array( $this->post_type ), $args );

		}

	}

	/**
	 * Get unordered list of linked titles
	 *
	 * @param $query_args array
	 * @param $post_number string
	 * @param $post_type string
	 *
	 * @return void
	 */
	public static function cws_list_titles( $post_type, $query_args = array(), $post_number = 10 ) {

		$default_args = array(
			'post_type'      => $post_type,
			'posts_per_page' => $post_number,
		);

		$args  = array_merge( $default_args, $query_args );

		$query = new WP_Query( $args );

		if( $query->have_posts() ) : ?>

			<ul>

				<?php while( $query->have_posts() ) : $query->the_post() ?>

					<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>

				<?php endwhile ?>

			</ul>

		<?php endif; wp_reset_postdata();

	}

	/**
	 * Echo post titles
	 *
	 * @param $query_args array
	 * @param $post_number string
	 * @param $post_id int
	 *
	 * @return void
	 */
	public static function cws_get_titles( $query_args = array(), $post_number = '10', $post_id ) {

		$default_args = array(
			'post_type'      => $this->post_type,
			'posts_per_page' => $post_number,
			'p'              => $post_id,
		);

		$args  = array_merge( $default_args, $query_args );

		$query = new WP_Query( $args );

		if( $query->have_posts() ) : ?>

			<?php while( $query->have_posts() ) : $query->the_post() ?>

				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>

			<?php endwhile ?>

		<?php endif; wp_reset_postdata();

	}

	/**
	 * Add an image
	 *
	 * @param $image_name string
	 * @param $alt string
	 *
	 * @return void
	 */
	static function cws_image( $image_name, $alt = '' ) {

		$cws_img_path = get_bloginfo( 'stylesheet_directory' ) . '/images/' . $image_name;

		$image = sprintf( '<img src="%s" alt="%s">', esc_url( $cws_img_path ), esc_attr( $alt ) );

		echo $image;

	}

	/**
	 * Get image path
	 *
	 * @param $image_name string
	 *
	 * @return $image string
	 */
	static function cws_get_img( $image_name ) {

		$image = get_bloginfo( 'stylesheet_directory' ) . '/images/' . $image_name;

		return $image;

	}

	/**
	 * Check for child pages
	 *
	 * @return bool
	 */
	static function cws_has_children() {
		global $post;

		$children = get_pages( array( 'child_of' => $post->ID ) );

			if( count( $children ) == 0 ) {

				return false;

			} else {

				return true;

		}

	}

}














