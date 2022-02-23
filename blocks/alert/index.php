<?php

register_block_type("operandi/alert", [
    "editor_script" => "alert",
    "attributes" => [
        "icon" => [
            "type" => "string",
        ],
        "content" => [
            "type" => "string",
        ],
        "className" => [
            "type" => "string",
        ],
        "textColor" => [
            "type" => "string",
        ],
        "backgroundColor" => [
            "type" => "string",
        ],
        "style" => [
            "type" => "object",
        ],
    ],
    "render_callback" => "OR_alert",
]);

function OR_alert($attributes)
{
    $bgColor = $attributes["style"]["color"]["background"]
        ? $attributes["style"]["color"]["background"]
        : "var(--wp--preset--color--" . $attributes["backgroundColor"] . ")";
    $textColor = $attributes["style"]["color"]["text"]
        ? $attributes["style"]["color"]["text"]
        : "var(--wp--preset--color--" . $attributes["textColor"] . ")";
    $html = "";
    $html .=
        '<div class="alert ' .
        $attributes["className"] .
        '" style="background-color:' .
        $bgColor .
        "; color:" .
        $textColor .
        ';">';

    $html .=
        '<span class="dashicons dashicons-' . $attributes["icon"] . '"></span>';
    $html .= $attributes["content"];
    $html .= "</div>";
    return $html;
}
