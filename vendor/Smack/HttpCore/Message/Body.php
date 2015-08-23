<?php

    namespace Smack\HttpCore\Message;
    
    use \Smack\Contract\HttpCore\Message\BodyContract;
    
    class Body implements BodyContract
    {
        protected $resource;       
        
        protected $metadata;
        
        protected $modes = array(
            'read' => array(
                'r' => true, 'w+' => true, 'r+' => true, 'x+' => true, 'c+' => true,
                'rb' => true, 'w+b' => true, 'r+b' => true, 'x+b' => true, 'c+b' => true,
                'rt' => true, 'w+t' => true, 'r+t' => true, 'x+t' => true, 'c+t' => true, 'a+' => true
            ),
            'write' => array(
                'w' => true, 'w+' => true, 'rw' => true, 'r+' => true, 'x+' => true, 'c+' => true,
                'wb' => true, 'w+b' => true, 'r+b' => true, 'x+b' => true, 'c+b' => true,
                'w+t' => true, 'r+t' => true, 'x+t' => true, 'c+t' => true, 'a' => true, 'a+' => true
            )
        );
    
        public function __construct($stream)
        {
            $this->setResource($stream);
        }
        
        public function getResource()
        {
            return $this->resource;
        }
        
        public function setResource($stream)
        {
            if (!is_resource($stream)) {
                throw new \InvalidArgumentException(sprintf(
                    'stream must be of type resource, "%s" recieved.',
                    is_object($stream) ? get_class($stream) : gettype($stream)
                ));
            }
            
            $this->resource = $stream;
            $this->metadata = stream_get_meta_data($stream);
        }
    
        public function __toString()
        {      
            return stream_get_contents($this->resource, - 1, 0);
        }
    
        public function close()
        {
            fclose($this->resource);
            $this->resource = null;
        }
    
    
        public function getSize()
        {
            $stats = fstat($this->resource);
            return isset($stats['size']) ? $stats['size'] : strlen($this);
        }
    
        public function tell()
        {
            return ftell($this->resource);
        }
    
        public function eof()
        {
            return feof($this->resource);
        }
    
        public function isSeekable()
        {
            return $this->getMetadata('seekable');
        }
    
        public function seek($offset, $whence = SEEK_SET)
        {
            if (!$this->isSeekable()) {
                throw new \LogicException(
                    'stream is not seekable'
                );
            }
            
            return fseek($this->resource, $offset, $whence);
        }
    
        public function rewind()
        {
            return rewind($this->resource);
        }
    
        public function isWriteable()
        {
            return $this->checkMode('write', $this->getMetadata('mode'));
        }
    
        public function write($string)
        {
            if (!$this->isWriteable()) {
                throw new \LogicException(
                    'stream is not writeable'
                );
            }
            
            fwrite($this->resource, $string);
        }
    
        public function isReadable()
        {
            return $this->checkMode('read', $this->getMetadata('mode'));
        }
    
        public function read($length)
        {  
            if (!$this->isReadable()) {
                throw new \LogicException(
                    'stream is not readable'
                );
            }
            
            return fread($this->resource, $length);
        }
    
        public function getContents()
        {
            return stream_get_contents($this->resource);
        }
        
        public function checkMode($mode, $actual)
        {
            if (isset($this->modes[$mode][$actual])) {
                return true;
            }
            
            return false;
        }
    
        public function getMetadata($key = null)
        {     
            if (is_null($key)) {
                return $this->metadata;
            } elseif (array_key_exists($key, $this->metadata)) {
                return $this->metadata[$key];
            }
            
            return false;
        }
    }