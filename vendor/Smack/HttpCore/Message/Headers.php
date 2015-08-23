<?php

    namespace Smack\HttpCore\Message;
    
    use \Smack\Contract\HttpCore\Message\Headers\HeaderContract;
    use \Smack\Contract\HttpCore\Message\HeadersContract;
    use \Smack\StdLib\Collection;
								    
    class Headers extends Collection implements HeadersContract
    {
        public function __construct($headers = [])
        {
            $this->setAll($headers);
        }
        
        public function __toString()
        {      
            $headers = '';
            foreach ($this->data as $header) {
                $headers .= $header->__toString();
            }
            
            return $headers;
        }
        
        public function set(HeaderContract $header)
        {
            $this->data[$header->getKey()] = $header;
        }
        
        public function setAll(array $headers)
        {
            $this->data = [];
            foreach ($headers as $header) {
                if (!$header instanceOf HeaderContract) {
                    throw new \InvalidArgumentException(sprintf(
                        'headers array values must be of type \Smack\HttpCore\Message\Headers\Header, "%s" recieved.',
                        is_object($header) ? get_class($header) : gettype($header)
                    ));
                }

                $this->set($header);
            }
        }
    }