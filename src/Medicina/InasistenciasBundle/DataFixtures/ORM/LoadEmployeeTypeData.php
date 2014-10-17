<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\EmployeeType;

class LoadEmployeeTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $employee_types = array("planta", "contratado", "pasante" );

        foreach ($employee_types as $type) {
            $type_object = new EmployeeType();
            $type_object->setName(ucfirst($type));
            $manager->persist($type_object);
            $manager->flush();

            $this->addReference($type,$type_object);
        }
        
    }

    public function getOrder()
    {
        return 2;
    }
}

?>