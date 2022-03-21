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
    $url = $attributes["content"];
    $content = OpenGraph::fetch($url);
    $page = mb_convert_encoding(file_get_contents($url), "utf-8", "auto");
    preg_match("/<title>(.*?)</title>/", $page, $res);
    $tags = get_meta_tags($url);
    $description = @$tags["description"] ? $tags["description"] : "NULL";
    $title = $res[1] ? $res[1] : $url;
    $html = "";
    $html .=
        '<a href="' .
        $attributes["content"] .
        '" class="or-linkcard ' .
        $attributes["className"] .
        '">';
    if ($content->image):
        $html .=
            '<img src="' . $content->image . '" class="or-linkcard-image" />';
    endif;
    if ($content->title):
        $html .=
            "<div class='details'><p class='or-linkcard-title'>" .
            $content->title .
            "</p>";
    elseif ($title):
        $html .=
            "<div class='details'><p class='or-linkcard-title'>" .
            $title .
            "</p>";
    endif;
    if ($content->description):
        $html .=
            "<p class='or-linkcard-description'>" .
            $content->description .
            "</p>";
    elseif ($description):
        $html .= "<p class='or-linkcard-description'>" . $description . "</p>";
    endif;
    $html .= "</div></a>";
    return $html;
}
