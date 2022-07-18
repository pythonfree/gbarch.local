<?php

namespace FrontController\Controller;

class UserController
{
    public function view($id)
    {
        echo 'Открываем пользователя с ID = ' . $id . PHP_EOL;
    }
}