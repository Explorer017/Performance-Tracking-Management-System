<?php
function GetLanguage(){
    if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
    } else{
        $lang = 'en';
    } 
    if ($lang != 'en' && $lang != 'bm'){
        $lang = 'en';
    }
    return $lang;
}
