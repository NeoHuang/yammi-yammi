<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YHtml
 *
 * @author root
 */
class YHtml {

    public static function openTag($tagName, $htmlOptions = array()) {
        echo '<' . $tagName . self::renderOptions($htmlOptions) . '>';
    }

    public static function closeTag($tagName) {
        echo '</' . $tagName . '>';
    }

    public static function renderOptions($htmlOptions) {
        $html = '';
        foreach ($htmlOptions as $name => $value) {
            $html .= ' ' . $name . '="' . $name . '"';
        }
        return $html;
    }

    public static function cssFile($url) {
        return '<link rel="stylesheet" type="text/css" href="' . Config::$domain . DS . Config::$css_folder . DS . self::encode($url) . '" />';
    }

    public static function imgURL($url) {
        return Config::$domain . DS . Config::$img_folder . DS . self::encode($url);
    }

    public static function scriptFile($url) {
        return '<script type="text/javascript" src="' . Config::$domain . DS . Config::$js_folder . DS . self::encode($url) . '"></script>';
    }

    public static function encode($text) {

        return htmlspecialchars($text, ENT_QUOTES);
    }

    public static function decode($text) {
        return htmlspecialchars_decode($text, ENT_QUOTES);
    }

}

?>
