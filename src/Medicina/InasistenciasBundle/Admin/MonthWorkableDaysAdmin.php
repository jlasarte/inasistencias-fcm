<?php

namespace Medicina\InasistenciasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MonthWorkableDaysAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('month', 'sonata_type_model', array('label'=>'Mes',  'attr' => array('class' => 'month_select'), 'btn_add'=>false))
            ->add('workable_days', 'text', array('label' => 'Días laborables'))
            ->add('year', 'integer', array('label' => 'Año'))
        ;
    }

    // Fields to be shown on create/edit forms
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('month')
            ->add('workable_days')
        ;
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('month')
            ->add('workable_days')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('month')
            ->add('workable_days')
        ;
    }
}
