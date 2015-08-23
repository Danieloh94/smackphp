<?php

    namespace Smack\Contract\HttpCore\Uri;
    
    interface SchemeContract
    {
        
        public function __toString();
        
        public function get();
        public function set($scheme);
    }