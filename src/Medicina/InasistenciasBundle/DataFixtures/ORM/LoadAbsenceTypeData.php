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
        
        $absence_types = array("Carpeta Médica", "Compensatorio", "Ausente con Aviso", "Licencia Anual" );

        foreach ($absence_types as $type) {
            $type_object = new AbsenceType();
            $type_object->setName($type);
            $manager->persist($type_object);
            $manager->flush();
        }
        
    }

    public function getOrder()
    {
        return 4;
    }
}

?>