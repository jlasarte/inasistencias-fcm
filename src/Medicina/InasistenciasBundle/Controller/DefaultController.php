<?php

namespace Medicina\InasistenciasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MedicinaInasistenciasBundle:Default:index.html.twig', array('name' => $name));
    }
}
