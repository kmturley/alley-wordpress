<?php get_header(); ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="panel-grid">
                <div class="panel-row-style-full-width panel-row-style">
                    <div class="panel-grid-cell w1of1">
                        <div class="panel widget widget_siteorigin-panels-image panel-first-child panel-last-child">
                            <?php 
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="'.get_template_directory_uri().'/img/blank.jpg" alt="" />';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-grid">
                <div class="panel-row-style-restricted-width panel-row-style">
                    <div class="panel-grid-cell w1of1">
                        <div class="panel widget widget_black-studio-tinymce panel-last-child">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_time('l, F jS, Y'); ?></p>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>