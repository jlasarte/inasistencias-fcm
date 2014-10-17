<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\Office;

class LoadOfficeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $string = file_get_contents(realpath(dirname(__FILE__))."/data/offices.json");
        $offices_array = json_decode($string, true);
        var_dump(json_last_error());
        foreach ($offices_array as $office) {
            $office_object = new Office();
            $office_object->setName($office['name']);
            $manager->persist($office_object);
            $manager->flush();

            $this->addReference($office['reference'],$office_object);
        }
        
    }

    public function getOrder()
    {
        return 1;
    }
}

?>