<?php

namespace Medicina\InasistenciasBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class OfficeCRUDController extends DeleteValidationCRUDController
{
	private function groupAbsencesByEmployee($absences) {
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



    public function reportAction($id, $month=null) {

    	$id     = $this->get('request')->get($this->admin->getIdParameter());
        $office = $this->admin->getObject($id);
        $month_number = $month != null ? $month->getNumber() : null;
		
		$sql = " 
	        SELECT e.id as employee_id, e.name, e.last_name, at.name as type, at.id as type_id, MONTH(a.start) as month, a.start, a.end, a.with_pay as with_pay
	          FROM employee  e
	          INNER JOIN absence a ON (e.id = a.employee_id)
	          INNER JOIN absence_type at on (a.type_id = at.id)
	          INNER JOIN office o ON (o.id = e.office_id)
	          WHERE o.id = :id and (MONTH(a.start) =:month or :month is null)
	    	";
	    $stmt = $this->admin->getmodelManager()->getEntityManager($office)->getConnection()->prepare($sql);
	    $stmt->bindValue('id', $id);
	    $stmt->bindValue('month', $month_number);
	    $stmt->execute();

	    $sql_m = " 
	        SELECT m.name as name, m.number as number,
	        	COALESCE(mwd.workable_days, m.default_workable_days) as workable_days
	          FROM month  m 
	          left join month_workable_days mwd on (m.id = mwd.month_id)
	          where mwd.year = YEAR(NOW()) or mwd.year is null
	          and (m.number = :month or :month is null)
	    	";
	    $stmt_m = $this->admin->getmodelManager()->getEntityManager($office)->getConnection()->prepare($sql_m);
	   	$stmt_m->bindValue('month', $month_number);
	    $stmt_m->execute();
    	
    	$months = $stmt_m->fetchAll();
    	$workable_days_yearly = 0;
    	foreach ($months as $m) {
    		$workable_days_yearly += $m["workable_days"];
    	}

    	$ausencias = $stmt->fetchAll();
	    $grouped = $this->groupAbsencesByEmployee($ausencias);

		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:office_yearly.html.twig', array(
		    'office'  => $office,
		    'absences'  => $grouped,
		    'month'=> $month,
		    'workable_days'=> $workable_days_yearly,
		));
        
		return new Response(
    		$this->get('knp_snappy.pdf')->getOutputFromHtml($html, array('orientation'=>'Landscape')),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf'
		    )
		);
    }

    public function monthlyReportAction($id) {
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

		$html = $this->renderView('MedicinaInasistenciasBundle:Reports:office_monthly.html.twig', array(
		    'office'  => $office,
		    'absences'  => $grouped,
		    'months' => $months,
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

    public function monthlyEmployeeReportAction($id) {


        if ($this->getRestMethod() == 'POST') {

        	$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
			$form = $request->request->get('form');
			$office = $this->get('request')->get($this->admin->getIdParameter());
			$object = $this->admin->getObject($office);

			$month = $form["months"];
			$em = $this->admin->getmodelManager()->getEntityManager($object);
			$month = $em->getRepository('MedicinaInasistenciasBundle:Month')->find($month);
        	return $this->reportAction($office, $month);

        } else {

	        $id = $this->get('request')->get($this->admin->getIdParameter());

	        $object = $this->admin->getObject($id);

	        if (!$object) {
	            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
	        }

	        if (false === $this->admin->isGranted('VIEW', $object)) {
	            throw new AccessDeniedException();
	        }

	        $sql_m = " 
		        SELECT m.name as name
		          FROM month  m 
		    	";
		    $stmt_m = $this->admin->getmodelManager()->getEntityManager($object)->getConnection()->prepare($sql_m);
		    $stmt_m->execute();
	    	
	    	$months = $stmt_m->fetchAll();

	    	$form = $this->createFormBuilder()
	            ->add('months', 'entity', array(
				    'class' => 'MedicinaInasistenciasBundle:Month',
				    'property' => 'name',
				))
				->add('save', 'submit', array('label' => 'Generar Reporte'))
	            ->getForm();


	         return $this->render('MedicinaInasistenciasBundle:InasistenciaAdmin:saraba.html.twig', array(
	            'action'   => 'show',
	            'object'   => $object,
	            'months' =>   $months,
	            'form' => $form->createView(),
	            'elements' => $this->admin->getShow(),
	        ));
     	}
    }
}