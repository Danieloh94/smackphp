<?php

    namespace Smack\HttpCore\Request;
    
    use \Smack\Contract\HttpCore\Request\MethodContract;
	
	class Method implements MethodContract
    {
        protected $method;
        protected $valid = [
            'CONNECT',
            'DELETE',
            'GET',
            'HEAD',
            'OPTIONS',
            'PATCH',
            'POST',
            'PUT',
            'TRACE'
        ];
        
        public function __construct($method)
        {
            $this->set($method);
        }
        
        public function __toString()
        {
            return $this->get();
        }
        
        public function get()
        {
            return $this->method;
        }
        
        public function set($method)
        {     
            if (!is_string($method) || !in_array(strtoupper($method), $this->valid)) {
                throw new \InvalidArgumentException(sprintf(
                    'method must be of type string and a valid http method, "%s" recieved.',
                    is_object($method) ? get_class($method) : gettype($method)
                ));
            }
            
            $this->method = strtoupper($method);
        }
    }