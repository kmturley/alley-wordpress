<?php get_header(); ?>
    <div class="panel-grid panel-grid-style-default">
        <div class="panel-grid-cell">
            <div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child">
                <div class="textwidget">
                    <?php echo apply_filters('the_title', get_post_field('post_content', get_option('page_for_posts'))); ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (get_queried_object_id() == get_option('page_for_posts')) : ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    <?php endif; ?>

<?php get_footer(); ?>