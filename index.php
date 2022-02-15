<?php get_header(); ?>
    <main>
        <div class="content list">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
            <a href="<?php echo get_permalink(); ?>">
                <div class="col">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                    <?php endif; ?>
                    <div class="details">	
                        <h3><?php the_title(); ?></h3>
                        <time><i class="ori-time"></i>
                            <?php if (get_theme_mod("or_main_design_datetime")):
                                the_time(
                                    get_theme_mod("or_main_design_datetime")
                                );
                            else:
                                the_time("Y年n月j日");
                            endif; ?></time>
                        <p><?php if (
                            get_theme_mod("or_main_design_excerpt_num") !== "0"
                        ):
                            echo get_the_excerpt();
                        endif; ?></p>
                        <div class="category">
                        <?php
                        $category = get_the_category();
                        if ($category[0]->name !== ""):
                            echo '<div><i class="ori-category"></i>' .
                                $category[0]->name .
                                "</div>";
                        endif;
                        ?>
                        </div>
                    </div>
                </div>
            </a>
	      <?php
            endwhile;
        endif; ?>
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
