<?php
function or_customize($wp_customize)
{
    include "control.php";
    $wp_customize->add_panel("or_design", [
        "title" => "[OPR]デザイン",
        "priority" => 700,
    ]);

    // 全体
    $wp_customize->add_section("or_main_design", [
        "title" => "全体",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_main_design_font", [
        "default" =>
            "system-ui,-apple-system,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji'",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_main_design_font", [
            "label" => "フォント",
            "description" => "使用するフォント<br>例：Poppins, Noto Sans JP",
            "section" => "or_main_design",
        ])
    );

    $wp_customize->add_setting("or_main_design_googlefonts", [
        "default" => ["Poppins", "Noto+Sans+JP"],
        "sanitize_callback" => "OR_sanitize_multiple_checkbox",
    ]);
    $wp_customize->add_control(
        new OR_Customize_Multiple_Checkbox_Control(
            $wp_customize,
            "or_main_design_googlefonts",
            [
                "section" => "or_main_design",
                "label" => "Google Fonts",
                "description" =>
                    "Google Fontsを使用する場合は使用するフォントにチェックを入れてください",
                "choices" => [
                    "Roboto" => "Roboto",
                    "Poppins" => "Poppins",
                    "Open+Sans" => "Open Sans",
                    "Noto+Sans+JP" => "Noto Sans JP",
                    "Noto+Serif+JP" => "Noto Serif JP",
                    "M+PLUS+1p" => "M PLUS 1p",
                    "Zen+Kaku+Gothic+New" => "Zen Kaku Gothic New",
                    "Murecho" => "Murecho",
                    "Zen+Old+Mincho" => "Zen Old Mincho",
                ],
            ]
        )
    );

    $wp_customize->add_setting("or_main_design_primary", [
        "default" => "#252525",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_main_design_primary",
            [
                "label" => "プライマリ色",
                "section" => "or_main_design",
            ]
        )
    );

    $wp_customize->add_setting("or_main_design_secondary", [
        "default" => "#FFFFFF",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_main_design_secondary",
            [
                "label" => "セカンダリ色",
                "section" => "or_main_design",
            ]
        )
    );

    $wp_customize->add_setting("or_main_design_prismjs");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_main_design_prismjs", [
            "label" => "Prism.jsを使用する",
            "section" => "or_main_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_main_design_excerpt_num", [
        "default" => 50,
    ]);
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_main_design_excerpt_num", [
            "label" => "抜粋する文字数",
            "description" => "0で非表示",
            "section" => "or_main_design",
            "type" => "number",
        ])
    );

    $wp_customize->add_setting("or_main_design_excerpt_text", [
        "default" => "...",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_main_design_excerpt_text", [
            "label" => "省略記号",
            "section" => "or_main_design",
        ])
    );

    $wp_customize->add_setting("or_main_design_rounded");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_main_design_rounded", [
            "label" => "丸っこい感じ",
            "description" => "サイト全体を丸っこい感じにします",
            "section" => "or_main_design",
            "type" => "checkbox",
        ])
    );

    // 全体
    $wp_customize->add_section("or_list_design", [
        "title" => "記事一覧",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_list_design_view");
    $wp_customize->add_control(
        new OR_Customize_Image_Label_Radio_Control(
            $wp_customize,
            "or_list_design_view",
            [
                "label" => "表示形式",
                "section" => "or_list_design",
                "choices" => [
                    "card" => get_template_directory_uri() . "/img/card.jpg",
                    "bar" => get_template_directory_uri() . "/img/bar.jpg",
                ],
            ]
        )
    );

    $wp_customize->add_setting("or_list_design_eyecatch");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_list_design_eyecatch", [
            "label" => "アイキャッチ画像を表示しない",
            "section" => "or_list_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_list_design_sidebar");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_list_design_sidebar", [
            "label" => "サイドバーを表示しない",
            "section" => "or_list_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_list_design_category");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_list_design_category", [
            "label" => "カテゴリーを表示しない",
            "section" => "or_list_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_section("or_page_design", [
        "title" => "固定ページ",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_page_design_sidebar");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_page_design_sidebar", [
            "label" => "サイドバーを表示しない",
            "section" => "or_page_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_section("or_single_design", [
        "title" => "投稿",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_single_design_sidebar");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_single_design_sidebar", [
            "label" => "サイドバーを表示しない",
            "section" => "or_single_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_single_design_related");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_single_design_related", [
            "label" => "関連記事を表示しない",
            "section" => "or_single_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_single_design_toc");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_single_design_toc", [
            "label" => "目次を表示しない",
            "section" => "or_single_design",
            "type" => "checkbox",
        ])
    );

    $wp_customize->add_setting("or_single_design_heading");
    $wp_customize->add_control(
        new OR_Customize_Image_Label_Radio_Control(
            $wp_customize,
            "or_single_design_heading",
            [
                "label" => "見出しスタイル",
                "section" => "or_single_design",
                "choices" => [
                    "default" => get_template_directory_uri() . "/img/hs0.png",
                    "heading1" => get_template_directory_uri() . "/img/hs1.png",
                ],
            ]
        )
    );

    $wp_customize->add_section("or_mobile_design", [
        "title" => "モバイル",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_mobile_design_sidebar");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_mobile_design_sidebar", [
            "label" => "サイドバーを表示しない",
            "section" => "or_mobile_design",
            "type" => "checkbox",
        ])
    );

    // ヘッダー
    $wp_customize->add_section("or_header_design", [
        "title" => "ヘッダー",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_header_design_color", [
        "default" => "#000000",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_header_design_color",
            [
                "label" => "テキスト色",
                "section" => "or_header_design",
            ]
        )
    );

    $wp_customize->add_setting("or_header_design_bgcolor", [
        "default" => "#FFFFFF",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_header_design_bgcolor",
            [
                "label" => "背景色",
                "section" => "or_header_design",
            ]
        )
    );

    // フッター
    $wp_customize->add_section("or_footer_design", [
        "title" => "フッター",
        "panel" => "or_design",
    ]);

    $wp_customize->add_setting("or_footer_design_color", [
        "default" => "#FFFFFF",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_footer_design_color",
            [
                "label" => "テキスト色",
                "section" => "or_footer_design",
            ]
        )
    );

    $wp_customize->add_setting("or_footer_design_bgcolor", [
        "default" => "#252525",
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "or_footer_design_bgcolor",
            [
                "label" => "背景色",
                "section" => "or_footer_design",
            ]
        )
    );

    // SNS
    $wp_customize->add_section("or_sns", [
        "title" => "[OPR]SNS",
        "priority" => 750,
    ]);

    $wp_customize->add_setting("or_sns_services", [
        "sanitize_callback" => "OR_sanitize_multiple_checkbox",
    ]);
    $wp_customize->add_control(
        new OR_Customize_Multiple_Checkbox_Control(
            $wp_customize,
            "or_sns_services",
            [
                "section" => "or_sns",
                "label" => "表示するサービス",
                "description" => "記事内に表示するSNSのサービス",
                "choices" => [
                    "twitter" => "Twitter",
                    "facebook" => "Facebook",
                    "hatena" => "はてなブックマーク",
                    "pocket" => "Pocket",
                    "line" => "LINE",
                    "url" => "URLで共有",
                ],
            ]
        )
    );

    $wp_customize->add_setting("or_sns_display_place");
    $wp_customize->add_control(
        new OR_Customize_Multiple_Checkbox_Control(
            $wp_customize,
            "or_sns_display_place",
            [
                "section" => "or_sns",
                "label" => "表示箇所",
                "description" => "共有リンクの表示箇所を選択",
                "choices" => [
                    "article_top" => "記事本文上",
                    "article_bottom" => "記事本文下",
                ],
            ]
        )
    );

    // 広告
    $wp_customize->add_section("or_ads", [
        "title" => "[OPR]広告",
        "priority" => 800,
    ]);

    $wp_customize->add_setting("or_ads_id");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_ads_id", [
            "label" => "サイト運営者ID",
            "description" => "例：ca-pub-0000000000000000",
            "section" => "or_ads",
        ])
    );

    $wp_customize->add_setting("or_ads_display");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_ads_display", [
            "label" => "ディスプレイ広告",
            "description" => "例：&lt;ins&gt;...&lt;/ins&gt;",
            "section" => "or_ads",
            "type" => "textarea",
        ])
    );

    $wp_customize->add_setting("or_ads_display_place");
    $wp_customize->add_control(
        new OR_Customize_Multiple_Checkbox_Control(
            $wp_customize,
            "or_ads_display_place",
            [
                "section" => "or_ads",
                "label" => "配置箇所",
                "description" => "ディスプレイ広告の配置場所を選択",
                "choices" => [
                    "single_top" => "記事本文上",
                    "single_bottom" => "記事本文下",
                    "page_top" => "固定ページ本文上",
                    "page_bottom" => "固定ページ本文下",
                ],
            ]
        )
    );

    $wp_customize->add_setting("or_ads_infeed");
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_ads_infeed", [
            "label" => "インフィード広告",
            "description" => "例：&lt;ins&gt;...&lt;/ins&gt;",
            "section" => "or_ads",
            "type" => "textarea",
        ])
    );

    $wp_customize->add_setting("or_ads_infeed_counts", [
        "default" => 3,
    ]);
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_ads_infeed_counts", [
            "label" => "表示間隔",
            "section" => "or_ads",
            "type" => "number",
        ])
    );
    $wp_customize->add_setting("or_ads_infeed_max", [
        "default" => 3,
    ]);
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, "or_ads_infeed_max", [
            "label" => "最大表示数",
            "description" => "1ページの最大表示数",
            "section" => "or_ads",
            "type" => "number",
        ])
    );
}
add_action("customize_register", "or_customize");

