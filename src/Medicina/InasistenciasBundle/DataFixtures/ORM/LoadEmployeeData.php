<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\Employee;

class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $string = file_get_contents(realpath(dirname(__FILE__))."/data/employee.json");
        $employee_array = json_decode($string, true);

        foreach ($employee_array as $emplyee) {

            $employee_object = new Employee();
            $employee_object->setName($emplyee['name']);
            $employee_object->setLastName($emplyee['lastname']);
            $employee_object->setOffice($this->getReference($emplyee['office_reference']));
            $employee_object->setType($this->getReference($emplyee['type_reference']));

            $manager->persist($employee_object);
            $manager->flush();
        }
    }

    public function getOrder() {
        return 3;
    }
}

?>