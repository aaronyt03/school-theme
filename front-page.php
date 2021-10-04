<?php
/**
 * The template for displaying home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
		?>

			
			<h2>Recent Posts</h2>

			<section class="recent-blog">
				<?php
				$args = array(
					'post_type' 	=> 'post',
					'post_per_page' => 3,
				);
				$blog_query = new WP_Query( $args );
				if ( $blog_query -> have_posts() ) {
					while ( $blog_query -> have_posts() ){
						$blog_query ->the_post();
				?>
				<article>
					<a class='blog-link' href="<?php the_permalink(); ?>">
					<?php if( has_post_thumbnail() ){
						the_post_thumbnail( 'blog-image' );
						the_title();
					}
					?>
					</a>
				</article>
				<?php
					}
					wp_reset_postdata();
				}
				?>
			</section>
				

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
