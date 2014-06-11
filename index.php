<?php get_header(); ?>

    <?php echo apply_filters('the_content', get_post_field('post_content', get_option('page_for_posts'))); ?>

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