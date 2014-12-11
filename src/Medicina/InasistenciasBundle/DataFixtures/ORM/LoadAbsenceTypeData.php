<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\AbsenceType;

class LoadAbsenceTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $absence_types = 
            array(
                array("name"=>"Inasistencia sin Justificar", "reference"=>"sin-jus"),
                array("name"=>"Inasistencia Justicada", "reference"=>"jus"),
                array("name"=>"Suspension", "reference"=>"suspension"),
                array("name"=>"Salida Temprano", "reference"=>"temprano"),
                array("name"=>"Llegada Tarde", "reference"=>"tarde"),
                array("name"=>"Otra Licencia", "reference"=>"otra"),
                array("name"=>"Compensatorio", "reference"=>"compensatorio"),
                array("name"=>"Vacaciones Anuales", "reference"=>"vacaciones"),
                array("name"=>"Sanidad", "reference"=>"carpeta")
                );
        foreach ($absence_types as $type) {
            $type_object = new AbsenceType();
            $type_object->setName($type["name"]);
            $manager->persist($type_object);
            $this->addReference($type["reference"],$type_object);
            $manager->flush();
        }
        
    }

    public function getOrder()
    {
        return 4;
    }
}

?>