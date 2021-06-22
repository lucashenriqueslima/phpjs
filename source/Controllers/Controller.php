<?php

    namespace Source\Controllers;

    use CoffeeCode\Optimizer\Optimizer;
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;

    abstract class Controller
    {
        /** @var Engine */
        protected $view;
        
        /** @var Router */
        protected $router;
    
        public function __construct($router)
        {
            $this->router = $router;
            $this->view = Engine::create(dirname(__DIR__, 2) . "/views", "php");
            $this->view->addData(["router" => $this->router]);
            
        }

        /**
         * @param string $param
         * @param array $values
         * @return string
         */
        
        public function ajaxResponse(string $param = null, array $values = null): string
        {
            return json_encode([$param => $values]);
        }
    }