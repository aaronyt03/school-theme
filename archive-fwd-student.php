<?php
/**
 * The template for displaying student archive page
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
			</header>

			<?php
             $taxonomy = 'fwd-student-category';
			 $id = get_the_ID();
             $terms = get_the_term_list( $id, 'fwd-student-category',);
			
                     $args = array(
                        'post_type'      => 'fwd-student',
                        'posts_per_page' => -1,
						'order'			 => 'ASC',
						'orderby'		 => 'title',
                    );

					$query = new WP_Query( $args );

					if( $query->have_posts() ){?>
					<div class="stucontainer">
					<?php
					while( $query->have_posts() ){
						$query->the_post();?>
						<article class='student' id='<?php echo get_the_ID(); ?>'>
							<a href='<?php echo get_permalink(); ?>'>
							<h2><?php the_title(); ?></h2></a>
							<?php the_post_thumbnail( 'student-image' );
								if( is_single() ){
									the_content();
								}else{
									the_excerpt();
							} ?>
							<p>Specialty: <a><?php echo get_the_term_list( $id, 'fwd-student-category' ) ?></a></p>
						</article>
						<?php
					}?><div>
					<?php
					}
					wp_reset_postdata();
			
		endif; ?>

	</main><!-- #primary -->

<?php
get_footer();
