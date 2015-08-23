<?php

    namespace Smack\Routing\Route;
    
    class Paths
    {
        protected $paths;
        
        public function __construct($paths)
        {
            $this->setPaths($paths);
        }
        
        public function set(array $paths)
        {
            $this->paths = $paths;
        }
        
        public function get()
        {
            return $this->paths;
        }
        
        public function has($value) {
            
            if (in_array($value, $this->paths)) {
                return true;
            }
            
            return false;
        }
    }