<?php
class Loader
{
    private $controller;
    private $action;
    private $id;

    // Upon object creation, we save the controller, action and ID
    public function __construct($url)
    {
        if (isset($url['url'])) {
            $urlArray = explode('/', trim($url['url'], '/'));

            // Set controller action and id
            $this->controller = isset($urlArray[0]) ? 'Controller' . ucfirst(strtolower($urlArray[0])) : 'ControllerFrontpage';
            $this->action     = isset($urlArray[1]) ? $urlArray[1] : 'standard';
            $this->id         = isset($urlArray[2]) ? implode('/', array_slice($urlArray, 2)) : '';
        } else {
            // If nothing was selected at all, we default to the front page
            $this->controller = 'ControllerFrontpage';
            $this->action     = 'standard';
            $this->id         = '';
        }
    }

    // Create Controller object based on request
    public function createController()
    {
        try {
            // Does the requested controller file exists?
            $controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';
            if (file_exists($controllerPath)) {
                require_once $controllerPath;
            } else {
                throw new ControllerException(0, $this->controller);
            }

            // Does the controller class exist?
            if (!class_exists($this->controller)) {
                throw new ControllerException(1, $this->controller);
            }

            // Does the class extend the base controller class?
            $parents = class_parents($this->controller);
            if (!in_array('ControllerRoot', $parents)) {
                throw new ControllerException(2, $this->controller);
            }

            // Does the class contain the requested method? (if specified)
            if ($this->action == '' || method_exists($this->controller, $this->action)) {
                return new $this->controller($this->action, $this->id);
            } else {
                throw new ControllerException(3, $this->controller, $this->action);
            }

        } catch (ControllerException $e) {
            require_once __DIR__ . '/../controllers/ControllerErrorpage.php';
            if ($e->getCode() == 3) {
                DefaultResponse::badRequest();
            } else {
                DefaultResponse::notFound();
            }
        }
    }
}
