<?php

    namespace Smack\Contract\HttpCore\Message;

    interface BodyContract
    {
        public function getResource();
        public function setResource($stream);
    
        public function close();
    
        public function getSize();
    
        public function tell();
    
        public function eof();
    
        public function isSeekable();
        public function seek($offset, $whence = SEEK_SET);
    
        public function rewind();
    
        public function isWriteable();
        public function write($string);
        
        public function isReadable();
        public function read($length);
    
        public function getContents();
        
        public function getMetadata($key = null);
        
        public function __toString();
    }