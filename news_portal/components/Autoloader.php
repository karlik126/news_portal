<?php
function replaceUnderscores ($classname ) {
    $path = str_replace ( '_' , DIRECTORY_SEPARATOR, $classname ) ;
    if ( file_exists ( "$path.php") ) {
        require_once ("$path.php") ;}
}
function myNamespaceAutoload ($path) {
    if ( preg_match ( ' / \ \ \ \ / ', $path ) ) {
        $path=str_replace ('\\' , DIRECTORY_SEPARATOR, $path);
    }
    if ( file_exists( "$path.php")){
        require_once ("$path.php");
    }}
spl_autoload_register ( 'replaceUnderscores' ) ;
spl_autoload_register ( 'myNamespaceAutoload' ) ;