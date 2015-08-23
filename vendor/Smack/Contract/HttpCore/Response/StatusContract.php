<?php

    namespace Smack\Contract\HttpCore\Response;
    
    interface StatusContract
    {    
        public function __toString();
        
        public function set($code, $reasonPhrase = null);
        public function getCode();
        
        public function setCode($code);
        
        public function setReasonPhrase($reasonPhrase);  
        public function getReasonPhrase();
    }