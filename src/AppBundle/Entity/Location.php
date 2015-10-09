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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="string", nullable=true)
     * 
     * @Assert\Regex(
     *     pattern="/\d/",
     *     message="Please enter correct code"
     * )
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="x_coord", type="string", length=15, nullable=true)
     */
    private $xCoord;

    /**
     * @var string
     *
     * @ORM\Column(name="y_coord", type="string", length=15, nullable=true)
     */
    private $yCoord;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     * @Assert\DateTime()
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     * @Assert\DateTime()
     */
    private $updated;
    
     /**
     * @ORM\OneToMany(targetEntity="Erf", mappedBy="location") 
     */
    protected $erfs;
    
     /**
     * @ORM\OneToMany(targetEntity="Section", mappedBy="location") 
     */
    protected $sections;

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
     * @param \DateTime $created
     * @return Location
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Location
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps() {
        $this->setUpdated(new \DateTime('now'));

        if ($this->getCreated() == null) {
            $this->setCreated(new \DateTime('now'));
        }
    }
    
    function __toString() {
        return $this->getName();
    }

}
