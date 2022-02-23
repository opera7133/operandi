<?php

require dirname(__FILE__) . "/../../inc/ogp.php";

register_block_type("operandi/linkcard", [
    "editor_script" => "linkcard",
    "attributes" => [
        "content" => [
            "type" => "string",
        ],
        "className" => [
            "type" => "string",
        ],
    ],
    "render_callback" => "OR_linkcard",
]);

function OR_linkcard($attributes)
{
    $content = OpenGraph::fetch($attributes["content"]);
    $html = "";
    $html .=
        '<a href="' .
        $attributes["content"] .
        '" class="linkcard ' .
        $attributes["className"] .
        '">';
    if ($content->image):
        $html .= '<img src="' . $content->image . '" class="linkcard-image" />';
    endif;
    $html .=
        "<div class='details'><p class='linkcard-title'>" .
        $content->title .
        "</p>";
    if ($content->description):
        $html .=
            "<p class='linkcard-description'>" . $content->description . "</p>";
    endif;
    $html .= "</div></a>";
    return $html;
}
