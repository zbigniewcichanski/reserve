<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:29
 */

namespace Core\Service\Dm\Service;

use Core\Core\Specification\Specification;
use Core\Service\Dm\Entity\RangeAggregate;
use Core\Service\Dm\Repository\RangeRepository;

class RangeService
{
    /**
     * @var RangeRepository
     */
    private $rangeRepository;

    /**
     * @var Specification
     */
    private $rangeNameIsUnique;

    public function __construct(RangeRepository $rangeRepository, Specification $rangeNameIsUnique)
    {
        $this->rangeNameIsUnique = $rangeNameIsUnique;
        $this->rangeRepository = $rangeRepository;
    }

    public function createRange($name)
    {
        try {

            if ($this->rangeNameIsUnique->not()->isSatisfiedBy($name)) {
                return ['status' => false, 'message' => 'Istnieje już zakres o podanej nazwie.'];
            }

            $rangeAggregate = new RangeAggregate();
            $rangeAggregate->setName($name);

            $rangeAggregate->save();

            return ['status' => true, 'message' => 'Zakres został dodany.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie tworzenia zakresu." . $e->getMessage());
        }
    }

    public function changeRangeName($rangeId, $newName)
    {
        try {

            /**
             * @var RangeAggregate $rangeAggregate
             */
            $rangeAggregate = $this->rangeRepository->getOnIdentity($rangeId);
            if (!$rangeAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego zakresu.'];
            }

            if ($rangeAggregate->getName() == $newName) {
                return ['status' => false, 'message' => 'Wybrany zakres ma już taką nazwę.'];
            }

            if ($this->rangeNameIsUnique->not()->isSatisfiedBy($newName)) {
                return ['status' => false, 'message' => 'Istnieje już zakres o podanej nazwie.'];
            }

            $rangeAggregate->changeName($newName);

            $rangeAggregate->save();

            return ['status' => true, 'message' => 'Nazwa Zakresu została zmieniona.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie zmiany nazwy zakresu." . $e->getMessage());
        }
    }

    public function removeRange($rangeId)
    {
        try {

            /**
             * @var RangeAggregate $rangeAggregate
             */
            $rangeAggregate = $this->rangeRepository->getOnIdentity($rangeId);
            if (!$rangeAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego zakresu.'];
            }

            $rangeAggregate->deleted();

            $rangeAggregate->save();

            return ['status' => true, 'message' => 'Zakres została usunięty.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie usuwania zakresu." . $e->getMessage());
        }
    }

}