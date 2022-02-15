
    <?php get_header(); ?>
    <main>
        <div class="content article page">
            <article>
                <h2 class="title"><?php the_title(); ?></h2>
                <time class="date"><i class="ori-time"></i>
                <?php the_time(get_option("date_format")); ?>
                </time>
                <?php if (
                    strpos(
                        get_theme_mod("or_ads_display_place"),
                        "page_top"
                    ) !== false
                ):
                    echo get_theme_mod("or_ads_display"); ?>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                <?php
                endif; ?>
                <section><?php the_content(); ?></section>
                <?php if (
                    strpos(
                        get_theme_mod("or_ads_display_place"),
                        "page_bottom"
                    ) !== false
                ):
                    echo get_theme_mod("or_ads_display"); ?>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                <?php
                endif; ?>
            </article>
        </div>
        <?php if (!get_theme_mod("or_page_design_sidebar")):
            get_sidebar();
        endif; ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
