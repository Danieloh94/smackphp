<?php

    namespace Smack\Contract\HttpCore;
    
    use \Smack\Contract\HttpCore\Message\BodyContract;
    use \Smack\Contract\HttpCore\Message\HeadersContract;
    use \Smack\Contract\HttpCore\Message\ProtocolContract;
    
    interface MessageContract
    {
        public function getBody();
        public function setBody(BodyContract $body);
        
        public function getHeaders();
        public function setHeaders(HeadersContract $headers);
        
        public function getProtocol();
        public function setProtocol(ProtocolContract $protocol);
    }