<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:13
 */

namespace Core\Service\Dm\Service;

class TeacherService
{
    public function __construct()
    {

    }

    public function addTeacher(string $name, string $surname, string $email)
    {
        try{

        } catch (\Exception $e){
            throw new \Exception ("Błąd w porcesie dodawania korepetytora.");
        }
    }
}