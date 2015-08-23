<?php

    namespace Smack\Routing;
    
    use \Smack\Contract\HttpCore\Request\MethodContract;
    use \Smack\Contract\Routing\Route\PathsContract;
    use \Smack\Contract\Routing\Route\ActionContract;
    use \Smack\Contract\Routing\RouteContract;
				    
    class Route implements RouteContract
    {
        protected $paths;
        protected $method;
        protected $action;
        protected $params;
        protected $middleware;
        
        public function __construct(
            $paths,
            $method, 
            $action,
            $params, 
            $middleware
        ){
            $this->setPaths($paths);
            $this->setMethod($method);
            $this->setAction($action);
            $this->setParams($params);
            $this->setMiddleware($middleware);
        }
        
        public function getPaths()
        {
            return $this->paths;
        }
        
        public function setPaths(PathsContract $paths)
        {
            $this->paths = $paths;
        }
        
        public function getMethod()
        {
            return $this->method;
        }
        
        public function setMethod(MethodContract $method)
        {
            $this->method = $method;
        }
        
        public function getAction()
        {
            return $this->action;
        }
        
        public function setAction(ActionContract $action)
        {
            $this->action = $action;
        }
        
        public function getParams()
        {
            return $this->params;
        }
        
        public function setParams(array $params)
        {
            $this->params = $params;
        }
        
        public function getMiddleware()
        {
            return $this->middleware;
        }
        
        public function setMiddleware(array $middleware)
        {
            $this->middlware = $middlware;   
        }
    }