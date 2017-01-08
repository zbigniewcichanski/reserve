<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 16:39
 */

namespace Core\Service\App;

use Core\Core\MessageInterface;
use Core\Service\App\Command\LessonCommand;
use Core\Service\Core\DomainObject;
use Core\Service\Dm\Repository\LessonRepository;
use Core\Service\Dm\Entity\LessonAggregate;

class LessonService
{
    private $message;

    private $lessonService;

    private $lessonRepository;

    public function __construct(MessageInterface $message, \Core\Service\Dm\Service\LessonService $lessonService, LessonRepository $lessonRepository)
    {
        $this->message = $message;
        $this->lessonService = $lessonService;
        $this->lessonRepository = $lessonRepository;
    }

    public function addLesson(LessonCommand $lessonCommand): MessageInterface
    {
//        try {
//            $result = $this->lessonService->addLesson($lessonCommand->name, $lessonCommand->surname, $lessonCommand->email);
//
//            if ($result['status'] == true) {
//                $this->message->build(true, $result['message'], 201);
//            } else {
//                $this->message->build(false, $result['message'], 400);
//            }
//            return $this->message;
//        } catch (\Exception $e) {
//            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
//            return $this->message;
//        }
    }


    public function removeLesson(LessonCommand $lessonCommand): MessageInterface
    {
//        try {
//            $result = $this->lessonService->removeLesson($lessonCommand->id);
//
//            if ($result['status'] == true) {
//                $this->message->build(true, $result['message'], 204);
//            } else {
//                $this->message->build(false, $result['message'], 400);
//            }
//            return $this->message;
//        } catch (\Exception $e) {
//            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
//            return $this->message;
//        }
    }


//    public function getLessonList(): MessageInterface
//    {
//        try {
//
//            $LessonList = $this->lessonRepository->getAll();
//
//            if (empty($LessonList)) {
//                $this->message->build(true, 'Zasoby. ', 200, []);
//            }
//
//            $mapperList = [];
//            foreach ($LessonList as $team) {
//                $mapperList[] = $this->mapper($team);
//            }
//
//            $this->message->build(true, 'Kategorie. ', 200, $mapperList);
//            return $this->message;
//        } catch (\Exception $e) {
//            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
//            return $this->message;
//        }
//    }

    public function getFreeTermsForDay(LessonCommand $lessonCommand): MessageInterface
    {
        try {

            $LessonList = $this->lessonRepository->getFreeTermsForDay($lessonCommand->date);

            if (empty($LessonList)) {
                $this->message->build(true, 'Brak wolnych terminów w wybranym dniu. ', 200, []);
            }

            $mapperList = [];
            foreach ($LessonList as $team) {
                $mapperList[] = $this->mapper($team);
            }

            $this->message->build(true, 'Wolne terminy. ', 200, $mapperList);
            return $this->message;
        } catch (\Exception $e) {
            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
            return $this->message;
        }
    }

    private function mapper(DomainObject $object): array
    {
        /**
         *@var LessonAggregate $object
         */
        $object;
        $row['id_lesson']=$object->getId();
        $row['id_teacher']=$object->getTeacherId();
        $row['date']=$object->getDate();
        $row['start_time']=$object->getStartTime();
        $row['end_time']=$object->getEndTime();
        $row['location']=$object->getLocation();


        return $row;
    }

}