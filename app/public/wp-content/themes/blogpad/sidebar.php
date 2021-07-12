<!-- sidebar -->
<div class="sidebar col-lg-4 col-12 mt-lg-0 mt-3">
    <div class="side-widget side-popular">
        <p class="cat-title fs-5">Popular on Blogpad</p>

        <?php
            $args = array(
                'posts_per_page' => 3,
                'meta_key' => 'wpb_post_views_count', 
                'date_query'    => array(
                    'column'  => 'post_date',
                    'after'   => '- 30 days'
                ),
                'orderby' => 'meta_value_num', 
                'order' => 'DESC'
            );
            $popularpost = new WP_Query( $args );
            while ( $popularpost->have_posts() ) : 
                $popularpost->the_post();           
            ?>

        <div class="post d-flex mb-3 position-relative">
            <div class="thumbnail me-2">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>"
                alt="blog image" class="me-3 img-fluid">
            </div>
            <div class="">
                <a href="<?php the_permalink() ?>" class="stretched-link">
                    <div class="title lh-sm pb-2"><?php the_title() ?></div>
                </a>
                <div class="d-flex">
                    <div class="date position-relative"><?php the_time('F jS, Y') ?></div>
                    <div class="read-time ms-3">4 min. read</div>
                </div>
            </div>
        </div>


        <?php endwhile; ?>

    </div>

    <div class="side-widget side-archive">
        <p class="cat-title fs-5">Archives</p>
        <ul>
            <?php wp_get_archives( 'type=monthly' ); ?>
        </ul>
    </div>

    <div class="side-widget">
        <p class="cat-title fs-5">Follow Us</p>
        <div class="socials d-flex flex-nowrap flex-row justify-content-center">
            <a class="btn btn-social facebook me-1" href="<?php echo get_option('facebook'); ?>" type="button" aria-label="Follow on Facebook"></a>
            <a class="btn btn-social twitter me-1" href="<?php echo get_option('twitter'); ?>" type="button" aria-label="Follow on Twitter"></a>
            <a class="btn btn-social insta me-1" href="<?php echo get_option('insta'); ?>" type="button" aria-label="Follow on Instagram"></a>
            <a class="btn btn-social linkedin" href="<?php echo get_option('linkedin'); ?>" type="button" aria-label="Follow on Linkedin"></a>
        </div>
    </div>
    </div>