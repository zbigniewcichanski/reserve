<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 08.01.2017
 * Time: 13:48
 */

namespace Ws\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function renderTemplate($template, $data)
    {
        return $this->render($template, ['data'=>$data]);
    }
}