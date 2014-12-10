<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class EmployeeCRUDController extends Controller
{
    public function reportAction($id) {

    	$id     = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);

		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:user_yearly.html.twig', array(
		    'employee'  => $object
		));

		 $sql = " 
	        SELECT name
	          FROM employee
	    	";

	    $stmt = $this->admin->getmodelManager()->getEntityManager($object)->getConnection()->prepare($sql);
	    $stmt->execute();
    	var_dump($stmt->fetchAll());

		/*return new Response(
    		$this->get('knp_snappy.pdf')->getOutputFromHtml($html, array('orientation'=>'Landscape')),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf'
		    )
		);*/
    }
}