<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class EmployeeCRUDController extends Controller
{
    public function reportAction($id = null) {
		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:user_yearly.html.twig', array(
		    'some'  => 'sarasa'
		));

		return new Response(
    		$this->get('knp_snappy.pdf')->getOutputFromHtml($html, array('orientation'=>'Landscape')),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf'
		    )
		);
    }
}