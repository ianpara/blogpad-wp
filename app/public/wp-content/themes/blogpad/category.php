<?php 
get_header();
// Check if there are any posts to display
if ( have_posts() ) : ?>

<!-- START HEADER -->
<div class="cat-header bg-gray d-flex align-items-center pt-0 ">
    <div class="container">
        <h1 class="title"><?php single_cat_title(); ?></h1>
    </div>      
</div>
<!-- END HEADER -->

<!-- START ARCHIVE SECTION -->
<div class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <?php
                while ( have_posts() ) : the_post();      
                    $profilePic = get_profile_pic(get_the_author());
                ?>
                <div class="archive d-flex mb-3 position-relative">
                    <div class="thumbnail me-2">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
                        alt="blog image" class="me-3 img-fluid">
                    </div>
                    <div class="post-meta ">
                        <div class="topic pb-3"><?php the_category(" ") ?></div>
                        <h2 class="title fs-4"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></h2>
                        <div class="d-flex justify-content-between align-items-center pt-4 position-relative w-100">
                            <div class="author d-flex align-items-center">
                                <!-- <img src="<?php echo $profilePic  ?>"
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
                </div>

                <?php endwhile; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- END ARCHIVE SECTION -->

<?php endif; ?>

<?php get_footer(); ?>

 