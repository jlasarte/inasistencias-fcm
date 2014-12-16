<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class OfficeCRUDController extends DeleteValidationCRUDController
{
	private function groupAbsencesByMonth($absences) {
		$grouped_by_employee = array();
		$employee_data = array();
		foreach ($absences as &$a) {
			$a["start"] = \Datetime::createFromFormat('Y-m-d', $a["start"]); 
			$a["end"]   = \Datetime::createFromFormat('Y-m-d', $a["end"]); 
			$a["count"] = 1;
			if ($a["start"] < $a["end"]) {
				$a["count"] = $a["start"]->diff($a["end"])->format("%a") + 0;
			}
			$grouped_by_employee[$a["employee_id"]][] = $a;
			$employee_data[$a["employee_id"]]["name"] = $a["name"];
			$employee_data[$a["employee_id"]]["last_name"] = $a["last_name"];
		}
		
		$table_array = array();

		foreach ($grouped_by_employee as $employee_id => $absences) {
			$count = 0;
			$table_array[$employee_id] = array();
			foreach ($absences as $absence) {
				$table_array[$employee_id][$absence["type"]][] = $absence;
			}
		}

		

		$final_table_array = array();
		foreach ($table_array as $employee=>$grouped_by_employee) {
			$final_table_array[$employee] = array();
			$final_table_array[$employee]["total"] = 0;
			$final_table_array[$employee]["employee_name"] = $employee_data[$employee]["name"];
			$final_table_array[$employee]["employee_last_name"] = $employee_data[$employee]["last_name"];
			foreach ($grouped_by_employee as $type=>$grouped_by_type) {
				$final_table_array[$employee][$type] = array();
				$final_table_array[$employee][$type]["total"] = 0;
				$final_table_array[$employee][$type]["times"] = 0;
				$final_table_array[$employee][$type]["with_pay"] = 0;
				$final_table_array[$employee][$type]["without_pay"] = 0;

				foreach ($grouped_by_type as $absence) {
					$final_table_array[$employee][$type]["total"] += $absence["count"];
					$final_table_array[$employee][$type]["times"]++;
					if($absence["with_pay"]) {
						$final_table_array[$employee][$type]["with_pay"]++;
					} else {
						$final_table_array[$employee][$type]["without_pay"]++;
					}
				
					$final_table_array[$employee]["total"] += $absence["count"];

				}	
			}
		}

		return $final_table_array;
	}

    public function reportAction($id) {

    	$id     = $this->get('request')->get($this->admin->getIdParameter());
        $office = $this->admin->getObject($id);

		
		
		$sql = " 
	        SELECT e.id as employee_id, e.name, e.last_name, at.name as type, at.id as type_id, MONTH(a.start) as month, a.start, a.end, a.with_pay as with_pay
	          FROM employee  e
	          INNER JOIN absence a ON (e.id = a.employee_id)
	          INNER JOIN absence_type at on (a.type_id = at.id)
	          INNER JOIN office o ON (o.id = e.office_id)
	          WHERE o.id = :id
	    	";
	    $stmt = $this->admin->getmodelManager()->getEntityManager($office)->getConnection()->prepare($sql);
	    $stmt->bindValue('id', $id);
	    $stmt->execute();

	    $sql_m = " 
	        SELECT m.name as name, m.number as number,
	        	COALESCE(mwd.workable_days, m.default_workable_days) as workable_days
	          FROM month  m 
	          left join month_workable_days mwd on (m.id = mwd.month_id)
	          where mwd.year = YEAR(NOW()) or mwd.year is null
	    	";
	    $stmt_m = $this->admin->getmodelManager()->getEntityManager($office)->getConnection()->prepare($sql_m);
	    $stmt_m->execute();
    	
    	$months = $stmt_m->fetchAll();
    	$workable_days_yearly = 0;
    	foreach ($months as $m) {
    		$workable_days_yearly += $m["workable_days"];
    	}

    	$ausencias = $stmt->fetchAll();

	    $grouped = $this->groupAbsencesByMonth($ausencias);

		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:office_yearly.html.twig', array(
		    'office'  => $office,
		    'absences'  => $grouped,
		    'workable_days'=> $workable_days_yearly,
		));
        
        //return new Response($html);

		return new Response(
    		$this->get('knp_snappy.pdf')->getOutputFromHtml($html, array('orientation'=>'Landscape')),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf'
		    )
		);
    }
}