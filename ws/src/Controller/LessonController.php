<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 08.01.2017
 * Time: 13:48
 */

namespace Ws\Controller;

use Core\Service\App\Command\LessonCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Core\Service\App\LessonService;

class LessonController extends BaseController
{
    /**
     * @var LessonService $service
     */
    private $service;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->service = $container->get('service-lesson-service');
        $this->container = $container;
    }

    /**
     *@Route("/wolne_terminy")
     */
    public function getFreeTermsAction()
    {
        $today = date("Y, n, j");

        $today = '2017-01-05';

        $lessonCommand = new LessonCommand();
        $lessonCommand->date = $today;

        $message = $this->service->getFreeTermsForDay($lessonCommand);


        return $this->renderTemplate('Ws:Lesson:free_terms.html.twig', [
            'message'=>$message->getMessage(),
            'free_terms'=>$message->getData()
        ]);
    }
}