<?php

namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="office")
 * @ORM\Entity()
 */
class Office {

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
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="office")
     */
    protected $employees;

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
     * @return Office
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

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    /**
     * Add employees
     *
     * @param \Medicina\InasistenciasBundle\Entity\Employee $employees
     * @return Office
     */
    public function addEmployee(\Medicina\InasistenciasBundle\Entity\Employee $employees)
    {
        $this->employees[] = $employees;

        return $this;
    }

    /**
     * Remove employees
     *
     * @param \Medicina\InasistenciasBundle\Entity\Employee $employees
     */
    public function removeEmployee(\Medicina\InasistenciasBundle\Entity\Employee $employees)
    {
        $this->employees->removeElement($employees);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    public function __toString() {
        return $this->getName() ? : "Oficina";
    }

}
