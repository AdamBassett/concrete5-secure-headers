<?php

namespace SecureHeaders;

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\User\User;
use Concrete\Core\Http\Request;

Class CheckAuth{

    static public function isUser(){
        if(self::isLoggedIn()){
            return true;
        }
        if(self::onLoginPage()){
            return true;
        }
        return false;
    }

    static protected function isLoggedIn(){
        $u = new User();
        return $u->isLoggedIn();
    }

    static protected function onLoginPage(){
        $request = Request::getInstance();
        $path = $request->getPath();
        $basePath = array_filter( explode('/', $path) )[1];
        return $basePath == "login";
    }
}