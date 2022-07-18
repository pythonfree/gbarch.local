<?php

namespace FrontController\FrontController;

class FrontController
{
    private const CONTROLLER_NAMESPACE = 'FrontController\Controller\\';
    protected $controller;
    protected $action;
    protected $params = [];


    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (empty($options)) {
            $this->parseUri();
        } else {
            if (isset($options['controller'])) {
                $this->setController($options['controller']);
            }
            if (isset($options['action'])) {
                $this->setAction($options['action']);
            }
            if (isset($options['params'])) {
                $this->setParams($options['params']);
            }
        }
    }

    /**
     * Здесь происходит разбор запроса по URI.
     * @return void
     */
    protected function parseUri()
    {
        echo 'Разбираем URI, получаем информацию, какой вызвать контроллер, action, параметры запроса.';
        // Для примера ставим всегда контроллер Index
        $this->setController('Index');
        // Для примера ставим всегда action index
        $this->setAction('index');
        // Допустим, что параметров нет
        $this->setParams([]);
    }

    /**
     * Установка нужного контроллера, проверяя на его существование.
     * @param $controller
     * @return $this|void
     */
    public function setController($controller)
    {
        $controller = static::CONTROLLER_NAMESPACE.
            ucfirst(strtolower($controller)) . 'Controller';
        if (!class_exists($controller)) {
            die('Контроллера ' . $controller . ' не существует.');
        }
        $this->controller = $controller;
        return $this;
    }


    /**
     * Установка нужного action, проверяя на его существование.
     * @param $action
     * @return $this|void
     */
    public function setAction($action)
    {
        try {
            $reflector = new \ReflectionClass($this->controller);
        } catch (\ReflectionException $e) {
            die('Контроллера - ' . $this->controller . ' не существует');
        }
        if (!$reflector->hasMethod($action)) {
            die('Метода - ' . $this->action . ' не существует');
        }

        $this->action = $action;
        return $this;
    }


    /**
     * Установка параметров запроса
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }


    /**
     * Вызов нужного контроллера и метода.
     * @return void
     */
    public function run()
    {
        call_user_func_array(
            [new $this->controller, $this->action],
            $this->params
        );
    }

}