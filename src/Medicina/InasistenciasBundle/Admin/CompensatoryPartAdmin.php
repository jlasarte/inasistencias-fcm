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

class CompensatoryPartAdmin extends Admin
{
    public $user_id = null;

    protected function configureRoutes(RouteCollection $collection) 
    {
        $collection->add('createbyuser');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $now = new \DateTime();
        $employee_options = array(
            'property'=>'fullname',
            'label'=> 'Empleado',
            'btn_add'=> false
            );

        if ($this->user_id) {
           echo "fuck you";
        }

        $formMapper
            ->add('employee', 'sonata_type_model', $employee_options)
            ->add('hours', 'integer', array('label' => 'Horas'))
            ->add('minutes', 'integer', array('label' => 'Minutos'))
            ->add('note', 'checkbox', array('label' => 'Por Nota?'))
            ->add('in_week', 'checkbox', array('label' => 'Durante la Semana?'))
            ->add('date', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => false,
                        'label'=> 'Fecha'
                    ))
        ;
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
            ->addIdentifier('date')
        ;
    }

    public function getParentAssociationMapping()
        {
            return 'employee';
        }
}
