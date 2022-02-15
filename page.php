
    <?php get_header(); ?>
    <main>
        <div class="content article page">
            <article>
                <h2 class="title"><?php the_title(); ?></h2>
                <time class="date"><i class="ori-time"></i>
                <?php if (get_theme_mod("or_main_design_datetime")):
                    the_time(get_theme_mod("or_main_design_datetime"));
                else:
                    the_time("Y年n月j日");
                endif; ?>
                </time>
                <section><?php the_content(); ?></section>
            </article>
        </div>
        <?php if (!get_theme_mod("or_page_design_sidebar")):
            get_sidebar();
        endif; ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
