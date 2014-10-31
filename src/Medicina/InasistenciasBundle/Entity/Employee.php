<?php

namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employee")
 */
class Employee
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
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @ORM\ManyToOne(targetEntity="Office", inversedBy="employees")
     * @ORM\JoinColumn(name="office_id", referencedColumnName="id")
     */
    protected $office;

    /**
    * @ORM\ManyToOne(targetEntity="EmployeeType", inversedBy="employees")
    * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
    */
    protected $type;


    /**
     * @ORM\OneToMany(targetEntity="CompensatoryPart", mappedBy="employee")
     */
    protected $compensatory_parts;

    /**
    * @ORM\OneToMany(targetEntity="Compensatory", mappedBy="employee")
    */
    protected $compensatories;


    protected $fullname;


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
     * @return Employee
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
     * Set last_name
     *
     * @param string $lastName
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set positiom
     *
     * @param string $positiom
     * @return Employee
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get positiom
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function __toString() {
        return $this->getLastName() ? : "Empleado";
    }

    public function getFullname() {
        return $this->getName()." ".$this->getLastName();
    }

    /**
     * Set office
     *
     * @param \Medicina\InasistenciasBundle\Entity\Office $office
     * @return Employee
     */
    public function setOffice(\Medicina\InasistenciasBundle\Entity\Office $office = null)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get office
     *
     * @return \Medicina\InasistenciasBundle\Entity\Office 
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * Set office
     *
     * @param \Medicina\InasistenciasBundle\Entity\EmployeeType $type
     * @return Employee
     */
    public function setType(\Medicina\InasistenciasBundle\Entity\EmployeeType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Medicina\InasistenciasBundle\Entity\EmployeeType 
     */
    public function getType()
    {
        return $this->type;
    }

     /**
     * Add parts
     *
     * @param \Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts
     * @return Compensatory
     */
    public function addCompensatoryPart(\Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts)
    {
        $this->compensatory_parts[] = $parts;

        return $this;
    }

    /**
     * Remove parts
     *
     * @param \Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts
     */
    public function removeCompensatoryPart(\Medicina\InasistenciasBundle\Entity\CompensatoryPart $parts)
    {
        $this->compensatory_parts->removeElement($parts);
    }
}
