<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.09.2016
 * Time: 13:50
 */

namespace Core\Core;

use RandomLib\Factory;

class IDGenerateFactory
{
    public static function generateID($length = 32)
    {
        try {
            $factory = new Factory();
            $generator = $factory->getLowStrengthGenerator();
            $generateId = $generator->generate($length);
            return md5($generateId);
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie generowania ID. ".$e->getMessage());
        }
    }

    public static function generatePassword($length = 10)
    {
        try {
            $generate = md5(time());
            $generatePassword = substr($generate, 0, $length);
            $newHashPassword = password_hash(md5($generatePassword), PASSWORD_DEFAULT, ['cost'=>12]);
            return ['new_password'=>$generatePassword, 'new_hash_password'=>$newHashPassword];
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie generowania ID. ".$e->getMessage());
        }
    }

}