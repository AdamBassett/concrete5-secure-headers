<?php

namespace SecureHeaders;

defined('C5_EXECUTE') or die('Access Denied.');

use SecureHeaders\Headers\ContentSecurityPolicy;
use SecureHeaders\Headers\StrictTransportSecurity;
use SecureHeaders\Headers\XContentTypeOptions;
use SecureHeaders\Headers\XFrameOptions;
use SecureHeaders\Headers\XSSProtection;

class ResponseHeaders{

    protected $headers=[];

    public function sendHeaders(){
        header($this->headers['CSP']);
        header($this->headers['HSTS']);
        header($this->headers['XCTO']);
        header($this->headers['XFO']);
        header($this->headers['XSSP']);
    }
    
    public function setContentSecurityPolicy(ContentSecurityPolicy $csp){
        $this->headers['CSP'] = $csp->toString();
    }

    public function setHSTS(StrictTransportSecurity $hsts){
        $this->headers['HSTS'] = $hsts->toString();
    }

    public function setXContentTypeOptions(XContentTypeOptions $xcto ){
        $this->headers['XCTO'] = $xcto->toString();
    }

    public function setXFrameOptions(XFrameOptions $xfo){
        $this->headers['XFO'] = $xfo->toString();
    }

    public function setXSSProtection(XSSProtection $xssp){
        $this->headers['XSSP'] = $xssp->toString();
    }
}