<?php

namespace SecureHeaders\Headers;

defined('C5_EXECUTE') or die('Access Denied.');

class XSSProtection{
    public function toString(){
        return  'X-XSS-Protection: 1; mode=block';
    }
}