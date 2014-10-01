<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Medicina\InasistenciasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EmployeeAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Nombre'))
            ->add('last_name', 'text', array('label' => 'Apellido'))
            ->add('office', 'sonata_type_model_autocomplete', array('property'=>'name','label'=> 'Oficina'))
            ->add('type', 'sonata_type_model', array('property'=>'name','label'=> 'Tipo de Empleado'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label'=> 'Nombre'))
            ->add('last_name', null, array('label'=>'Apellido'))
            ->add('office', null, array('label'=>'Oficina'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label'=>'Nombre'))
            ->add('last_name', null, array('label'=>'Apellido'))
            ->add('office', null, array('label'=>'Oficina'))
        ;
    }
}
