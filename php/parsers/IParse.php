<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 14.10.14
 * Time: 20:40
 */
interface IParse
{
    /**
     * Получение ресурса
     * @return mixed
     */
    public function fetch();

    /**
     * Обработка полученного ресурса
     * @return mixed
     */
    public function parse();

    /**
     * Возвращает обработанный ресурс в виде строки
     * @return string
     */
    public function getResult();
}