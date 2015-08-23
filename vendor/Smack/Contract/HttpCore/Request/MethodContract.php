<?php

    namespace Smack\Contract\HttpCore\Request;
    
    interface MethodContract
    {
        public function __toString();
        
        public function get();
        public function set($method);
    }