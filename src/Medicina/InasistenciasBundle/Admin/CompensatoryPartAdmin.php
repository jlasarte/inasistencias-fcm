<?php

namespace Medicina\InasistenciasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CompensatoryPartAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $now = new \DateTime();
        $formMapper
            ->add('employee', 'sonata_type_model', array('property'=>'name','label'=> 'Empleado'))
            ->add('hours', 'integer', array('label' => 'Horas'))
            ->add('minutes', 'integer', array('label' => 'Minutos'))
            ->add('note', 'checkbox', array('label' => 'Por Nota?'))
            ->add('in_week', 'checkbox', array('label' => 'Durante la Semana?'))
            ->add('date', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => false
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
}
