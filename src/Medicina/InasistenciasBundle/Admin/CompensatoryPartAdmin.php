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
use Medicina\InasistenciasBundle\Exception\DeleteValidationException as DeleteValidationException;

class CompensatoryPartAdmin extends Admin
{
    public $user_id = null;
    protected $parentAssociationMapping = 'employee';

    //
    protected function configureFormFields(FormMapper $formMapper)
    {
        $now = new \DateTime();
        $employee_options = array(
            'property'=>'fullname',
            'label'=> 'Empleado',
            'btn_add'=> false
            );

        $formMapper
            ->add('employee', 'sonata_type_model', $employee_options)
            ->add('date', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'dp_language'=> 'es',
                        'required' => false,
                        'label'=> 'Fecha'
                    ))
            ->add('hours', 'integer', array('label' => 'Horas'))
            ->add('minutes', 'integer', array('label' => 'Minutos'))
            ->add('note', 'checkbox', array('label' => 'Por Nota?',  'required'=>false))
            ->add('in_week', 'checkbox', array('label' => 'Durante la Semana?',  'required'=>false))
           
        ;
    }

    public function preRemove($object) {
        if ($object->getCompensatory() != null) {
            throw new DeleteValidationException("No se puede eliminar un Módulo de tiempo que ya fue utilizado para crear un compensatorio. <br/> Pruebe primero borrando el compensatorio correspondiente");
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
            ->addIdentifier('displayInfo', null, array('label'=>'Módulo de Tiempo'))
            ->addIdentifier('used', 'boolean')
        ;
    }

}
