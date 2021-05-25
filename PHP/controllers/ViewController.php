<?php
require_once "./PHP/warrper.php";
function getView($viewName, $options){
    genHTMLFirst();
    genHead($options['title']);
    include "./PHP/view/" . $viewName . ".php"; 
    genHTMLEnd();
}