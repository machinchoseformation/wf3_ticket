<?php

namespace Wf3\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Wf3\TicketBundle\Entity\TicketRepository")
 */
class Ticket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="student", type="string", length=30)
     */
    private $student;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", length=1)
     */
    private $level;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateResolved", type="datetime", nullable=true)
     */
    private $dateResolved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isResolved", type="boolean")
     */
    private $isResolved;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;


    public function __construct(){
        $this->level = 2;
        $this->isResolved = false;
        $this->dateCreated = new \DateTime;
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
     * Set level
     *
     * @param string $level
     * @return Ticket
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Ticket
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateResolved
     *
     * @param \DateTime $dateResolved
     * @return Ticket
     */
    public function setDateResolved($dateResolved)
    {
        $this->dateResolved = $dateResolved;

        return $this;
    }

    /**
     * Get dateResolved
     *
     * @return \DateTime 
     */
    public function getDateResolved()
    {
        return $this->dateResolved;
    }

    /**
     * Set isResolved
     *
     * @param boolean $isResolved
     * @return Ticket
     */
    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    /**
     * Get isResolved
     *
     * @return boolean 
     */
    public function getIsResolved()
    {
        return $this->isResolved;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Ticket
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set student
     *
     * @param string $student
     * @return Ticket
     */
    public function setStudent($student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return string 
     */
    public function getStudent()
    {
        return $this->student;
    }
}
