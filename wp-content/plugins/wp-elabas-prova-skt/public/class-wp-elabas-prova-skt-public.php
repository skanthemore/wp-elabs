<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.cristiancascante.com/
 * @since      1.0.0
 *
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/public
 * @author     Cristian Cascante <cristiancascante@gmail.com>
 */
class Wp_Elabas_Prova_Skt_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-elabas-prova-skt-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-elabas-prova-skt-public.js', array( 'jquery' ), $this->version, false );

	}

	//SKT

	public function registerShortcodes() {
		add_shortcode( 'mostrar_cuentos', array( $this, 'shortcodeMostrarProductos') );
		add_shortcode( 'carrosuel_cuentos', array( $this, 'shortcodeCarrosuelProductos') );
	}

	public function shortcodeMostrarProductos() {

		$content 		= '';
		$numeroDePosts 	= -1;
	
		
		if (is_front_page()) {
			$numeroDePosts = 6;
		} else {
			$numeroDePosts = -1;
		}
	
		$args = array( 
			'posts_per_page'	=> $numeroDePosts, 
			'post_status' => 'publish',
			'post_type'		=> 'cuento', 
			'orderby' 		=> 'date', 
			'order' 		=> 'DESC', 
		);
	
		$post_query = new WP_Query($args);
		
		if($post_query->have_posts() ) {
			while($post_query->have_posts() ) {
				$post_query->the_post();
	
				$titulo 			= get_the_title();
				$textoCorto 		= get_the_excerpt();
				$fechaModificacion 	= get_the_modified_date();
				//$imagen 			= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
				$imagen 			= get_field ('imagen_carrusel');
				$link 				= get_the_permalink();
				
				if ($imagen == '') {
					$imagen = '/wp-content/plugins/wp-elabas-prova-skt/public/images/no-image.png';
				}
	
				$content .= '<div class="col-12 col-sm-6 col-lg-4 d-flex align-items-stretch">
								<div class="card mb-3">
									<a href="'.$link.'"><img src="'.$imagen.'" class="card-img-top" alt="..."></a>
									<div class="card-body">
									<h5 class="card-title">'.$titulo.'</h5>
									<small class="text-muted">'.$fechaModificacion.'</small>
									<p class="card-text">'.$textoCorto.'</p>
									<a href="'.$link.'" title="'.$titulo.'" class="btn btn-secondary float-end mb-1 mt-2">'.__("Leer cuento","elabs").'</a>
									</div>
								</div>
							</div>
							';
			}
		}

		wp_reset_postdata();   
		return $content;

	}

	public function shortcodeCarrosuelProductos() {

		
		$contentBlock 	= '';
		$contentButtons = '';
		$content		= '';
		$count 			= 1;
		
		$args = array( 
			'posts_per_page'	=> -1, 
			'post_status' 		=> 'publish',
			'post_type'			=> 'cuento', 
			'orderby' 			=> 'rand', 
			'order' 			=> 'DESC', 
		);

		$post_query = new WP_Query($args);
		
		if($post_query->have_posts() ) {
			while($post_query->have_posts() ) {
				$post_query->the_post();
	
				$titulo 			= get_the_title();
				$imagen 			= get_field ('imagen_carrusel');
				$link 				= get_the_permalink();
				$mostrarCarrusel 	= get_field ('mostrar_en_carrusel');

				if ($count == 1) {
					$active = 'active';
				} else {
					$active = '';
				}
				
				if ($imagen == '') {
					$imagen = '/wp-content/plugins/wp-elabas-prova-skt/public/images/no-image.png';
				}
	
				if ($mostrarCarrusel == 1) {

					$contentBlock .= 
					'<div class="carousel-item '.$active.'">
						<img src="'.$imagen.'" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>'.$titulo.'</h5>
						</div>
					</div>';

					$contentButtons .= 
					'<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="'.$active.'" aria-current="true" aria-label="Slide '.$count.'"></button>';
					
					$count++;
				}
			}
		}

		wp_reset_postdata();   
		

		$content = '<div id="block__carousel" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							'.$contentButtons .'
						</div>
						<div class="carousel-inner">
							'.$contentBlock.'
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>';
					

		return $content;

	}

}
