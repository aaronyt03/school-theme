<?php
/**
 * The template for Schedule pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if( have_rows( 'schedule' )):?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<table>	
				<h3>Calendar</h3>			
				<?php while( have_rows( 'schedule' ) ) : the_row();?>
				<tr>
					<td><?php the_sub_field('date');?></td>
					<td><?php the_sub_field('course');?></td>
					<td><?php the_sub_field('instructor');?></td>
				</tr>
				<?php endwhile; ?>
			</table>

		<?php endif;?>

	</main>

<?php
get_footer();
