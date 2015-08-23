<?php

    namespace Smack\HttpCore\Message\Headers;
    
    use \Smack\Contract\HttpCore\Message\Headers\HeaderContract;
    
    class Header implements HeaderContract
    {
        protected $key;
        protected $value;
        
        public function __construct($key, $value)
        {
            $this->setKey($key);
            $this->setValue($value);
        }
        
        public function __toString()
        {
            return $this->key.':'.$this->value."\r\n";
        }
        
        public function getKey()
        {
            return $this->key;
        }
        
        public function setKey($key)
        {
            if (!is_string($key) || $key === '') {
                throw new \InvalidArgumentException(sprintf(
                    'key argument must be of type string and not empty, "%s" recieved.',
                    is_object($key) ? get_class($key) : gettype($key)
                ));
            }
            
            $this->key = str_replace('_', '-', $key);
        }
        
        public function getValue()
        {
            return $this->value;
        }
        
        public function setValue($value)
        {
            if (!is_string($value) || $value === '') {
                throw new \InvalidArgumentException(sprintf(
                    'value argument must be of type string and not empty, "%s" recieved.',
                    is_object($value) ? get_class($value) : gettype($value)
                ));
            }
            
            $this->value = $value;
        }
    }