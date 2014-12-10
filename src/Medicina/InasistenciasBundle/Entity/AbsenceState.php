<?php
namespace Medicina\InasistenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="absence_state")
 */
class AbsenceState
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
     * @ORM\OneToMany(targetEntity="Absence", mappedBy="type")
     */
    protected $absences;

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
        $this->absences = new ArrayCollection();
    }

    /**
     * Add absences
     *
     * @param \Medicina\InasistenciasBundle\Entity\Absence $a
     * @return AbsenseState
     */
    public function addAbsence(\Medicina\InasistenciasBundle\Entity\Absence $a)
    {
        $this->absences[] = $a;

        return $this;
    }

    /**
     * Remove absences
     *
     * @param \Medicina\InasistenciasBundle\Entity\Absence $a
     */
    public function removeEmployee(\Medicina\InasistenciasBundle\Entity\Absence $a)
    {
        $this->absences->removeElement($a);
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
        return $this->getName() ? : "Tipo de Ausencia";
    }


    /**
     * Remove absences
     *
     * @param \Medicina\InasistenciasBundle\Entity\Absence $absences
     */
    public function removeAbsence(\Medicina\InasistenciasBundle\Entity\Absence $absences)
    {
        $this->absences->removeElement($absences);
    }

    /**
     * Get absences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbsences()
    {
        return $this->absences;
    }
}
