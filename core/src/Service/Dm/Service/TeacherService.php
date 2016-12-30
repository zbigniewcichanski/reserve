<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:13
 */

namespace Core\Service\Dm\Service;

use Core\Core\Specification\Specification;
use Core\Service\Dm\Entity\TeacherAggregate;
use Core\Service\Dm\Repository\TeacherRepository;

class TeacherService
{
    /**
     * @var TeacherRepository
     */
    private $teacherRepository;

    /**
     * @var Specification
     */
    private $teacherNameIsUnique;

    public function __construct(TeacherRepository $teacherRepository, Specification $teacherNameIsUnique)
    {
        $this->teacherNameIsUnique = $teacherNameIsUnique;
        $this->teacherRepository = $teacherRepository;
    }

    public function addTeacher(string $name, string $surname, string $email)
    {
        try{
            if($this->teacherNameIsUnique->not()->isSatisfiedBy($email)){
                return ['status'=>false, 'message'=>'Podany email jest już przypisany do korepetytora. Nie możesz go ponowanie wykorzystać.'];
            }

            $teacherAggregate = new TeacherAggregate();
            $teacherAggregate->setName($name);
            $teacherAggregate->setSurname($surname);
            $teacherAggregate->setEmail($email);

            $teacherAggregate->save();

            return ['status'=>true, 'message'=>'Korepetytor został dodany.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w porcesie dodawania korepetytora.".$e->getMessage());
        }
    }

    public function removeTeacher($teacherId)
    {
        try {

            /**
             * @var TeacherAggregate $TeacherAggregate
             */
            $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
            if (!$teacherAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego zakresu.'];
            }

            $teacherAggregate->deleted();

            $teacherAggregate->save();

            return ['status' => true, 'message' => 'Korepetytor został usunięty.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie usuwania korepetytora." . $e->getMessage());
        }
    }
}