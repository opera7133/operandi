<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta content="<?php echo basename("/blocks/linkcard"); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/modern-normalize.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/icon.css" />
    <?php if (is_front_page() || is_home()): ?>
    <title><?php bloginfo("name"); ?></title>
    <?php elseif (is_singular()): ?>
    <title><?php the_title(); ?> | <?php bloginfo("name"); ?></title>
    <?php elseif (is_category() || is_tag()): ?>
    <title><?php single_cat_title(); ?> | <?php bloginfo("name"); ?></title>
    <?php elseif (is_author()): ?>
    <title><?php echo get_the_author(); ?> | <?php bloginfo("name"); ?></title>
    <?php else: ?>
    <title><?php the_title(); ?> | <?php bloginfo("name"); ?></title>
    <?php endif; ?>  
    <?php
    if (get_theme_mod("or_main_design_googlefonts")): ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=<?php
    $values = get_theme_mod("or_main_design_googlefonts");
    echo str_replace(",", ":wght@400;700&", $values . ",");
    ?>display=swap" rel="stylesheet">
    <?php endif;
    wp_head();
    ?>
</head>

<body>
<header>
    <nav>
        <h2>
            <?php
            the_custom_logo();
            if (!has_custom_logo()) {
                echo '<a href="' .
                    home_url() .
                    '" rel="home">' .
                    get_bloginfo("name") .
                    "</a>";
            }
            ?> 
        </h2>
        <?php
        $args = [
            "container" => false,
        ];
        wp_nav_menu($args);
        ?>
        <div id="overlay">
            <?php wp_nav_menu($args); ?>
        </div>
        <div id="hamburgerbtn" class="mobile">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
    </nav>
</header>