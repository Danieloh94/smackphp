<?php

    namespace Smack\HttpCore\Uri;
    
    use \Smack\Contract\HttpCore\Uri\SchemeContract;
    
    class Scheme implements SchemeContract
    {
        protected $scheme;
        
        public function __construct($scheme)
        {
            $this->set($scheme);
        }
        
        public function __toString()
        {
            return $this->scheme.'://';
        }
        
        public function get()
        {
            return $this->scheme;
        }
        
        public function set($scheme)
        {
            if (!is_string($scheme) || $scheme === '') {
                throw new \InvalidArgumentException(sprintf(
                    'scheme argument must be of type string and not empty, "%s" recieved.',
                    is_object($scheme) ? get_class($scheme) : gettype($scheme)
                ));
            }
            
            $this->scheme = $scheme;
        }
    }