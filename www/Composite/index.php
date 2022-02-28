<?php


use Adapter\Contract\NotificationInterface;
use Adapter\Entity\User;
use Adapter\Notification\EmailNotification;
use Adapter\Notification\PhoneNotification;
use Adapter\Service\PhoneApi;
use Composite\Html\Div;
use Composite\Html\Form;
use Composite\Html\TextElement;
use Composite\Html\TextInputElement;


spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Composite/', '', $className);
    require_once __DIR__ . $className . '.php';
});


$form = new Form();
$form->addElement(new TextElement('Email: '));
$form->addElement(new TextInputElement());
$form->addElement(new TextElement('Password:'));
$form->addElement(new TextInputElement());

$div = new Div();
$div->addElement($form);
var_dump($div->render());