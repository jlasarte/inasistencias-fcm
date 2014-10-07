<?php 

namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection; 

/**
 * @ORM\Entity
 * @ORM\Table(name="compensatory_part")
 */
class CompensatoryPart
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @ORM\GeneratedValue
	 */
	protected $id = null;
	
	/**
	 * @ORM\Column(type="boolean", name="note", nullable=false)
	 */
	protected $note = false;
	
	/**
	 * @ORM\Column(type="date", name="date")
	 */
	protected $date = null;
	
	/**
	 * @ORM\Column(type="integer", name="hours", unique=false)
	 */
	protected $hours;
	
	/**
	 * @ORM\Column(type="integer", name="minutes", unique=false)
	 */
	protected $minutes;
	

	/**
	 * @ORM\Column(type="boolean", name="in_week", nullable=false)
	 */
	protected $in_week = true;
	
	 /**
     * @ORM\ManyToOne(targetEntity="Compensatory", inversedBy="parts")
     * @ORM\JoinColumn(name="compensatory_id", referencedColumnName="id")
     */
    protected $compensatory;

    /**
    * @ORM\ManyToOne(targetEntity="Employee", inversedBy="compensatory_parts")
    * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
    */
    protected $employee;

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
     * Set note
     *
     * @param boolean $note
     * @return CompensatoryPart
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return boolean 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return CompensatoryPart
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     * @return CompensatoryPart
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return integer 
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set minutes
     *
     * @param integer $minutes
     * @return CompensatoryPart
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer 
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set in_week
     *
     * @param boolean $inWeek
     * @return CompensatoryPart
     */
    public function setInWeek($inWeek)
    {
        $this->in_week = $inWeek;

        return $this;
    }

    /**
     * Get in_week
     *
     * @return boolean 
     */
    public function getInWeek()
    {
        return $this->in_week;
    }

    /**
     * Set compensatory
     *
     * @param \Medicina\InasistenciasBundle\Entity\Compensatory $compensatory
     * @return CompensatoryPart
     */
    public function setCompensatory(\Medicina\InasistenciasBundle\Entity\Compensatory $compensatory = null)
    {
        $this->compensatory = $compensatory;

        return $this;
    }

    /**
     * Get compensatory
     *
     * @return \Medicina\InasistenciasBundle\Entity\Compensatory 
     */
    public function getCompensatory()
    {
        return $this->compensatory;
    }

    /**
     * Set compensatory
     *
     * @param \Medicina\InasistenciasBundle\Entity\Employee $employee
     * @return Employee
     */
    public function setEmployee(\Medicina\InasistenciasBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Medicina\InasistenciasBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    public function __toString(){
        return "Módulo de tiempo";
    }
}
