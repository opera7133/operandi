<?php
function or_setup()
{
    add_theme_support("post-thumbnails");
    add_theme_support("menus");
    register_sidebar([
        "name" => "サイドバー",
        "id" => "main-sidebar",
    ]);
}
add_action("after_setup_theme", "or_setup");

include "inc/customizer.php";
include "inc/toc.php";

// SVG対応
function custom_mime_types($mimes)
{
    $mimes["svg"] = "image/svg+xml";
    return $mimes;
}
add_filter("upload_mimes", "custom_mime_types");

function or_customize_controls_enqueue_scripts()
{
    wp_enqueue_script(
        "or-theme-customize",
        get_template_directory_uri() . "/js/control.js",
        [],
        filemtime(get_template_directory() . "/js/control.js"),
        true
    );
    wp_enqueue_style(
        "or-theme-customize-css",
        get_template_directory_uri() . "/css/customizer.css"
    );
}
add_action(
    "customize_controls_enqueue_scripts",
    "or_customize_controls_enqueue_scripts"
);
add_theme_support("custom-logo");

require "lib/update-checker/plugin-update-checker.php";
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    "https://opr.wmsci.com/version.json",
    __FILE__,
    "Operandi"
);

function prism()
{
    wp_enqueue_style(
        "prism-style",
        get_template_directory_uri() . "/css/prism.css"
    );
    wp_enqueue_script(
        "prism-script",
        get_template_directory_uri() . "/js/prism.js"
    );
}
if (get_theme_mod("or_main_design_prismjs")):
    add_action("wp_enqueue_scripts", "prism");
endif;

function change_excerpt_length($length)
{
    return get_theme_mod("or_main_design_excerpt_num") ?: 50;
}
add_filter("excerpt_length", "change_excerpt_length", 999);

function change_excerpt_more($more)
{
    return get_theme_mod("or_main_design_excerpt_text") ?: "...";
}
add_filter("excerpt_more", "change_excerpt_more");

function or_register_block()
{
    $registerBlocks = ["/blocks/linkcard", "/blocks/alert"];
    function or_register_block_loop($BlockDir)
    {
        $blockType = basename($BlockDir);

        wp_register_script(
            $blockType,
            get_template_directory_uri() . $BlockDir . "/block.js",
            ["wp-blocks", "wp-element"],
            "1.0.0",
            true
        );

        wp_enqueue_style(
            $blockType,
            get_template_directory_uri() . $BlockDir . "/style.css",
            [],
            "1.0.0"
        );

        include substr($BlockDir, 1, strlen($BlockDir) - 1) . "/index.php";
    }
    $blockRegister = "or_register_block_loop";
    foreach ($registerBlocks as $value) {
        $blockRegister($value);
    }
}

add_action("init", "or_register_block");

function custom_user_meta($wb)
{
    $wb["twitter"] = __("Facebook ユーザー名", "text_domain");
    $wb["twitter"] = __("Twitter ユーザー名", "text_domain");
    $wb["github"] = __("Github URL", "text_domain");
    $wb["telegram"] = __("Telegram URL", "text_domain");
    $wb["youtube"] = __("Youtube URL", "text_domain");
    $wb["discord"] = __("Discord URL", "text_domain");
    $wb["soundcloud"] = __("Soundcloud URL", "text_domain");
    return $wb;
}
add_filter("user_contactmethods", "custom_user_meta");
