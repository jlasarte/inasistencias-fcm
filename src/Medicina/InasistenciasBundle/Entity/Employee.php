<?php
// src/Blogger/BlogBundle/Entity/Blog.php

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
    * @ORM\Column(type="string")
    */
    protected $positiom;

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
    public function setPositiom($positiom)
    {
        $this->positiom = $positiom;

        return $this;
    }

    /**
     * Get positiom
     *
     * @return string 
     */
    public function getPositiom()
    {
        return $this->positiom;
    }
}
