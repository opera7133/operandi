
    <?php get_header(); ?>
    <main>
        <div class="content article">
            <article>
                <h2 class="title"><?php the_title(); ?></h2>
                <section><?php the_content(); ?></section>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
