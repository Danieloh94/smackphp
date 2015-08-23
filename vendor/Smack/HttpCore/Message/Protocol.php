<?php

    namespace Smack\HttpCore\Message;
    
    use \Smack\Contract\HttpCore\Message\ProtocolContract;
    
    class Protocol implements ProtocolContract
    {
        protected $type;
        protected $version;
        
        public function __construct($type, $version)
        {
            $this->setType($type);
            $this->setVersion($version);
        }
        
        public function __toString()
        {
            return (string) $this->type.'/'.$this->version;
        }
        
        public function getType()
        {
            return $this->type;
        }
        
        public function setType($type)
        {
            if (!is_string($type)) {
                throw new \InvalidArgumentException(sprintf(
                    'protocol type must be of type string, "%s" recieved.',
                    is_object($type) ? get_class($type) : gettype($type)
                ));
            }
      
            $this->type = strtoupper($type);
        }
        
        public function getVersion()
        {
            return $this->version;
        }
        
        public function setVersion($version)
        {
            if (!is_float($version)) {
                throw new \InvalidArgumentException(sprintf(
                    'protocol version must be of type float (double), "%s" recieved.',
                    is_object($version) ? get_class($version) : gettype($version)
                ));
            }
            
            $this->version = $version;
        }
    }