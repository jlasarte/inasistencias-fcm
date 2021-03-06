<?php
namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="month_workable_days")
 */
class MonthWorkableDays 
{

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Month", inversedBy="workable_days")
    * @ORM\JoinColumn(name="month_id", referencedColumnName="id")
    */
    protected $month;

	/**
     * @ORM\Column(type="integer", name="year", unique=false)
     */
    protected $year;

    /**
     * @ORM\Column(type="integer", name="workable_days", unique=false)
     */
    protected $workable_days;

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
     * Set year
     *
     * @param integer $year
     * @return MonthWorkableDays
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        if ($this->year == null ) {
            return date('Y');
        }
        return $this->year;
    }

    /**
     * Set workable_days
     *
     * @param integer $workableDays
     * @return MonthWorkableDays
     */
    public function setWorkableDays($workableDays)
    {
        $this->workable_days = $workableDays;

        return $this;
    }

    /**
     * Get workable_days
     *
     * @return integer 
     */
    public function getWorkableDays()
    {
        return $this->workable_days;
    }

    /**
     * Set month
     *
     * @param \Medicina\InasistenciasBundle\Entity\Month $month
     * @return MonthWorkableDays
     */
    public function setMonth(\Medicina\InasistenciasBundle\Entity\Month $month = null)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return \Medicina\InasistenciasBundle\Entity\Month 
     */
    public function getMonth()
    {
        return $this->month;
    }

}
