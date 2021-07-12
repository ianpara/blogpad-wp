<?php get_header(); ?>

    <div class="container blog-content pt-5">
        <div class="row">
        <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'content-single', get_post_format() );
            endwhile; endif;
		?>
        <?php get_sidebar(); ?>
        </div>
    </div

<?php get_footer(); ?>