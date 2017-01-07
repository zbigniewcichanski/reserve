<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:13
 */

namespace Core\Service\Dm\Service;

use Core\Core\Specification\Specification;
use Core\Service\Dm\Entity\Teacher\CategoryVO;
use Core\Service\Dm\Entity\Teacher\LessonVO;
use Core\Service\Dm\Entity\Teacher\RangeVO;
use Core\Service\Dm\Entity\TeacherAggregate;
use Core\Service\Dm\Repository\TeacherRepository;
use Symfony\Component\Config\Definition\Exception\Exception;

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
    /**
     * @var Specification
     */
    private $teacherMustHaveMinOneCategory;
    /**
     * @var Specification
     */
    private $teacherMustHaveMinOneRange;

    public function __construct(TeacherRepository $teacherRepository, Specification $teacherNameIsUnique, Specification $teacherMustHaveMinOneCategory , Specification $teacherMustHaveMinOneRange)
    {
        $this->teacherNameIsUnique = $teacherNameIsUnique;
        $this->teacherRepository = $teacherRepository;
        $this->teacherMustHaveMinOneCategory = $teacherMustHaveMinOneCategory;
        $this->teacherMustHaveMinOneRange = $teacherMustHaveMinOneRange;
    }

    public function addTeacher(string $name, string $surname, string $email)
    {
        try {
            if ($this->teacherNameIsUnique->not()->isSatisfiedBy($email)) {
                return ['status' => false, 'message' => 'Podany email jest już przypisany do korepetytora. Nie możesz go ponowanie wykorzystać.'];
            }

            $teacherAggregate = new TeacherAggregate();
            $teacherAggregate->setName($name);
            $teacherAggregate->setSurname($surname);
            $teacherAggregate->setEmail($email);

            $teacherAggregate->save();

            return ['status' => true, 'message' => 'Korepetytor został dodany.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w porcesie dodawania korepetytora." . $e->getMessage());
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
                return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
            }

            $teacherAggregate->deleted();

            $teacherAggregate->save();

            return ['status' => true, 'message' => 'Korepetytor został usunięty.'];

        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie usuwania korepetytora." . $e->getMessage());
        }
    }

    public function changeTeacherData(string $teacherId, string $name, string $surname, string $city, string $postCode, string $phone, bool $driveToStudent)
    {
        try {

        /**
         * @var TeacherAggregate $teacherAggregate
         */
        $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
        if (!$teacherAggregate) {
            return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
        }
        $teacherAggregate->changeName($name);
        $teacherAggregate->changeSurname($surname);
        $teacherAggregate->changeCity($city);
        $teacherAggregate->changePostCode($postCode);
        $teacherAggregate->changePhone($phone);

        if($driveToStudent === true){
            $teacherAggregate->driveToStudent();
        } else {
            $teacherAggregate->notDriveToStudent();
        }

        $teacherAggregate->save();


        return ['status'=>true, 'message'=>'Dane zostały zaktualizowane.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie zmiany danych korepetytora." . $e->getMessage());

        }
    }

    public function addCategoryToTeacher($teacherId, $categoryId)
    {
        try {

            /**
             * @var TeacherAggregate $teacherAggregate
             */
            $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
            if (!$teacherAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
            }

            $categoryVO = new CategoryVO();
            $categoryVO->setCategoryId($categoryId);
            $categoryVO->setTeacherId($teacherId);

            $teacherAggregate->addCategory($categoryVO);

            $teacherAggregate->save();

            return ['status'=>true, 'message'=>'Kategoria została dodana.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie zmiany danych korepetytora." . $e->getMessage());
        }
    }

    public function removeTeacherCategory($teacherId, $categoryId)
    {
        try {

            /**
             * @var TeacherAggregate $teacherAggregate
             */
            $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
            if (!$teacherAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
            }

            $categories = $teacherAggregate->getCategories();

            if(!isset($categories[$categoryId])){
                return ['status' => false, 'message' => 'Na takiej kategori.'];

            }

            $category = $categories[$categoryId];
            $category->deleted();

            $teacherAggregate->save();

            return ['status'=>true, 'message'=>'Kategoria została usunięta.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie usuwania kategorii nauczyciela korepetytora." . $e->getMessage());
        }
    }

    public function addRangeToTeacher($teacherId, $rangeId)
    {
        try {

            /**
             * @var TeacherAggregate $teacherAggregate
             */
            $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
            if (!$teacherAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
            }

            $rangeVO = new RangeVO();
            $rangeVO->setRangeId($rangeId);
            $rangeVO->setTeacherId($teacherId);

            $teacherAggregate->addRange($rangeVO);

            $teacherAggregate->save();

            return ['status'=>true, 'message'=>'Zakres została dodany.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie dodawania zakresu do  korepetytora." . $e->getMessage());
        }
    }

    public function removeTeacherRange($teacherId, $rangeId)
    {
        try {

            /**
             * @var TeacherAggregate $teacherAggregate
             */
            $teacherAggregate = $this->teacherRepository->getOnIdentity($teacherId);
            if (!$teacherAggregate) {
                return ['status' => false, 'message' => 'Nie ma takiego nauczyciela.'];
            }

            $ranges = $teacherAggregate->getRanges();

            if(!isset($ranges[$rangeId])){
                return ['status' => false, 'message' => 'Na takiej kategori.'];

            }

            $range = $ranges[$rangeId];
            $range->deleted();

            $teacherAggregate->save();

            return ['status'=>true, 'message'=>'Zakres została usunięty.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie usuwania zakresu nauczyciela korepetytora." . $e->getMessage());
        }
    }

}