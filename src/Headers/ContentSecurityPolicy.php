<?php

namespace SecureHeaders\Headers;

defined('C5_EXECUTE') or die('Access Denied.');

Class ContentSecurityPolicy{

    private $directives = [
        'default-src' => ["'self"],
        'script-src' => ["'self'", 'https:'],
        'style-src' => ["'self"],
        'img-src' => ["'self"],
        'connect-src' => ["'self"],
        'font-src' => ["'self"],
        'object-src' => ["'self"],
        'media-src' => ["'self"],
        'base-uri' => ["'self"],
        'frame-src' => ["'self"],
        'child-src' => ["'self"],
        'form-action' => ["'self"],
        'frame-ancestors' => ["'self"],
    ];

    public function toString(){
        $header = 'Content-Security-Policy: ';
        foreach($this->directives as $directive=>$value){
            $header .= $directive.' '.implode(' ',$value).'; ';
        }
        return $header;
    }

    public function setDirectives(array $directives){
        foreach($directives as $directive => $value){
            $this->directives[$directive] = $value;
        }
    }


    // public function removeDirectiveValue($directive, $value){
    //     $this->$directives[$directive] = array_filter($this->$directives[$directive], $this->removeFromDirective( $i, $value));
    // }

    // private function removeFromDirective($value, $remove){
    //      return $value != $remove;
    // }
}