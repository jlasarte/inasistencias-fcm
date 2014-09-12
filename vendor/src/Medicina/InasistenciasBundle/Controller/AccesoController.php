<?php

namespace Medicina\InasistenciasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccesoController extends Controller {

  /**
   * @Route("/ingresar")
   * @Template()
   */
  public function ingresarAction() {
    return $this->render('MedicinaInasistenciasBundle:Acceso:ingresar.html.twig');
  }

}
