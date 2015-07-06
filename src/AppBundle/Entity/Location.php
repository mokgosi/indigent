<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LocationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Location {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="x_coord", type="string", length=15)
     */
    private $xCoord;

    /**
     * @var string
     *
     * @ORM\Column(name="y_coord", type="string", length=15)
     */
    private $yCoord;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Assert\DateTime()
     */
    private $updatedAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Location
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Location
     */
    public function setCode($code) {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set xCoord
     *
     * @param string $xCoord
     * @return Location
     */
    public function setXCoord($xCoord) {
        $this->xCoord = $xCoord;

        return $this;
    }

    /**
     * Get xCoord
     *
     * @return string 
     */
    public function getXCoord() {
        return $this->xCoord;
    }

    /**
     * Set yCoord
     *
     * @param string $yCoord
     * @return Location
     */
    public function setYCoord($yCoord) {
        $this->yCoord = $yCoord;

        return $this;
    }

    /**
     * Get yCoord
     *
     * @return string 
     */
    public function getYCoord() {
        return $this->yCoord;
    }

    /**
     * Set created
     *
     * @param \DateTime $createdAt
     * @return Location
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updatedAt
     * @return Location
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps() {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

}
