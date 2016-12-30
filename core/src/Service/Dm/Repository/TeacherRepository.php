<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:13
 */

namespace Core\Service\Dm\Repository;

use Core\Core\Repository;
use Core\Service\Inf\TeacherConvert;

class TeacherRepository extends Repository
{
    private $repository;

    public function __construct(TeacherConvert $repository)
    {
        $this->repository = $repository;
    }

    public function getOnIdentity($identity)
    {
        try {
            $teacher = $this->repository->getOneByCriteria(['id' => $identity]);
            if (empty($teacher)) {
                return false;
            }
            return $teacher;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania korepetytora na podstawie id.".$e->getMessage());
        }
    }

    public function getTeacherByEmail($email)
    {
        try {
            $teacher = $this->repository->getOneByCriteria(['email' => $email]);
            if (empty($teacher)) {
                return false;
            }
            return $teacher;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania korepetytora na podstawie adresu email.".$e->getMessage());
        }
    }

    public function getAll(): array
    {
        try {
            $teacherList = $this->repository->getByCriteria([]);
            if (empty($teacherList)) {
                return false;
            }
            return $teacherList;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania listy korepetytorów.".$e->getMessage());
        }
    }

}