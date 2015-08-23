<?php

    namespace Smack\HttpCore\Uri\Authority;
    
    use \Smack\Contract\HttpCore\Uri\Authority\HostContract;
    
    class Host implements HostContract
    {
        protected $host;
        
        public function __construct($host)
        {
            $this->set($host);
        }
        
        public function __toString()
        {
            return $this->host;
        }
        
        public function get()
        {
            return $this->host;
        }
        
        public function set($host)
        {
            if (!is_string($host) || $host === '') {
                throw new \InvalidArgumentException(sprintf(
                    'host argument must be of type string and not empty, "%s" recieved.',
                    is_object($host) ? get_class($host) : gettype($host)
                ));
            }
            
            $this->host = $host;
        }
    }