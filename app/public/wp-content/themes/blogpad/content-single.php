
<?php $profilePic = get_profile_pic(get_the_author()); ?>
<div class="col-lg-8 col-12">
    <div class="post-meta pb-4">
        <div class="topic pb-3"><a href="#0"><span data-content="Tech"><?php the_category(" ") ?></span></a></div>
            <h1 class="title"><?php the_title(); ?></h1>
        <div class="d-flex flex-lg-row flex-column gap-3 justify-content-between pt-4 position-relative w-100">
            <div class="author d-flex align-items-center">
                <img src="<?php echo $profilePic ?>"
                    alt="Authors profile picture" class="me-3">
                <div class="">
                    <div class="name pb-2"><?php the_author(); ?></div>
                    <div class="d-flex">
                        <div class="date position-relative"><?php the_date(); ?></div>
                        <div class="read-time ms-3">5 min. read</div>
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
    <div class="content">
        <?php the_content(); ?>
    </div>
</div>