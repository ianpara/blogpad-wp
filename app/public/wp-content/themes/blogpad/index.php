<?php get_header(); ?>

    <!-- START HEADER SLIDER -->
    <div class="header bg-gray section-gap pt-0">
        <div class="container position-relative">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">
                <div class="carousel-inner">

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
                    $first = true;
                    $trending = new WP_Query( $args );
                    while ( $trending->have_posts() ) : 
                        $trending->the_post();         
                        $profilePic = get_profile_pic(get_the_author());  
                ?>
    
                    <div class="carousel-item <?php echo ($first ? "active" : ""); $first = false;?>">
                        <div class="thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="d-block w-100" alt="blog image">
                        </div>
                        <div class="carousel-caption">
                            <div class="topic pb-3"><?php the_category(" ") ?></div>
                            <h2 class="title"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></h2>
                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center pt-4 position-relative">
                                <div class="author d-flex align-items-center position-relative">
                                    <a href="#auth" class="">
                                        <img src="<?php echo $profilePic ?>"
                                            alt="Authors profile picture" class="me-3">
                                    </a>
                                    <div class="">
                                        <div class="name pb-2"><a hfref="<?php get_the_author_posts_link() ?>"></a> <?php the_author() ?></div>
                                        <div class="date"><?php the_time('F jS, Y') ?></div>
                                    </div>
                                </div>
                                <div class="socials d-flex flex-nowrap flex-row me-3 mt-md-0 mt-3">
                                    <a class="btn btn-social facebook me-1" href="#0" type="button"
                                        aria-label="Share on Facebook"></a>
                                    <a class="btn btn-social twitter me-1" href="#0" type="button"
                                        aria-label="Share on Twitter"></a>
                                    <a class="btn btn-social message me-1" href="#0" type="button"
                                        aria-label="Share on Messages"></a>
                                    <a class="btn btn-social link" href="#0" type="button" aria-label="Share link"></a>
                                </div>
                                <div class="read-more-btn mt-md-0 mt-3">
                                    <a href="<?php the_permalink() ?>" type="button" class="btn btn-primary">Read Post</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

                </div>
                <button class="control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
    <!-- END HEADER SLIDER -->

    <!-- START NEW SLIDER -->
    <div class="new bg-gray section-gap">
        <div class="container">
            <h2 class="section-title mb-4">New Posts</h2>
            <div class="row justify-content-between">

            <?php
                    $args = array(
                        'posts_per_page' => 3
                    );
                    $new_posts = new WP_Query( $args );
                    while ( $new_posts->have_posts() ) : 
                        $new_posts->the_post();         
                        $profilePic = get_profile_pic(get_the_author());      
                ?>
                <div class="new-post col-lg-4 col-12">
                    <div class="post-image">
                        <a href="<?php the_permalink() ?>">
                            <img class="img-fluid"
                                src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
                                alt="">
                        </a>
                    </div>
                    <div class="post-meta">
                        <div class="topic pb-1"><?php the_category(" ") ?></div>
                        <h4 class="title"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></h4>
                        <div class="d-flex justify-content-between align-items-center pt-2 position-relative">
                            <div class="author d-flex align-items-center">
                                <a href="#auth" class="stretched-link">
                                    <img src="<?php echo $profilePic ?>"
                                        alt="Authors profile picture" class="me-3">
                                </a>
                                <div class="">
                                    <div class="name pb-2"><a hfref="<?php get_the_author_posts_link() ?>"></a> <?php the_author() ?></div>
                                    <div class="date"><?php the_time('F jS, Y') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
    <!-- END NEW SLIDER -->

    <!-- START POPULAR SLIDER -->
    <div class="popular section-gap">
        <div class="container">
            <h2 class="section-title mb-4">Most Popular</h2>
            <div class="col-lg-8">

            <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'meta_key' => 'wpb_post_views_count', 
                        'orderby' => 'meta_value_num', 
                        'order' => 'DESC'
                    );
                    $i=0;
                    $first = true;
                    $popular_posts = new WP_Query( $args );
                    while ( $popular_posts->have_posts() ) : 
                        $popular_posts->the_post();         
                        $profilePic = get_profile_pic(get_the_author());
                        $i++;
                ?>

                <div class="popular-post me-lg-5 me-0 <?php echo ($first ? "cursor-hover" : ""); $first = false;?>" onmouseover="toggleActive(this)">
                    <div class="d-flex flex-wrap">
                        <div class="post-order"><?php echo $i ?></div>
                        <div class="post-meta">
                            <div class="topic pb-3"><?php the_category(" ") ?></div>
                            <h2 class="title"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></h2>
                            <div class="d-flex justify-content-between align-items-center pt-4 position-relative w-100">
                                <div class="author d-flex align-items-center">
                                    <!-- <img src="https://source.boringavatars.com/beam/120/Courtney Fischer?colors=3858f6,d7263d,02182b,68c5db,ffba49"
                                        alt="Authors profile picture" class="me-3"> -->
                                    <div class="">
                                        <div class="name pb-2"><?php the_author() ?></div>
                                        <div class="d-flex">
                                            <div class="date position-relative"><?php the_time('F jS, Y') ?></div>
                                            <div class="read-time ms-3">4 min. read</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="socials d-flex flex-nowrap flex-row me-3">
                                    <a class="btn btn-social facebook me-1" href="#0" type="button"
                                        aria-label="Share on Facebook"></a>
                                    <a class="btn btn-social twitter me-1" href="#0" type="button"
                                        aria-label="Share on Twitter"></a>
                                    <a class="btn btn-social message me-1" href="#0" type="button"
                                        aria-label="Share on Messages"></a>
                                    <a class="btn btn-social link" href="#0" type="button" aria-label="Share link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-image">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
                                alt="">
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
    <!-- END POPULAR SLIDER -->

    <!-- START TOPICS SLIDER -->
    <div class="topics-slider bg-gray section-gap">
        <div class="container">
            <h2 class="section-title mb-4">Trending Topics</h2>
            <div class="list-topic row">
                <?php 
                $cats = get_categories();

                foreach ($cats as $cat) {
                ?>
                <div class="single-topic col-lg-2 col-md-4 col-6">
                    <div class="inner">
                        <img class="img-fluid" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($cat->term_id);  ?>" alt="">
                        <a href="<?php echo get_category_link($cat->term_id) ?>" class="stretched-link">
                            <h5 class="topic"><?php echo $cat->name ?></h5>
                        </a>
                    </div>
                </div>
                    
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
    <!-- END TOPICS SLIDER -->

<?php get_footer(); ?>

 