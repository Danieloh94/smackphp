<?php

    namespace Smack\Contract\HttpCore\Uri\Authority;
    
    interface PortContract
    {
        public function __toString();
        
        public function get();
        public function set($port);
    }