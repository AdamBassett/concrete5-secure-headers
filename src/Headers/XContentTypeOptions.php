<?php

namespace SecureHeaders\Headers;

defined('C5_EXECUTE') or die('Access Denied.');

class XContentTypeOptions{

    private $directives = [
        'nosniff' => true,
    ];

    public function toString(){
        $header = 'X-Content-Type-Options: ';
        foreach($this->directives as $directive=>$value){
            if($value){
                $header .= $directive.';'; 
            }
    
        }
        return $header;
    }
}