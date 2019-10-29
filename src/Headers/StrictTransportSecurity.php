<?php

namespace SecureHeaders\Headers;

defined('C5_EXECUTE') or die('Access Denied.');

class StrictTransportSecurity{

    private $maxAge;
    private $directives = [
        'includeSubDomains' => true,
        'preload' => true
    ];

    public function __construct(string $maxAge='15768000', bool $subDomains=true, bool $preload=true){
        $this->maxAge = $maxAge;
        if(!$subDomains){
            $this->directives['includeSubDomains'] = false; 
        }

        if(!$preload){
            $this->directives['preload'] = false; 
        }
    }

    public function toString(){
        $header = 'Strict-Transport-Security: max-age='.$this->maxAge.';';
        foreach($this->directives as $directive=>$value){
            if($value){
                $header .= $directive.';'; 
            }
    
        }
        return $header;
    }

}