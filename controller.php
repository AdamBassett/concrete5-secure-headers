<?php
namespace Concrete\Package\SecureHeaders;

defined('C5_EXECUTE') or die('Access Denied.');

use \Concrete\Core\Package\Package;
use SecureHeaders\CheckAuth;
use SecureHeaders\ResponseHeaders;
use SecureHeaders\Headers\ContentSecurityPolicy;
use SecureHeaders\Headers\StrictTransportSecurity;
use SecureHeaders\Headers\XContentTypeOptions;
use SecureHeaders\Headers\XFrameOptions;
use SecureHeaders\Headers\XSSProtection;

class Controller extends Package{
    
    protected $pkgHandle = 'secure_headers';
    protected $appVersionRequired = '8.4';
    protected $pkgVersion = '0.1';

    public function getPackageDescription(){
        return t('Sets response headers in compliance with https://observatory.mozilla.org. Adds less secure headers for login and authed sessions so C5 still works.');
    }

    public function getPackageName(){
        return t('Secure Headers');
    }

    public function install(){
        $pkg = parent::install();
    }

    protected $pkgAutoloaderRegistries = [
        'src' => '\SecureHeaders',
    ];

    public function on_start(){
        $cspConfig = include('config/CSPHeader.php');
        $csp = new ContentSecurityPolicy();
        $csp->setDirectives($cspConfig['user']);
        
        if(CheckAuth::isUser()){
            $csp->setDirectives($cspConfig['user']);
        }
        else{
            $csp->setDirectives($cspConfig['guest']);
        }
        
        $headers = new ResponseHeaders();
        $headers->setContentSecurityPolicy($csp);
        $headers->setHSTS(new StrictTransportSecurity('31536000'));
        $headers->setXContentTypeOptions(new XContentTypeOptions());
        $headers->setXFrameOptions(new XFrameOptions());
        $headers->setXSSProtection(new XSSProtection());

        $headers->sendHeaders();
    }

    public function uninstall(){
        parent::uninstall();
    }
}