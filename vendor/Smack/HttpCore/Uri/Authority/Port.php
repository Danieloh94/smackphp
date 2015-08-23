<?php

    namespace Smack\HttpCore\Uri\Authority;
    
    use \Smack\Contract\HttpCore\Uri\Authority\PortContract;
    
    class Port implements PortContract
    {
        protected $port;
        
        public function __construct($port)
        {
            $this->set($port);
        }
        
        public function __toString()
        {
            return ':'.$this->port;
        }
        
        public function get()
        {
            return $this->port;
        }
        
        public function set($port)
        {
            if (!is_int($port)) {
                throw new \InvalidArgumentException(sprintf(
                    'port argument must be of type integer, "%s" recieved.',
                    is_object($port) ? get_class($port) : gettype($port)
                ));
            }
            
            $this->port = $port;
        }
    }