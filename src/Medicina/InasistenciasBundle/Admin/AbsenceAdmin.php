<?php

namespace Medicina\InasistenciasBundle\Admin;
use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ORM\ProxyQuery;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Medicina\InasistenciasBundle\Exception\CreateValidationException as CreateValidationException;


class AbsenceAdmin extends Admin
{
    protected $parentAssociationMapping = 'employee';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
       
        // Obtenemos el objeto padre (el empleado al cual le vamos a agregar la ausencia)
        $parent = $this->getParent()->getObject($this->request->get($this->getParent()->getIdParameter()));
        
        $now = new \DateTime();

        $employee_options = array(
            'property'=>'fullname',
            'label'=> 'Empleado',
            'btn_add'=> false
            );

        $formMapper
            ->add('employee', 'sonata_type_model', $employee_options)
            ->add('type', 'sonata_type_model', array('label'=>'Tipo de Ausencia',  'attr' => array('class' => 'absence_type_select'), 'btn_add'=>false))
            ->add('state','sonata_type_model', array('label'=>'Estado de Ausencia', 'attr' => array('class' => 'absence_state_select'), 'btn_add'=>false))
            ->add('start', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => true,
                        'label'=> 'Inicio'
                    ))
            ->add('end', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => true,
                        'label'=> 'Fin'
                    ))
            ->add('remarks', 'text' ,array('label'=>'Observaciones', 'required'=> false))
            ->add('with_pay', 'checkbox', array('label' => 'Con sueldo?',  'required'=>false))
            ->add(
                'compensatories', 
                'entity', array(
                    'class' => 'MedicinaInasistenciasBundle:Compensatory',
                    'property' => 'displayinfo',
                    'multiple' => true,
                    'required' => false,
                    'label'=> 'Compensatorios disponibles',
                    'attr' => array('class' => 'absence_compensatories_select'),
                    'query_builder' => function(EntityRepository $er) use ($parent){
                        return $er->createQueryBuilder('c')
                            ->where('c.absence is NULL')
                            ->andWhere('c.employee = :employee')
                            ->setParameter('employee', $parent);
                    }

                
            )) 
        ;
    }

    public function postPersist($absence) {
        if (($absence->getType()->getName() == "Compensatorio")) {
            foreach ($absence->getCompensatories() as $c) {
                $c->setAbsence($absence);
                $this->getModelManager()->update($c);
            }
        }

    }

    public function prePersist($absence) {
        if (!$absence->isMedical()) {
            // si no es carpeta medica le nulleamos el estado (nigga nigga)
            $absence->setState(null);
        }

        if (($absence->isCompensatory()) and ($absence->getCompensatories()->isEmpty())) {
            throw new CreateValidationException("No se puede crear una ausencia de tipo compensatorio sin uno, o más, compensatorios que la justifiquen.");
        } 

        if ($absence->getStart() > $absence->getEnd()) {
            throw new CreateValidationException("La fecha de inicio de una ausencia no puede ser mayor que su fecha de fin.");
        }
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
       
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('start_and_end', null, array('label'=>'Ausencia'))
        ;
    }

}
