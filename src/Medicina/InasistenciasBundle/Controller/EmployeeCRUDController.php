<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class EmployeeCRUDController extends Controller
{
	private function groupAbsencesByMonth($absences) {
		$grouped_by_month = array();
		foreach ($absences as &$a) {
			$a["start"] = \Datetime::createFromFormat('Y-m-d', $a["start"]); 
			$a["end"]   = \Datetime::createFromFormat('Y-m-d', $a["end"]); 
			$a["count"] = 1;
			if ($a["start"] < $a["end"]) {
				$a["count"] = $a["start"]->diff($a["end"])->format("%a") + 0;
			}
			$grouped_by_month[$a["month"]][] = $a;
		}
		$table_array = array();
		foreach ($grouped_by_month as $month_number => $absences) {
			$count = 0;
			$table_array[$month_number] = array();
			foreach ($absences as $absence) {
				$table_array[$month_number][$absence["type"]][] = $absence;
			}
		}

		$final_table_array = array();
		foreach ($table_array as $month=>$grouped_by_month) {
			$final_table_array[$month] = array();
			$final_table_array[$month]["total"] = 0;
			foreach ($grouped_by_month as $type=>$grouped_by_type) {
				$final_table_array[$month][$type] = array();
				$final_table_array[$month][$type]["total"] = 0;
				$final_table_array[$month][$type]["times"] = 0;
				$final_table_array[$month][$type]["with_pay"] = 0;
				$final_table_array[$month][$type]["without_pay"] = 0;

				foreach ($grouped_by_type as $absence) {
					$final_table_array[$month][$type]["total"] += $absence["count"];
					$final_table_array[$month][$type]["times"]++;
					if($absence["with_pay"]) {
						$final_table_array[$month][$type]["with_pay"]++;
					} else {
						$final_table_array[$month][$type]["without_pay"]++;
					}
				
					$final_table_array[$month]["total"] += $absence["count"];

				}	
			}
		}

		return $final_table_array;
	}


	public function monthlyReportAction($id, $month){
		return $this->report($id, $month);
	}

	public function yearlyreportAction($id) {
		return $this->report($id);
	}

	public function reportAction($id) {
		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:choose.html.twig');
		return new Response($html);
	}
    private function report($id, $month = null) {

    	$id     = $this->get('request')->get($this->admin->getIdParameter());
        $employee = $this->admin->getObject($id);

		
		
		$sql = " 
	        SELECT e.name, e.last_name, at.name as type, at.id as type_id, MONTH(a.start) as month, a.start, a.end, a.with_pay as with_pay
	          FROM employee  e
	          INNER JOIN absence a ON (e.id = a.employee_id)
	          INNER JOIN absence_type at on (a.type_id = at.id)
	          WHERE e.id = :id and YEAR(a.start) = YEAR(NOW())
	    	";
	    $stmt = $this->admin->getmodelManager()->getEntityManager($employee)->getConnection()->prepare($sql);
	    $stmt->bindValue('id', $id);
	    $stmt->execute();

	    $sql_m = " 
	        SELECT m.name as name, m.number as number,
	        	COALESCE(mwd.workable_days, m.default_workable_days) as workable_days
	          FROM month  m 
	          left join month_workable_days mwd on (m.id = mwd.month_id)
	          where (mwd.year = YEAR(NOW()) or mwd.year is null) 
	          and (m.number = :month or :month is null)
	    	";
	    $stmt_m = $this->admin->getmodelManager()->getEntityManager($employee)->getConnection()->prepare($sql_m);
	   	$stmt_m->bindValue('month', $month);
	    $stmt_m->execute();
    	
    	$months = $stmt_m->fetchAll();
    	$ausencias = $stmt->fetchAll();

	    $grouped = $this->groupAbsencesByMonth($ausencias);

	    //echo "<pre>";
	    //var_dump($grouped);
	    //echo "</pre>";
		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:user_yearly.html.twig', array(
		    'employee'  => $employee,
		    'absences'  => $grouped,
		    'months'=> $months,
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