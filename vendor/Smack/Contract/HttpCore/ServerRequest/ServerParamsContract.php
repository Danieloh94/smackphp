<?php

    namespace Smack\Contract\HttpCore\ServerRequest;
    
    interface ServerParamsContract
    {    
        public function normalize($data);
        public function normalizeKey($key);
    }