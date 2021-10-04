<?php
/**
 * The template for displaying archive for staff
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

    <main id="primary" class="site-main">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <h1 class="entry-title">Staff</h1>
            </header>

            <div class="entry-content">
                <?php
                $taxonomy = 'fwd-staff-category';
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

                        $query = new WP_Query( $args );

                        if ( $query -> have_posts() ) {?>
                            <section class="staff-wrapper">
                            <?php
                            // Output Term name.
                            echo '<h2>' . $term->name . '</h2>';
                            while ( $query -> have_posts() ) {
                                $query -> the_post();
                            ?>
                                <article class="staff-item">
                                    <?php if ( function_exists( 'get_field' ) ) {
                                        if ( get_field( 'courses' ) && get_field( 'staff_biography' ) ) { ?>
                                            <h3><?php the_title( );?></h3><?php
                                            if ( $term->name === 'Faculty' ){?>
                                                <p><a href= "<?php the_field( 'links' ); ?>">Teacher Link</a></p>
                                            <?php } ?> 
                                            <?php the_field( 'staff_biography' ); ?>
                                            Courses: <?php the_field( 'courses' ); ?>
                                        <?php
                                        }
                                    }?>
                                </article>
                            <?php
                            }?>
                            </section>

                            <?php
                            wp_reset_postdata();
                        }
                    }
                }?>
            </div>
        </article>

    </main>
<?php
get_footer();