<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\Absence;

class LoadAbsenceData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $string = file_get_contents(realpath(dirname(__FILE__))."/data/absences.json");
        $absence_array = json_decode($string, true);
        foreach ($absence_array as $a) {

            $absence = new Absence();
            $absence->setEmployee($this->getReference($a['employee_reference']));
            $absence->setType($this->getReference($a['type_reference']));
            
            $start_date = \Datetime::createFromFormat("y-m-d", $a["start"]);
            $end_date = clone $start_date;
            $end_date->add(new \DateInterval('P'.rand(0,10).'D'));
            $absence->setStart($start_date);
            $absence->setEnd($end_date);
            $absence->setWithpay(rand(0,1) == 1);
            $manager->persist($absence);
           
            $manager->flush();
        }
    }

    public function getOrder() {
        return 6;
    }
}

?>