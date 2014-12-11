<?php
namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="month")
 */
class Month
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", name="number", unique=false)
     */
    protected $number;


     /**
     * @ORM\OneToMany(targetEntity="MonthWorkableDays", mappedBy="month")
     */
    protected $workable_days;

	/**
     * @ORM\Column(type="integer", name="default_workable_days", unique=false)
     */
    protected $default_workable_days;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->workable_days = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Month
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Month
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set default_workable_days
     *
     * @param integer $defaultWorkableDays
     * @return Month
     */
    public function setDefaultWorkableDays($defaultWorkableDays)
    {
        $this->default_workable_days = $defaultWorkableDays;

        return $this;
    }

    /**
     * Get default_workable_days
     *
     * @return integer 
     */
    public function getDefaultWorkableDays()
    {
        return $this->default_workable_days;
    }

    /**
     * Add workable_days
     *
     * @param \Medicina\InasistenciasBundle\Entity\MonthWorkableDays $workableDays
     * @return Month
     */
    public function addWorkableDay(\Medicina\InasistenciasBundle\Entity\MonthWorkableDays $workableDays)
    {
        $this->workable_days[] = $workableDays;

        return $this;
    }

    /**
     * Remove workable_days
     *
     * @param \Medicina\InasistenciasBundle\Entity\MonthWorkableDays $workableDays
     */
    public function removeWorkableDay(\Medicina\InasistenciasBundle\Entity\MonthWorkableDays $workableDays)
    {
        $this->workable_days->removeElement($workableDays);
    }

    /**
     * Get workable_days
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorkableDays()
    {
        return $this->workable_days;
    }

    public function __toString() {
        return $this->getName();
    }
}
