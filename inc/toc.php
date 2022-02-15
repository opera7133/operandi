<?php
function add_index($content)
{
    if (is_single()) {
        $pattern = "/<h[1-6].*?>(.+?)<\/h[1-6]>/s";
        preg_match_all($pattern, $content, $elements, PREG_SET_ORDER);

        if (count($elements) >= 1) {
            $toc = "";
            $currentlevel = 0;
            $i = 1;

            foreach ($elements as $element) {
                $regex = "/" . preg_quote($element[0], "/") . "/su";
                preg_match(
                    '/<(h[1-6] id="(.*)?")>(.+)?<\/(h[1-6])>/s',
                    $element[0],
                    $id
                );

                $id[2] = empty($id[2]) ? "chapter-" . $i : $id;

                if (strpos($element[0], "<h2") !== false) {
                    $level = 1;
                } elseif (strpos($element[0], "<h3") !== false) {
                    $level = 2;
                } elseif (strpos($element[0], "<h4") !== false) {
                    $level = 3;
                } elseif (strpos($element[0], "<h5") !== false) {
                    $level = 4;
                } elseif (strpos($element[0], "<h6") !== false) {
                    $level = 5;
                }

                while ($currentlevel < $level) {
                    if (0 === $currentlevel) {
                        $toc .= '<ol class="toc__list">';
                    } else {
                        $toc .= '<ol class="toc__list_child">';
                    }
                    $currentlevel++;
                }

                while ($currentlevel > $level) {
                    $toc .= "</li></ol>";
                    $currentlevel--;
                }

                $toc .=
                    '<li class="toc__item"><a href="#' .
                    $id[2] .
                    '" class="toc__link">' .
                    $element[1] .
                    "</a>";
                $i++;
            }

            while ($currentlevel > 0) {
                $toc .= "</li></ol>";
                $currentlevel--;
            }

            $index =
                '<details class="toc" open><summary class="toc__title">目次</summary>' .
                $toc .
                "</details>";
            $h2 = "/<h2.*?>/i";

            if (preg_match($h2, $content, $h2s)) {
                $content = preg_replace($h2, $index . $h2s[0], $content, 1);
            }
        }
    }
    return $content;
}
if (!get_theme_mod("or_single_design_toc")):
    add_filter("the_content", "add_index");
endif;
