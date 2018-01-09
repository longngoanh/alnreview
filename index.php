<?php
require_once './db/db_manager.php';
require_once './db/c_article.php';
require_once './db/c_employee.php';
require_once './db/c_images.php';
require_once './common_func.php';

/**
 * CSS DECLARE SECTION
 */
$aszCssResource = array();
array_push($aszCssResource, "css/template.css");
array_push($aszCssResource, "https://mindmup.github.io/bootstrap-wysiwyg/external/google-code-prettify/prettify.css");
//array_push($aszCssResource, "https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css");
array_push($aszCssResource, "https://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css");
array_push($aszCssResource, "https://mindmup.github.io/bootstrap-wysiwyg/index.css");

/**
 * JAVASCRIPT DECLARE SECTION
 */
$aszJsResource = array();
array_push($aszJsResource, "https://platform.twitter.com/widgets.js");
array_push($aszJsResource, "https://mindmup.github.io/bootstrap-wysiwyg/external/jquery.hotkeys.js");
array_push($aszJsResource, "https://mindmup.github.io/bootstrap-wysiwyg/external/google-code-prettify/prettify.js");
//array_push($aszJsResource, "https://mindmup.github.io/bootstrap-wysiwyg/bootstrap-wysiwyg.js");
array_push($aszJsResource, "js/bootstrap-wysiwyg.js");
array_push($aszJsResource, "js/dragImageAndDropToUpload.js");

echo get_ip_address();die;

$szHTML = "";
$szContent = "";
$szContent .= GetImageSlider();
$szContent .= GetTopViewArticles();
$szContent .= GetShowArticlesArea();
$szContent .= GetTextEditorArea();
$szContent .= GetFooterPage();

$szHTML .= OpenHTML($aszCssResource, $aszJsResource);
    $szHTML .= AddNavigationBar();
    $szHTML .= GetMainContentArea($szContent);
    
$szHTML .= CloseHTML();

echo $szHTML;

?>