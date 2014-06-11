<div class="panel-grid">
    <div class="panel-row-style-restricted-width panel-row-style">
        <div class="panel-grid-cell w1of3">
            <div class="panel widget widget_siteorigin-panels-image panel-first-child">
                <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } else {
                        echo '<img src="'.get_template_directory_uri().'/img/blank.jpg" alt="" />';
                    }
                ?>
            </div>
        </div>
        <div class="panel-grid-cell w2of3">
            <div class="panel widget widget_black-studio-tinymce panel-last-child">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="s5"><?php the_time('l, F jS, Y'); ?></p>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>