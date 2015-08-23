<?php

    namespace Smack\HttpCore;
    
    use \Smack\HttpCore\Message\Body;
    use \Smack\HttpCore\Message\Headers;
    use \Smack\HttpCore\Message\Protocol;
    use \Smack\HttpCore\Message\Headers\Header;
				        
    class MessageFactory
    {
        public function makeBody($body)
        {
            if (is_string($body)) {
                $body = new Body(fopen($body, 'wb+'));
            } elseif (is_resource($body)) {
                $body = new Body($body);
            }
        
            return $body;
        }
        
        public function makeHeaders($headers)
        {
            if (is_array($headers)) {
                
                $sorted = [];
                
                foreach ($headers as $key => $val) {
                    $sorted[$key] = new Header($key, $val);
                }
                
                $headers = new Headers($sorted);
            }
        
            return $headers;
        }
        
        public function makeHeader($key, $val)
        {
            return new Header($key, $val);
        }
        
        public function makeProtocol($protocol)
        {
            if(strstr($protocol, '/', 5) !== false) {
                $parts = explode('/', $protocol);
                $type = $parts[0];
                $version = $parts[1];
            } else {
                $type = 'HTTP';
                $version = $protocol;
            }
        
            return new Protocol($type, (float) $version);
        }
    }