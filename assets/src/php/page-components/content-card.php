<div class="grid-x grid-margin-x">

    <div class="plate card cell large-offset-6 large-6 medium-offset-3 medium-9 small-12">

        <?php
        if (have_posts()) : while (have_posts()) : the_post();

                get_template_part('assets/src/php/page-components/loop', 'pagealt');
            endwhile;
        endif;
        ?>
    </div>
</div>