<?php

namespace Ws\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @author Koen Vinken <vinkenkoen@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('Ws:Lesson:free_terms.html.twig');
    }
}
