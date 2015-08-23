<?php

    namespace Smack\HttpCore\Uri;
    
    use \Smack\Contract\HttpCore\Uri\PathContract;
    
    class Path implements PathContract
    {
        protected $path;
        
        public function __construct($path)
        {
            $this->set($path);
        }
        
        public function __toString()
        {
            if ($this->path === '/') {
                return $this->path;
            } else {
                return '/'.$this->path.'/';
            }
        }
        
        public function get()
        {
            return $this->path;
        }
        
        public function set($path)
        {
            if (!is_string($path) || $path === '') {
                throw new \InvalidArgumentException(sprintf(
                    'path argument must be of type string and not empty, "%s" recieved.',
                    is_object($path) ? get_class($path) : gettype($path)
                ));
            }
            
            $this->path = $this->clean($path);
        }
        
        public function clean($path) 
        {
            if ($path === '/') {
                return $path;
            }
            
            return trim($path, '/');
        }
    }