<?php

namespace AbstractFactory\Contract;

use AbstractFactory\Entity\User;

/**
 * interface UserRepositoryInterface Интерфейс, описывающий как должен работать
 *репозиторий по управлению пользователями. Здесь нет упоминания о том, куда
 *мы будем сохранять пользователя, здесь определены лишь методы для работы с
 *пользователями.
 *Куда сохранять этих пользователей будет решать тот класс, который будет этот
 *интерфейс реализовывать.
 *@package Contract
 */
interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return void
     */
    public function add(User $user);

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user);

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user);


}