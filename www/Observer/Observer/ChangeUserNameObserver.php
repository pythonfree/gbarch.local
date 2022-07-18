<?php

namespace Observer\Observer;

use Observer\Entity\User;

class ChangeUserNameObserver implements \SplObserver
{

    /**
     * Метод вызывается, когда присходит вызов notify() у субъекта, за которым наблюдаем.
     * В нашем случае мы наблюдаем за User.
     * @param User $subject
     */
    public function update($subject)
    {
        echo "У пользователя сменилось имя на '{$subject->getName()}'." . PHP_EOL;
    }
}