<?php
/**
 * The template for displaying single students pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );


				$taxonomy = 'fwd-student-category';
                $terms    = get_terms(
                    array(
                        'taxonomy' => $taxonomy
                    )
                );

				if($terms && ! is_wp_error($terms) ){
                    foreach($terms as $term){
                        $args = array(
                            'post_type'      => 'fwd-staff',
                            'posts_per_page' => -1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                )
                            ),
                        );

					// function get_the_terms( $post, $taxonomy ) {
					// 	$post = get_post( $post );
					// 	if ( ! $post ) {
					// 		return false;
					// 	}
					// }

					}
				}
			endwhile;

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'fwd' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'fwd' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
