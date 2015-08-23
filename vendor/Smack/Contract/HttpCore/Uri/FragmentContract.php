<?php

    namespace Smack\Contract\HttpCore\Uri;
    
    interface FragmentContract
    {     
        public function __toString();
        
        public function get();
        
        public function set($fragment);
    }