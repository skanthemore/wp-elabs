<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.cristiancascante.com/
 * @since      1.0.0
 *
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/admin
 * @author     Cristian Cascante <cristiancascante@gmail.com>
 */
class Wp_Elabas_Prova_Skt_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Elabas_Prova_Skt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Elabas_Prova_Skt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-elabas-prova-skt-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Elabas_Prova_Skt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Elabas_Prova_Skt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-elabas-prova-skt-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function crearCustomPostProductos () {
		
			$labels = array(
				'name'                  => __( 'Cuentos', 'Post Type General Name', 'elabs' ),
				'singular_name'         => __( 'Cuento', 'Post Type Singular Name', 'elabs' ),
				'menu_name'             => __( 'Cuentos', 'elabs' ),
				'name_admin_bar'        => __( 'Cuentos', 'elabs' ),
				'archives'              => __( 'Archivo', 'elabs' ),
				'attributes'            => __( '', 'elabs' ),
				'parent_item_colon'     => __( '', 'elabs' ),
				'all_items'             => __( 'Todos los items', 'elabs' ),
				'add_new_item'          => __( 'Agregar nuevo', 'elabs' ),
				'add_new'               => __( 'Agregar Item', 'elabs' ),
				'new_item'              => __( 'Nuevo Item', 'elabs' ),
				'edit_item'             => __( 'Editar Item', 'elabs' ),
				'update_item'           => __( 'Actualizar Item', 'elabs' ),
				'view_item'             => __( 'Ver Item', 'elabs' ),
				'view_items'            => __( 'Ver Items', 'elabs' ),
				'search_items'          => __( 'Buscar Item', 'elabs' ),
				'not_found'             => __( 'No encontrado', 'elabs' ),
				'not_found_in_trash'    => __( 'No encontrado en Papelera', 'elabs' ),
				'featured_image'        => __( 'Imagen destacada', 'elabs' ),
				'set_featured_image'    => __( 'Setear Imagen Destacada', 'elabs' ),
				'remove_featured_image' => __( 'Remover Imagen Detacada', 'elabs' ),
				'use_featured_image'    => __( 'Usar como Imagen Destacada', 'elabs' ),
				'insert_into_item'      => __( 'Insertar en el Item', 'elabs' ),
				'uploaded_to_this_item' => __( 'Subir a este Item', 'elabs' ),
				'items_list'            => __( 'Lista de items', 'elabs' ),
				'items_list_navigation' => __( 'Navegación de Lista de Items', 'elabs' ),
				'filter_items_list'     => __( 'Filtros del Item', 'elabs' ),
			);
			$args = array(
				'label'                 => __( 'Cuento', 'elabs' ),
				'description'           => __( 'Post Type Description', 'elabs' ),
				'labels'                => $labels,
				'supports'              => array( 'title', 'editor' ),
				'taxonomies'            => array( 'category', 'post_tag' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
			);
			register_post_type( 'cuento', $args );
	}

}
