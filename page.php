
    <?php get_header(); ?>
    <main>
        <div class="content article page">
            <article>
                <h2 class="title"><?php the_title(); ?></h2>
                <time class="date"><i class="ori-time"></i>
                <?php the_time(get_option("date_format")); ?>
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
