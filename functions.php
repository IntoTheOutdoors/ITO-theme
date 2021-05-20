<?php 


function load_files() {
    /** CSS */
    // fonts
    wp_register_style('fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', [], false, 'all');
    // main.css
    wp_register_style('main', get_template_directory_uri() . '/dist/main.css', false, 'all');
    // bootstrap
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css', [], false, 'all');
    // fontawesome
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', [], false, 'all');
    
    /** JAVSCRIPT */
    // popper
    wp_register_script('main', get_template_directory_uri() . '/dist/main.js', [], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js', ['jquery', 'popper'], false, true);


    // enqueue styles
    wp_enqueue_style('main');
    wp_enqueue_style('fonts');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');

    // enqueue scripts
    wp_enqueue_script('main');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
}

function register_navwalker() {
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}



// register navigation
register_nav_menus([
    'primary' => __('Primary Menu', 'ito'),
    'secondary' => __('Secondary Menu', 'ito')
]);

add_action('wp_enqueue_scripts', 'load_files');
add_action('after_setup_theme', 'register_navwalker');



/**
 * Generates meta keywords/tags for the site.
 */
function ito_meta_keywords() {
	$keywords = '';

	if ( is_singular() && !is_preview() ) {
		$post = get_queried_object();
		$taxonomies = get_object_taxonomies( $post->post_type );
		if ( is_array( $taxonomies ) ) {
			foreach ( $taxonomies as $tax ) {
				if ( $terms = get_the_term_list( get_queried_object_id(), $tax, '', ', ', '' ) )
					$keywords[] = $terms;
			}
			if ( !empty( $keywords ) )
				$keywords = join( ', ', $keywords );
		}
	}

	if(!empty($keywords))
		$keywords = '<meta name="keywords" content="' . esc_attr( strip_tags( $keywords ) ) . '" />' . "\n";

	echo apply_filters( 'ito_meta_keywords', $keywords );
} 

/**
 * Meta description
 */
function ito_meta_description() {
	$description = dp_get_doc_desc();
	
	if ( !empty( $description ) )
		$description = '<meta name="description" content="' . str_replace( array( "\r", "\n", "\t" ), '', esc_attr( strip_tags( $description ) ) ) . '" />' . "\n";

	echo apply_filters( 'ito_meta_description', $description );
}
?>



