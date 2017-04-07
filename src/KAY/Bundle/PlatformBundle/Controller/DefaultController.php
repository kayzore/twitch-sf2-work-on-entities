<?php

namespace KAY\Bundle\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KAYPlatformBundle:Default:index.html.twig');
    }
}
