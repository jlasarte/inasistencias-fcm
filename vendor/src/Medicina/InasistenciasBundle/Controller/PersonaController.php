<?php

namespace Medicina\InasistenciasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PersonaController extends Controller {

  /**
   * @Route("/nueva")
   * @Template()
   */
  public function nuevaAction() {
    
  }

  /**
   * @Route("/edicion")
   * @Template()
   */
  public function edicionAction() {
    
  }

  /**
   * @Route("/catalogo")
   * @Template()
   */
  public function catalogoAction() {
    return $this->render('MedicinaInasistenciasBundle:Persona:catalogo.html.twig');
  }

  /**
   * @Route("/baja")
   * @Template()
   */
  public function bajaAction() {
    
  }

}
