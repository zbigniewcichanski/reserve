<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 16:39
 */

namespace Core\Service\App;

use Core\Core\MessageInterface;
use Core\Service\App\Command\TeacherCommand;
use Core\Service\Core\DomainObject;
use Core\Service\Dm\Repository\TeacherRepository;

class TeacherService
{
    private $message;

    private $teacherService;

    private $teacherRepository;

    public function __construct(MessageInterface $message, \Core\Service\Dm\Service\TeacherService $teacherService, TeacherRepository $teacherRepository)
    {
        $this->message = $message;
        $this->teacherService = $teacherService;
        $this->teacherRepository = $teacherRepository;
    }

    public function addTeacher(TeacherCommand $teacherCommand): MessageInterface
    {
        try {
            $result = $this->teacherService->addTeacher($teacherCommand->name, $teacherCommand->surname, $teacherCommand->email);

            if ($result['status'] == true) {
                $this->message->build(true, $result['message'], 201);
            } else {
                $this->message->build(false, $result['message'], 400);
            }
            return $this->message;
        } catch (\Exception $e) {
            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
            return $this->message;
        }
    }


    public function removeTeacher(TeacherCommand $teacherCommand): MessageInterface
    {
        try {
            $result = $this->teacherService->removeTeacher($teacherCommand->id);

            if ($result['status'] == true) {
                $this->message->build(true, $result['message'], 204);
            } else {
                $this->message->build(false, $result['message'], 400);
            }
            return $this->message;
        } catch (\Exception $e) {
            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
            return $this->message;
        }
    }


    public function getTeacherList(): MessageInterface
    {
        try {

            $TeacherList = $this->teacherRepository->getAll();

            if (empty($TeacherList)) {
                $this->message->build(true, 'Zasoby. ', 200, []);
            }

            $mapperList = [];
            foreach ($TeacherList as $team) {
                $mapperList[] = $this->mapper($team);
            }

            $this->message->build(true, 'Kategorie. ', 200, $mapperList);
            return $this->message;
        } catch (\Exception $e) {
            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
            return $this->message;
        }
    }

    private function mapper(DomainObject $object): array
    {
        $row['id']=$object->getId();
        $row['name']=$object->getName();
        $row['surname']=$object->getSurname();
        $row['email']=$object->getEmail();
        $row['city']=$object->getCity();
        $row['post_code']=$object->getPostCode();
        $row['mobile']=0;
        if($object->isDriveToStudent()){
            $row['mobile']=1;
        }

        return $row;
    }

}