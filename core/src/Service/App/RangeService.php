<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 16:39
 */

namespace Core\Service\App;

use Core\Core\MessageInterface;
use Core\Service\App\Command\RangeCommand;
use Core\Service\Core\DomainObject;
use Core\Service\Dm\Repository\RangeRepository;

class RangeService
{
    private $message;

    private $rangeService;

    private $rangeRepository;

    public function __construct(MessageInterface $message, \Core\Service\Dm\Service\RangeService $rangeService, RangeRepository $rangeRepository)
    {
        $this->message = $message;
        $this->rangeService = $rangeService;
        $this->rangeRepository = $rangeRepository;
    }

    public function createRange(RangeCommand $rangeCommand): MessageInterface
    {
        try {
            $result = $this->rangeService->createRange($rangeCommand->name);

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

    public function changeRangeName(RangeCommand $rangeCommand): MessageInterface
    {
        try {
            $result = $this->rangeService->changeRangeName($rangeCommand->id, $rangeCommand->name);

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

    public function removeRange(RangeCommand $rangeCommand): MessageInterface
    {
        try {
            $result = $this->rangeService->removeRange($rangeCommand->id);

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


    public function getRangeList(): MessageInterface
    {
        try {

            $rangeList = $this->rangeRepository->getAll();
            if (empty($rangeList)) {
                $this->message->build(true, 'Zakresy. ', 200, []);
                return $this->message;
            }

            $mapperList = [];
            foreach ($rangeList as $range) {
                $mapperList[] = $this->mapper($range);
            }

            $this->message->build(true, 'Zakresy. ', 200, $mapperList);
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

        return $row;
    }

}