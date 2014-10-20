<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="panel-grid panel-grid-style-full">
                <div class="panel-row-style-full panel-row-style">
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
            <div class="panel-grid panel-grid-style-default">
                <div class="panel-grid-cell">
                    <div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child">
                        <div class="textwidget">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_time('l, F jS, Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>