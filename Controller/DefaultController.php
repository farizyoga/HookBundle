<?php

namespace FYS\HookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	return $this->render('default/index.html.twig', array('base_dir' => 'asd'));
    }
}
