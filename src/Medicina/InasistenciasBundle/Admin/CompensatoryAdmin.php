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
use Medicina\InasistenciasBundle\Exception\DeleteValidationException as DeleteValidationException;

class CompensatoryAdmin extends Admin
{
    protected $parentAssociationMapping = 'employee';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $now = new \DateTime();
        
        // Obtenemos el objeto padre (el empleado al cual le vamos a agregar el compensatorio)
        $parent = $this->getParent()->getObject($this->request->get($this->getParent()->getIdParameter()));

        // obtenemos los módulos de tiempo disponibles para este empleado
        $parts = $parent->getCompensatoryParts();


        $employee_options = array(
            'property'=>'fullname',
            'label'=> 'Empleado',
            'btn_add'=> false
            );

        $formMapper
            ->add('employee', 'sonata_type_model', $employee_options)
            ->add('created', 'sonata_type_date_picker', array(
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'dp_language' => 'es',
                        'required' => false,
                        'label'=> 'Fecha Creación'
                    ))
            ->add('used', 'hidden');

         $subject = $this->getSubject();

        if ($subject->getId()==null) {
            // The thumbnail field will only be added when the edited item is created
            $formMapper->add(
                'parts', 
                'entity', array(
                    'class' => 'MedicinaInasistenciasBundle:CompensatoryPart',
                    'property' => 'displayinfo',
                    'multiple' => true,
                    'label'=> 'Módulos de Tiempo Disponibles',
                    'query_builder' => function(EntityRepository $er) use ($parent){
                        return $er->createQueryBuilder('c')
                            ->where('c.compensatory is NULL')
                            ->andWhere('c.employee = :employee')
                            //->orWhere('c.compensatory = :compensatory')
                            ->setParameter('employee', $parent);
                            //->setParameter('compensatory', $this->getSubject());
                    }


            ));
        } else {
            $formMapper->add(
                'parts', 
                'entity', array(
                    'class' => 'MedicinaInasistenciasBundle:CompensatoryPart',
                    'property' => 'displayinfo',
                    'multiple' => true,
                    'label'=> 'Módulos de Tiempo Disponibles',
                    'query_builder' => function(EntityRepository $er) use ($parent){
                        return $er->createQueryBuilder('c')
                            ->where('c.compensatory is NULL')
                            ->andWhere('c.employee = :employee')
                            ->orWhere('c.compensatory = :compensatory')
                            ->setParameter('employee', $parent)
                            ->setParameter('compensatory', $this->getSubject());
                    }
            ));
        }

            
    }

    public function preRemove($object) {
        if ($object->getAbsence() != null) {
            throw new DeleteValidationException("No se puede eliminar un Compensatorio que ya fue utilizado para justificar una inasistencia. <br/> Pruebe primero borrando la inasistencia correspondiente");
        }  
    }

    public function postPersist($object) {
        foreach ($object->getParts() as $part) {
            $part->setCompensatory($object);
            $this->getModelManager()->update($part);
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
            ->addIdentifier('created', null)
            ->addIdentifier('usedtojustify', 'boolean', array('label'=>'Utilizado para justificar una inasistencia?'))
        ;
    }

}
