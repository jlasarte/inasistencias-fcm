<?php

namespace Medicina\InasistenciasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Medicina\InasistenciasBundle\Entity\Month;

class LoadMonthData extends AbstractFixture implements OrderedFixtureInterface
{
     /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $months = 
            array(
                array("name"=>"Enero", "workable_days"=>22),
                array("name"=>"Febrero", "workable_days"=>19),
                array("name"=>"Marzo", "workable_days"=>18),
                array("name"=>"Abril", "workable_days"=>20),
                array("name"=>"Mayo", "workable_days"=>20),
                array("name"=>"Junio", "workable_days"=>20),
                array("name"=>"Julio", "workable_days"=>22),
                array("name"=>"Agosto", "workable_days"=>20),
                array("name"=>"Septiembre", "workable_days"=>21),
                array("name"=>"Octubre", "workable_days"=>22),
                array("name"=>"Noviembre", "workable_days"=>19),
                array("name"=>"Diciembre", "workable_days"=>20)
                );

        foreach ($months as $number=>$month) {
            $month_object = new Month();
            $month_object->setName($month["name"]);
            $month_object->setNumber($number+1);
            $month_object->setDefaultworkabledays($month["workable_days"]);
            $manager->persist($month_object);
            $manager->flush();
        }
        
    }

    public function getOrder()
    {
        return 5;
    }
}

?>