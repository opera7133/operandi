<?php get_header(); ?>
    <main>
        <div class="content list">
        <h2 class="list-title">カテゴリー：<?php single_cat_title(); ?></h2>
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
            <a href="<?php echo get_permalink(); ?>">
                <div class="col">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img src="https://tella.pages.dev/img/default.jpg" />
                    <?php endif; ?>
                    <div class="details">	
                        <h3><?php the_title(); ?></h3>
                        <time>
                            <?php if (get_theme_mod('or_main_design_datetime')):
                                the_time(
                                    get_theme_mod('or_main_design_datetime')
                                );
                            else:
                                the_time('Y年n月j日');
                            endif; ?></time>
                        <div class="category">
                        <?php
                        $category = get_the_category();
                        echo '<div>' . $category[0]->name . '</div>';
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
            'mid_size' => 1,
            'prev_text' => '&lt;&lt;前へ',
            'next_text' => '次へ&gt;&gt;',
            'screen_reader_text' => ' ',
        ];
        the_posts_pagination($args);
        ?>
        </div>
        <?php get_sidebar(); ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
