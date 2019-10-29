<?php

namespace SecureHeaders\Headers;

defined('C5_EXECUTE') or die('Access Denied.');

class XFrameOptions{
   
    private $directive;

    public function __construct(string $directive='SAMEORIGIN'){
        $this->directive=$directive; 
        $header = 'X-Frame-Options: '.$directive;
        return $header;
    }
    
    public function toString(){
        return  'X-Frame-Options: '.$this->directive;
    }
}