<?php

    namespace Smack\Contract\HttpCore\Message;
    
    interface ProtocolContract
    {   
        public function getType();   
        public function setType($type);
        
        public function getVersion();
        public function setVersion($version);
        
        public function __toString();
    }