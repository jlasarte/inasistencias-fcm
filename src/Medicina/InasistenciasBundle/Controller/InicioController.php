<?php

namespace Medicina\InasistenciasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller {

	public function portadaAction() {
		return $this->render('MedicinaInasistenciasBundle:Inicio:portada.html.twig');
	}

}
