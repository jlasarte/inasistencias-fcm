<?php

namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="compensatory")
 */
class Compensatory {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * @ORM\OneToMany(targetEntity="CompensatoryPart", mappedBy="compensatory")
	 */
	protected $parts;

	/**
	 * @ORM\Column(type="date", name="created", nullable=false)
	 */
	protected $created;
	
	/**
	 * @ORM\Column(type="date", name="used")
	 */
	protected $used;

	/**
    * @ORM\ManyToOne(targetEntity="Employee", inversedBy="compensatories")
    * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
    */
	protected $employee;
	
		
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set created
     *
     * @param \DateTime $created
     * @return Compensatory
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set used
     *
     * @param \DateTime $used
     * @return Compensatory
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used
     *
     * @return \DateTime 
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Add parts
     *
     * @param \Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts
     * @return Compensatory
     */
    public function addPart(\Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts)
    {
        $this->parts[] = $parts;

        return $this;
    }

    /**
     * Remove parts
     *
     * @param \Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts
     */
    public function removePart(\Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts)
    {
        $this->parts->removeElement($parts);
    }

    /**
     * Get parts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Set employee
     *
     * @param \Medicina\InasistenciasBundle\Entity\Employee $employee
     * @return Compensatory
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
}
