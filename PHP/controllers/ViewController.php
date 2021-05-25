<?php
require_once "./PHP/warrper.php";
require_once "./config/siteoptions.php";
function getView($viewName, $options){
    global $SITE_NAME, $NAVOPTIONS;
    genHTMLFirst();
    genHead($options['title']);
    genNavBar($options['nowpage']);
    include "./PHP/view/" . $viewName . ".php"; 
    genHTMLEnd();
}