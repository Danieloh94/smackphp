<?php

    namespace Smack\Contract\HttpCore\Uri\Authority;
    
    interface HostContract
    { 
        public function __toString();
        
        public function get();
        public function set($host);
    }