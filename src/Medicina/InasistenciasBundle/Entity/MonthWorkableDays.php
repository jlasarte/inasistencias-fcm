<?php
namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="employee_type")
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
    * @ORM\ManyToOne(targetEntity="Month", inversedBy="employees")
    * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
    */
    protected $month;

	 /**
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="type")
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
     * @return EmployeeType
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
     * @return EmployeeType
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
        return $this->getName() ? : "Tipo de Empleado";
    }

}