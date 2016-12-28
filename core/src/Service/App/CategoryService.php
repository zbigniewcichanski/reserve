<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 16:39
 */

namespace Core\Service\App;

use Core\Core\MessageInterface;
use Core\Service\App\Command\CategoryCommand;
use Core\Service\Dm\Repository\CategoryRepository;

class CategoryService
{
    private $message;

    private $categoryService;

    private $categoryRepository;

    public function __construct(MessageInterface $message, \Core\Service\Dm\Service\CategoryService $categoryService, CategoryRepository $categoryRepository)
    {
        $this->message = $message;
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function createCategory(CategoryCommand $categoryCommand): MessageInterface
    {
        try {
            $result = $this->categoryService->createCategory($categoryCommand->name, $categoryCommand->idParent);

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


    public function getCategoryList(): MessageInterface
    {
        try {

            $categoryList = $this->categoryRepository->getAll();

            if (empty($categoryList)) {
                $this->message->build(true, 'Zasoby. ', 200, []);
            }

            $mapperList = [];
            foreach ($categoryList as $team) {
                $mapperList[] = $this->mapperResource($team);
            }

            $this->message->build(true, 'Kategorie. ', 200, $mapperList);
            return $this->message;
        } catch (\Exception $e) {
            $this->message->build(false, 'Wystąpił błąd.' . $e->getMessage(), 500);
            return $this->message;
        }
    }

}