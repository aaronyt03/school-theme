<?php
/**
 * The template for displaying archive pages
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
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<article class="stucat">
					<?php the_post_thumbnail( 'student-image' );?>
					<div>
						<a href="<?php the_permalink(); ?>">
							<h2><?php the_title(); ?></h2>
						</a>
						<?php the_excerpt(); ?>
					</div>
				</article>

				<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
