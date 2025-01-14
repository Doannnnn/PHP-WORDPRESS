<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
            <div class="page-banner">
                <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
                <div class="page-banner__content container container--narrow">
                    <h1 class="page-banner__title"><?php the_title() ?></h1>
                    <!-- <div class="page-banner__intro">
                        <p>keep up with latest news</p>
                    </div> -->
                </div>
            </div>

            <div class="container container--narrow page-section">
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo site_url("/programs") ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Back to Programs
                        </a>
                        <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time('j.m.Y'); ?></span>
                    </p>
                </div>
                <div class="generic-content">
                    <?php the_content() ?>

                    <?php
                        $today = date("Ymd");
                        $eventsHomePage = new WP_Query(
                            array(
                                "posts_per_page" => 2,
                                "post_type" => "event",
                                "meta_key" => "events_date",
                                "orderby" => "meta_value_num",
                                "order" => "desc",
                                "meta_query" => array(
                                    array(
                                        "key" => "events_date",
                                        "compare" => ">=",
                                        "value" => $today,
                                        "type" => "numberic"
                                    ),
                                    array(
                                        "key" => "related_programs",
                                        "compare" => "=",
                                        "value" => '""' . get_the_ID() . '""',
                                    )
                                )
                            )
                        );

                        while ($eventsHomePage->have_posts()) {
                        $eventsHomePage->the_post();
                        ?>
                            <div class="event-summary">
                                <a class="event-summary__date t-center" href="#">
                                    <?php
                                        $eventsDate = new DateTime(get_field("events_date")); 
                                    ?>
                                    <span class="event-summary__month"><?php echo $eventsDate->format("M") ?></span>
                                    <span class="event-summary__day"><?php echo $eventsDate->format("d") ?></span>
                                </a>
                                <div class="event-summary__content">
                                    <h5 class="event-summary__title headline headline--tiny">
                                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                    </h5>
                                    <p>
                                        <?php echo wp_trim_words(get_the_content(), 25) ?>
                                        <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        <?php
    }
}

get_footer(); 
?>