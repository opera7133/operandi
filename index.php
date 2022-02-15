<?php get_header(); ?>
    <main>
        <div class="content list">
        <?php
        $ads_infeed = get_theme_mod("or_ads_infeed_counts") ?: "3";
        $ads_infeed_max = get_theme_mod("or_ads_infeed_max") ?: "3";
        $ads_infeed_count = "1";
        if (have_posts()):
            while (have_posts()):
                the_post(); ?>
            <?php
            if (
                $ads_infeed_count % $ads_infeed == 0 &&
                $ads_infeed_count / $ads_infeed < $ads_infeed_max &&
                get_theme_mod("or_ads_infeed")
            ) {
                echo get_theme_mod("or_ads_infeed"); ?>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <?php
            }
            $ads_infeed_count++;
            ?>
            <a href="<?php echo get_permalink(); ?>">
                <div class="col">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                    <?php endif; ?>
                    <div class="details">
                        <div>	
                            <h3><?php the_title(); ?></h3>
                            <time><i class="ori-time"></i>
                            <?php the_time(get_option("date_format")); ?></time>
                            <p><?php if (
                                get_theme_mod("or_main_design_excerpt_num") !==
                                "0"
                            ):
                                echo get_the_excerpt();
                            endif; ?></p>
                        </div>
                        <div class="category">
                        <?php if (!get_theme_mod("or_list_design_category")):
                            $category = get_the_category();
                            if (!is_null($category[0]->name)):
                                echo '<div><i class="ori-category"></i>' .
                                    $category[0]->name .
                                    "</div>";
                            endif;
                        endif; ?>
                        </div>
                    </div>
                </div>
            </a>
	      <?php
            endwhile;
        endif;
        ?>
        <?php
        $args = [
            "mid_size" => 1,
            "prev_text" => "&lt;",
            "next_text" => "&gt;",
            "screen_reader_text" => " ",
        ];
        the_posts_pagination($args);
        ?>
        </div>
        <?php if (!get_theme_mod("or_list_design_sidebar")):
            get_sidebar();
        endif; ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
