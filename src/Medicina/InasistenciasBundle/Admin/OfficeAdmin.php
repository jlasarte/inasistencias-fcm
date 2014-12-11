<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Medicina\InasistenciasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Medicina\InasistenciasBundle\Exception\DeleteValidationException as DeleteValidationException;

class OfficeAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection) 
    {
        $collection->add('report', $this->getRouterIdParameter().'/report');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Nombre'))
        ;
    }

    // Fields to be shown on create/edit forms
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('employees')
        ;
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label'=>'Nombre'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label'=>'Nombre'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'Reporte de Ausencias'=>array(
                        'template'=>
                        'MedicinaInasistenciasBundle:CRUD:list__action_report_office.html.twig')
                )
            ))
        ;
    }

    public function preRemove($object) {
        if (!$object->getEmployees()->isEmpty()) {
            throw new DeleteValidationException("No se puede eliminar una oficina que continene usuarios asignados. <br/> Pruebe primero borrando los empleados correspondiente");
        }  
    }
}
