<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Owner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OwnerRepository")
 * @UniqueEntity("socialSecurityNo")
 * @ORM\HasLifecycleCallbacks()
 */
class Owner
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
     * @ORM\Column(name="social_security_no", type="string", unique=true)
     * @Assert\NotBlank(message="Please provide a valid ID Number")
     * 
     */
    private $socialSecurityNo;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank(message="Please provide First Name")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\NotBlank(message="Please provide Last Name")
     */
    private $lastName;

    /**
     * @var gender
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=15, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     * @Assert\Email
     */
    private $email;

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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @ORM\OneToMany(targetEntity="Erf", mappedBy="owner") 
     */
    protected $erfs;
    
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set socialSecurityNo
     *
     * @param integer $socialSecurityNo
     * @return Owner
     */
    public function setSocialSecurityNo($socialSecurityNo)
    {
        $this->socialSecurityNo = $socialSecurityNo;

        return $this;
    }

    /**
     * Get socialSecurityNo
     *
     * @return string 
     */
    public function getSocialSecurityNo()
    {
        return $this->socialSecurityNo;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Owner
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Owner
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Owner
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Owner
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Owner
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Owner
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
    public function setSectionId($sectionId) {
        $this->sectionId = $sectionId;

        return $this;
    }

    /**
     * Get sectionId
     *
     * @return integer 
     */
    public function getSectionId() {
        return $this->sectionId;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return Erf
     */
    public function setLocationId($locationId) {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId() {
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
     * @return Owner
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
     * @return Owner
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
     * Get code
     *
     * @return string 
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Owner
     */
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Set location
     *
     * @param AppBundle\Entity\Location $location
     */
    public function setLocation(Location $location) {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return AppBundle\Entity\Location 
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set section
     *
     * @param AppBundle\Entity\Section $section
     */
    public function setSection(Section $section) {
        $this->section = $section;
    }

    /**
     * Get section
     *
     * @return AppBundle\Entity\Section 
     */
    public function getSection() {
        return $this->section;
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

}
