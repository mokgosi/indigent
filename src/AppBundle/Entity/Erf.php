<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Erf
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ErfRepository")
 * @UniqueEntity("erfNo")
 * @ORM\HasLifecycleCallbacks()
 */
class Erf
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
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="integer", nullable=true)
     */
    private $ownerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="erf_type_id", type="integer")
     */
    private $erfTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="erf_no", type="string", length=10, unique=true)
     * @Assert\NotBlank()
     */
    private $erfNo;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="section_id", type="integer")
     */
    private $sectionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     */
    private $locationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", nullable=true)
     */
    private $code;

    /**
     * @var decimal
     *
     * @ORM\Column(name="previous_balance", type="decimal", precision=8, scale=2, options={"default":0})
     */
    private $previousBalance;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="balance", type="decimal", precision=8, scale=2, options={"default":0})
     */
    private $balance;

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
     * @ORM\ManyToOne(targetEntity="ErfType", inversedBy="erfs")
     * @ORM\JoinColumn(name="erf_type_id", referencedColumnName="id")
     */
    protected $erfType;

    /**
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="erfs")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    protected $owner;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="erfs")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\ManyToOne(targetEntity="Section", inversedBy="erfs")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    protected $section;

    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="erf")
     * @ORM\OrderBy({"updated" = "DESC"}) 
     */
    protected $payments;

    /**
     * @ORM\OneToMany(targetEntity="PaymentAllocation", mappedBy="erf") 
     */
    protected $allocations;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->payments = new ArrayCollection();
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

    function getOwnerId()
    {
        return $this->ownerId;
    }

    function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * Set erfTypeId
     *
     * @param integer $erfTypeId
     * @return Erf
     */
    public function setErfTypeId($erfTypeId)
    {
        $this->erfTypeId = $erfTypeId;

        return $this;
    }

    /**
     * Get erfTypeId
     *
     * @return integer 
     */
    public function getErfTypeId()
    {
        return $this->erfTypeId;
    }

    /**
     * Set erfNo
     *
     * @param string $erfNo
     * @return Erf
     */
    public function setErfNo($erfNo)
    {
        $this->erfNo = $erfNo;

        return $this;
    }

    /**
     * Get erfNo
     *
     * @return string 
     */
    public function getErfNo()
    {
        return $this->erfNo;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Erf
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set sectionId
     *
     * @param integer $sectionId
     * @return Erf
     */
    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;

        return $this;
    }

    /**
     * Get sectionId
     *
     * @return integer 
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return Erf
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Owner
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Erf
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
     * Set updated
     *
     * @param \DateTime $updated
     * @return Erf
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {

        $this->setUpdated(new \DateTime('now'));

        if ($this->getCreated() == null) {
            $this->setCreated(new \DateTime('now'));
        }
    }

    /**
     * Set category
     *
     * @param AppBundle\Entity\ErfType $erfType
     */
    public function setErfType(ErfType $erfType)
    {
        $this->erfType = $erfType;
    }

    /**
     * Get category
     *
     * @return AppBundle\Entity\ErfType 
     */
    public function getErfType()
    {
        return $this->erfType;
    }

    /**
     * Set location
     *
     * @param AppBundle\Entity\Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return AppBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set section
     *
     * @param AppBundle\Entity\Section $section
     */
    public function setSection(Section $section)
    {
        $this->section = $section;
    }

    /**
     * Get section
     *
     * @return AppBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set owner
     *
     * @param AppBundle\Entity\Owner $owner
     */
    public function setOwner(Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Get owner
     *
     * @return AppBundle\Entity\Owner 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Get balance
     *
     * @return decimal $balance
     */
    function getBalance()
    {
        return $this->balance;
    }
    
    /**
     * Set balance
     *
     * @param decimal $balance
     * @return Erf
     */
    function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * Set previousBalance
     *
     * @param decimal $previousBalance
     * @return Erf
     */
    function setPreviousBalance($previousBalance)
    {
        $this->previousBalance = $previousBalance;
    }
    
     /**
     * Get previousBalance
     *
     * @return decimal $balance
     */
    function getPreviosBalance()
    {
        return $this->previousBalance;
    }
    
    public function getPayments()
    {
        return $this->payments;
    }

}
