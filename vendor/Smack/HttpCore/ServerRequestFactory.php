<?php

    namespace Smack\HttpCore;
    
    use \Smack\HttpCore\RequestFactory;
    use \Smack\HttpCore\ServerRequest\ServerParams;
    use \Smack\StdLib\Collection;
				    
    class ServerRequestFactory extends RequestFactory
    {
        public function fromArgs(
            $server,
            $post = [],
            $get = [],
            $files = [],
            $cookies = [],
            $attributes = [],
            $method = 'get',
            $uri = 'http://localhost',
            $body = 'php://memory', 
            $headers = [], 
            $protocol = 1.1
        ) {
            
            $request = new ServerRequest(
                $this->makeServerParams($server),
                $this->makeMethod($method), 
                $this->makeUri($uri), 
                $this->makeBody($body), 
                $this->makeHeaders($headers), 
                $this->makeProtocol($protocol)
            );
            
            $request->setPostParams($this->makeParams($post));
            $request->setQueryParams($this->makeParams($get));
            $request->setFileParams($this->makeParams($files));
            $request->setCookieParams($this->makeParams($cookies));
            $request->setAttributes($this->makeParams($attributes));
            
            return $request;
        }
        
        public function fromGlobals()
        {         
            return $this->fromArgs(
                $_SERVER,
                $_POST,
                $_GET,
                $_FILES,
                $_COOKIE,
                [],
                $_SERVER['REQUEST_METHOD'],
                $this->getUri(),
                'php://input',
                $this->makeHeaders($this->getHeaders()),
                $_SERVER['SERVER_PROTOCOL']
            );
        }
        
        public function getUri()
        {
            $scheme = 'http';
            
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
                $scheme = 'https';
            }
            
            return $this->uriFactory->fromArgs(
                $scheme,
                null,
                null,
                $_SERVER['SERVER_NAME'],
                $this->isDefaultPort($_SERVER['SERVER_PORT']),
                $_SERVER['REQUEST_URI'],
                $_SERVER['QUERY_STRING']
            );
        }
        
        public function getHeaders()
        {
            if (! function_exists('apache_request_headers')) {
                return $this->getHeadersFromEnv();
            } else {
                return \apache_request_headers();
            }
        }
        
        public function getHeadersFromEnv()
        {
            $headers = [];
            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) === 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
            
            return $headers;
        }
        
        public function isDefaultPort($port)
        {
            $port = (int) $port;
            
            if ($port === (int) 80 || $port === 443) {
                $port = null;
            } 
            
            return $port;
        }
        
        public function makeServerParams($params)
        {
            if (is_array($params)) {
                $params =  new ServerParams($params);
            }
            
            return $params;
        }
        
        public function makeParams($params)
        {
            if (is_array($params)) {
                $params = new Collection($params);
            }
            
            return $params;
        }
    }