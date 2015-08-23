<?php

    namespace Smack\HttpCore\Uri;
    
    use \Smack\Contract\HttpCore\Uri\FragmentContract;
    
    class Fragment implements FragmentContract
    {
        protected $fragment;
        
        public function __construct($fragment)
        {
            $this->set($fragment);
        }
        
        public function __toString()
        {
            return '#'.$this->fragment;
        }
        
        public function get()
        {
            return $this->fragment;
        }
        
        public function set($fragment)
        {
            if (!is_string($fragment) || $fragment === '') {
                throw new \InvalidArgumentException(sprintf(
                    'fragment argument must be of type string and not empty, "%s" recieved.',
                    is_object($fragment) ? get_class($fragment) : gettype($fragment)
                ));
            }
            
            $this->fragment = $this->clean($fragment);
        }
        
        public function clean($fragment)
        {
            if (strpos($fragment, '#') === 0) {
                $fragment = substr($fragment, 1);
            }
            
            return $fragment;
        }
    }