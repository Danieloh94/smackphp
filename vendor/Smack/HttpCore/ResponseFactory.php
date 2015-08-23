<?php

    namespace Smack\HttpCore;
    
    use \Smack\HttpCore\MessageFactory;
    use \Smack\HttpCore\Response;
    use \Smack\HttpCore\Response\Status;
								    
    class ResponseFactory extends MessageFactory
    {
        public function fromArgs($statusCode = 200, $body = 'php://memory', $headers = [], $protocol = 'HTTP/1.1')
        {
            return new Response(
                $this->makeStatus($status), 
                $this->makeBody($body),
                $this->makeHeaders($headers),
                $this->makeProtocol($protocol)
            );
        }
        
        public function makeStatus($status)
        {
            if (is_string($status) || is_int($status)) {
                $status = new Status((int) $status);
            }
            
            return $status;
        }
    }