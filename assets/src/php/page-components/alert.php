<?php if (get_post_meta($post->ID, 'alert_metabox_value', true)) : ?>

    <br>

    <div id="alert" class="alert card dark grid-x grid-margin-x grid-margin-y" data-closable>
        <div class="cell large-1 medium-2 small-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/white/bullhorn.svg" />
        </div>
        <div class="cell large-10 medium-8 small-6">
            <?php echo apply_filters('the_content', get_post_meta($post->ID, 'alert_metabox_value', true)); ?>
        </div>
        <div class="cell large-1 medium-2 small-3">
            <button id="hide" class="close cell large-1" aria-label="Dismiss alert" data-close>
                <span aria-hidden="true">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/white/checkbox-x.svg" />
                </span>
            </button>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
                jQuery("#hide").click(function() {
                        jQuery("#alert").hide();
                    }

                );
            }

        );
    </script>
<?php else : endif; ?>