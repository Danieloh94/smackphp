<?php

    namespace Smack\HttpCore;
    
    use \Smack\HttpCore\Request;
    use \Smack\HttpCore\Request\Method;
    use \Smack\HttpCore\Message\Headers;
    use \Smack\HttpCore\Message\Headers\Header;
    use \Smack\HttpCore\Message\Body;
    use \Smack\HttpCore\Message\Protocol;
    use \Smack\HttpCore\UriFactory;
    
    class RequestFactory extends MessageFactory
    {
        protected $uriFactory;
        
        public function __construct(UriFactory $uriFactory)
        {
            $this->uriFactory = $uriFactory;
        }
        
        public function fromArgs($method, $uri, $body = 'php://memory', $headers = [], $protocol = 'HTTP/1.1')
        {
            return new Request(
                $this->makeMethod($method),
                $this->makeUri($uri),
                $this->makeBody($body),
                $this->makeHeaders($headers),
                $this->makeProtocol($protocol)
            );
        }
        
        public function makeMethod($method)
        {
            if (is_string($method)) {
                $method = new Method($method);
            }
            
            return $method;
        }
        
        public function makeUri($uri)
        {
            if (is_string($uri)) {
                $uri = $this->uriFactory->fromString($uri);
            } elseif (is_array($uri)) {
                $uri = $this->uriFactory->fromParts($uri);
            }
            
            return $uri;
        }
    }