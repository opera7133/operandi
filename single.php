<?php get_header(); ?>
    <main>
        <div class="content article single">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <article>
                <h2 class="title"><?php the_title(); ?></h2>
                <time class="date"><i class="ori-time"></i>
                <?php if (get_theme_mod("or_main_design_datetime")):
                    the_time(get_theme_mod("or_main_design_datetime"));
                else:
                    the_time("Y年n月j日");
                endif; ?>
                </time>
                <div class="post-categories">
                <?php
                $categories = get_the_category();
                foreach ($categories as $category) {
                    echo '<li><a href="' .
                        get_category_link($category->term_id) .
                        '"><i class="ori-category"></i>' .
                        $category->name .
                        "</a></li>";
                }
                ?>
                </div>
                <?php if (
                    strpos(
                        get_theme_mod("or_sns_display_place"),
                        "article_top"
                    ) !== false
                ): ?>
                <div class="sns">
                    <?php
                    if (
                        strpos(get_theme_mod("or_sns_services"), "twitter") !==
                        false
                    ): ?>
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="Tweet" class="twitter">
                            <i class="ori-twitter text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    if (
                        strpos(get_theme_mod("or_sns_services"), "facebook") !==
                        false
                    ): ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="Facebook" class="facebook">
                            <i class="ori-facebook text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    if (
                        strpos(get_theme_mod("or_sns_services"), "hatena") !==
                        false
                    ): ?>
                    <a href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="hatena" class="hatena">
                            <i class="ori-hatena text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    if (
                        strpos(get_theme_mod("or_sns_services"), "pocket") !==
                        false
                    ): ?>
                    <a href="https://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="pocket" rel="noopener noreferrer"
                        class="pocket">
                            <i class="ori-pocket text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    if (
                        strpos(get_theme_mod("or_sns_services"), "line") !==
                        false
                    ): ?>
                    <a href="https://timeline.line.me/social-plugin/share?url=<?php the_permalink(); ?>" class="line" target="_blank" title="line" rel="noopener noreferrer">
                            <i class="ori-line text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    if (
                        strpos(get_theme_mod("or_sns_services"), "url") !==
                        false
                    ): ?>
                    <a href="javascript:OnClickURL();" class="url" title="Copy to Clipboard"
                        data-clipboard-text="<?php the_title(); ?> <?php the_permalink(); ?>" id="url">
                            <i class="ori-url text-lg mr-2"></i>
                    </a>
                    <?php endif;
                    ?>
                </div>
                <?php endif; ?>
                <section><?php the_content(); ?></section>
                <?php if (
                    strpos(
                        get_theme_mod("or_sns_display_place"),
                        "article_bottom"
                    ) !== false
                ): ?>
                <div class="sns">
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="Tweet" class="twitter">
                            <i class="ori-twitter text-lg mr-2"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="Facebook" class="facebook">
                            <i class="ori-facebook text-lg mr-2"></i>
                    </a>
                    <a href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"
                        title="hatena" class="hatena">
                            <i class="ori-hatena text-lg mr-2"></i>
                    </a>
                    <a href="https://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="pocket" rel="noopener noreferrer"
                        class="pocket">
                            <i class="ori-pocket text-lg mr-2"></i>
                    </a>
                    <a href="https://timeline.line.me/social-plugin/share?url=<?php the_permalink(); ?>" class="line" target="_blank" title="line" rel="noopener noreferrer">
                            <i class="ori-line text-lg mr-2"></i>
                    </a>
                    <a href="javascript:OnClickURL();" class="url" title="Copy to Clipboard"
                        data-clipboard-text="<?php the_title(); ?> <?php the_permalink(); ?>" id="url">
                            <i class="ori-url text-lg mr-2"></i>
                    </a>
                </div>
                <?php endif; ?>
            </article>
            <?php if (!get_theme_mod("or_single_design_related")):

                if (has_category()) {
                    $catlist = get_the_category();
                    $category = [];
                    foreach ($catlist as $cat) {
                        $category[] = $cat->term_id;
                    }
                }
                $args = [
                    "post_type" => "post",
                    "posts_per_page" => "5",
                    "post__not_in" => [$post->ID],
                    "category__in" => $category,
                    "orderby" => "rand",
                ];
                $related_query = new WP_Query($args);
                ?>
            <div class="related">
                <h3>関連記事</h3>
                <ul class="related_post_container">
                    <?php while ($related_query->have_posts()):
                        $related_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()):
                                the_post_thumbnail("medium");
                            else:
                                 ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                            <?php
                            endif; ?>
                            <div>
                                <h4><?php the_title(); ?></h4>
                                <time><i class="ori-time"></i><?php the_time(
                                    get_option("date_format")
                                ); ?></time>
                                <p><?php if (
                                    get_theme_mod(
                                        "or_main_design_excerpt_num"
                                    ) !== "0"
                                ):
                                    echo get_the_excerpt();
                                endif; ?></p>
                            </div>
                        </a>
                    </li>
                    <?php
                    endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </div>
            <?php
            endif; ?>
            <div class="comments">
            <?php comments_template(); ?>
            </div>
        </div>
        <?php if (!get_theme_mod("or_single_design_sidebar")):
            get_sidebar();
        endif; ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
