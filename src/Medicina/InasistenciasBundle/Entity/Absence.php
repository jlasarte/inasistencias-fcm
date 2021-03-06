<?php

namespace Medicina\InasistenciasBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="absence")
 * @ORM\Entity()
 */
class Absence {

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\Column(type="date", name="start", nullable=false)
     */
    protected $start;

    /**
     * @ORM\Column(type="date", name="end", nullable=false)
     */
    protected $end;

    /**
     * @ORM\Column(type="boolean", name="with_pay", nullable=false)
     */
    protected $with_pay = true;

    /**
    * @ORM\Column(type="string", nullable=true)
     */
    protected $remarks;

    /**
    * @ORM\ManyToOne(targetEntity="Employee", inversedBy="absences")
    * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
    */
    protected $employee;
    
    /**
    * @ORM\OneToMany(targetEntity="Compensatory", mappedBy="absence")
    */
    protected $compensatories;

    /**
    * @ORM\ManyToOne(targetEntity="AbsenceType", inversedBy="absences")
    * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
    */
    protected $type;

    /**
    * @ORM\ManyToOne(targetEntity="AbsenceState", inversedBy="absences")
    * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
    */
    protected $state;

   

    public function __toString() {
        return  "Ausencia";
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
     * Set start
     *
     * @param \DateTime $start
     * @return Absence
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Absence
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set note
     *
     * @param boolean $note
     * @return Absence
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
     * Set employee
     *
     * @param \Medicina\InasistenciasBundle\Entity\Employee $employee
     * @return Absence
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

    /**
     * Set compensatory
     *
     * @param \Medicina\InasistenciasBundle\Entity\Compensatory $compensatory
     * @return Absence
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
     * Set type
     *
     * @param \Medicina\InasistenciasBundle\Entity\AbsenceType $type
     * @return Absence
     */
    public function setType(\Medicina\InasistenciasBundle\Entity\AbsenceType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Medicina\InasistenciasBundle\Entity\AbsenceType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set state
     *
     * @param \Medicina\InasistenciasBundle\Entity\AbsenceState $state
     * @return Absence
     */
    public function setState(\Medicina\InasistenciasBundle\Entity\AbsenceState $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \Medicina\InasistenciasBundle\Entity\AbsenceState 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set with_pay
     *
     * @param boolean $withPay
     * @return Absence
     */
    public function setWithPay($withPay)
    {
        $this->with_pay = $withPay;

        return $this;
    }

    /**
     * Get with_pay
     *
     * @return boolean 
     */
    public function getWithPay()
    {
        return $this->with_pay;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->compensatories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add compensatories
     *
     * @param \Medicina\InasistenciasBundle\Entity\Compensatory $compensatories
     * @return Absence
     */
    public function addCompensatory(\Medicina\InasistenciasBundle\Entity\Compensatory $compensatories)
    {
        $this->compensatories[] = $compensatories;

        return $this;
    }

    /**
     * Remove compensatories
     *
     * @param \Medicina\InasistenciasBundle\Entity\Compensatory $compensatories
     */
    public function removeCompensatory(\Medicina\InasistenciasBundle\Entity\Compensatory $compensatories)
    {
        $this->compensatories->removeElement($compensatories);
    }

    /**
     * Get compensatories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompensatories()
    {
        return $this->compensatories;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Absence
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    public function getStartandend()
    {
        $format = "Ausencia del %s al %s";
        return sprintf($format, $this->getStart()->format('m/d'), $this->getEnd()->format('m/d'));
    }

    public function isMedical() {
       return (($this->getType()->getName() == "Carpeta Médica"));
    }

    public function isCompensatory() {
        return (($this->getType()->getName() == "Compensatorio"));
    }
}