function theme_customize_css()
{
    ?>
<style type="text/css">
:root {
    <?php if (get_theme_mod("or_main_design_primary")): ?>
    --primary-color: <?php echo get_theme_mod("or_main_design_primary"); ?>;
    <?php endif; ?>
    <?php if (get_theme_mod("or_main_design_secondary")): ?>
    --secondary-color: <?php echo get_theme_mod("or_main_design_secondary"); ?>;
    <?php endif; ?>
}
<?php if (get_theme_mod("or_main_design_rounded")): ?>
.content.list a:not(.page-numbers), .content.list a .opr_col, .content.article .size-post-thumbnail, .content.article .toc {
    border-radius: 1rem;
}
.content.article blockquote {
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
}
.content.list a .opr_col img {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
}
.content.article, .sidebar {
    border-radius: 2rem;
}
.content.article .linkcard, .widget ul li a:not(.recentcomments a) {
    border-radius: 1rem;
}
.content.article .linkcard img {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
}
.content.article .related ul li a { 
    border-radius: 1rem;
}
.content.article .related ul li a img {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
}
.content.article .alert {
    border-radius: 1rem;
}
@media(min-width: 760px) {
    .content.article .linkcard img {
        border-bottom-left-radius: 1rem;
        border-top-right-radius: 0;
    }
    .content.article .related ul li a img {
        border-bottom-left-radius: 1rem;
        border-top-right-radius: 0;
    }
}

<?php endif; ?>
<?php if (get_theme_mod("or_main_design_font")): ?>
html, body {
    font-family: <?php echo get_theme_mod(
        "or_main_design_font"
    ); ?>, system-ui,-apple-system,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji';
}
<?php endif; ?>
header {
<?php if (get_theme_mod("or_header_design_bgcolor")): ?>
  background-color: <?php echo get_theme_mod("or_header_design_bgcolor"); ?>;
  <?php endif; ?>
  <?php if (get_theme_mod("or_header_design_color")): ?>
  color: <?php echo get_theme_mod("or_header_design_color"); ?>;
  <?php endif; ?>
}
header nav .mobile span {
  background: <?php echo get_theme_mod("or_header_design_color"); ?>;
}
footer.footer {
    <?php if (get_theme_mod("or_footer_design_bgcolor")): ?>
  background-color: <?php echo get_theme_mod("or_footer_design_bgcolor"); ?>;
  <?php endif; ?>
  <?php if (get_theme_mod("or_footer_design_color")): ?>
  color: <?php echo get_theme_mod("or_footer_design_color"); ?>;
  <?php endif; ?>
}
<?php if (
    !is_active_sidebar("main-sidebar") ||
    get_theme_mod("or_list_design_sidebar")
): ?>
.content.list {
  grid-column: span 3 / span 3;
  grid-template-columns: repeat(3, minmax(0, 1fr));
}
.pagination {
  grid-column: span 3 / span 3;
}
<?php endif; ?>
<?php if (get_theme_mod("or_page_design_sidebar")): ?>
.content.article.page {
  grid-column: span 3 / span 3;
  grid-template-columns: repeat(3, minmax(0, 1fr));
}
<?php endif; ?>
<?php if (get_theme_mod("or_single_design_sidebar")): ?>
.content.article.single {
  grid-column: span 3 / span 3;
  grid-template-columns: repeat(3, minmax(0, 1fr));
}
<?php endif; ?>
<?php if (get_theme_mod("or_single_design_toc")): ?>
.content.article .toc {
  display: none;
}
<?php endif; ?>
<?php if (get_theme_mod("or_mobile_design_sidebar")): ?>
.sidebar {
    display: none;
}
@media (min-width: 640px) {
  .sidebar {
    display: block;
  }
}
<?php endif; ?>
<?php if (get_theme_mod("or_list_design_eyecatch")): ?>
.content.list a .opr_col img {
    display: none;
}
<?php endif; ?>
<?php if (get_theme_mod("or_list_design_view") == "bar"): ?>

@media (min-width: 640px) {
main {
  gap: 2rem;
}
.content.list {
  display: flex;
}
.content.list a .opr_col img {
  width: 30%;
  height: auto;
  border-top-left-radius: 1rem;
  border-bottom-left-radius: 1rem;
  border-top-right-radius: 0;
}
.content.list a .opr_col {
  flex-direction: row;
  gap: 16px;
}
}
<?php endif; ?>
<?php if (get_theme_mod("or_single_design_heading") == "heading1"): ?>
.content.article h1 {
  font-size: 1.75rem;
  padding-top: 0.4em;
  padding-bottom: 0.4em;
  border-top: 3px solid #000;
  border-bottom: 3px solid #000;
}
.content.article h2:not(.title) {
  padding-top: 0.55em;
  padding-bottom: 0.5em;
  padding-left: 0.5em;
  font-size: 1.4rem;
  background-color: #f6f6f6;
  border-left: 4px solid #222222;
}
.content.article h3 {
  font-size:1.3em;
  padding-bottom: 0.25em;
  line-height: 1.4;
  border-bottom: 1px solid #222222;
}
<?php endif; ?>
</style>
<?php
}
add_action("wp_head", "theme_customize_css");
