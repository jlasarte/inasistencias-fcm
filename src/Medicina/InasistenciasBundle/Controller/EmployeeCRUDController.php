<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class EmployeeCRUDController extends Controller
{
	private function groupAbsencesByMonth($absences) {
		$grouped_absences = array();
		foreach ($absences as &$a) {
			$a["start"] = \Datetime::createFromFormat('Y-m-d', $a["start"]); 
			$a["end"]   = \Datetime::createFromFormat('Y-m-d', $a["end"]); 
			
			$grouped_absences[$a["month"]][] = $a;
		}
		return $grouped_absences;
	}

    public function reportAction($id) {

    	$id     = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);

		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:user_yearly.html.twig', array(
		    'employee'  => $object
		));
		
		$sql = " 
	        SELECT e.name, e.last_name, at.name, MONTH(a.start) as month, a.start, a.end
	          FROM employee  e
	          INNER JOIN absence a ON (e.id = a.employee_id)
	          INNER JOIN absence_type at on (a.type_id = at.id)
	          group by MONTH(start)
	    	";
	    $stmt = $this->admin->getmodelManager()->getEntityManager($object)->getConnection()->prepare($sql);
	    $stmt->execute();
    	
    	$ausencias = $stmt->fetchAll();
	    $grouped = $this->groupAbsencesByMonth($ausencias);


	    echo "<pre>";
	    var_dump($grouped);
	    echo "</pre>";

		/*return new Respons
		e(
    		$this->get('knp_snappy.pdf')->getOutputFromHtml($html, array('orientation'=>'Landscape')),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf'
		    )
		);*/
    }
}