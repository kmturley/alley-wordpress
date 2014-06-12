<?php get_header(); ?>

    <div class="panel-grid">
        <div class="panel-row-style-restricted-width panel-row-style">
            <div class="panel-grid-cell w1of1">
                <div class="panel">
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