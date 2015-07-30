<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string")
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     * @Assert\NotBlank()
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string")
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string")
     * @Assert\NotBlank()
     */
    private $address;
    
    /**
     * @var string
     *
     * @ORM\Column(name="postal", type="string")
     */
    private $postal;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string")
     */
    private $website;

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
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="company") 
     */
    protected $payments;

    public function __construct()
    {
        $this->created = new \DateTime();
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
     * Set name
     *
     * @param string $name
     * @return Company
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
     * Set shortName
     *
     * @param string $shortName
     * @return Company
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Payment
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
     * @return Payment
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
     * Get phone
     *
     * @return string 
     */
    function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    function getFax()
    {
        return $this->fax;
    }

    /**
     * Get email
     *
     * @return string 
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Get address
     *
     * @return string 
     */
    function getAddress()
    {
        return $this->address;
    }

    /**
     * Get website
     *
     * @return string 
     */
    function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Company
     */
    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Company
     */
    function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Company
     */
    function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Company
     */
    function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Company
     */
    function setWebsite($website)
    {
        $this->website = $website;
    }
    
    /**
     * Get postal
     *
     * @return string 
     */
    function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set postal
     *
     * @param string $postal
     * @return Company
     */
    function setPostal($postal)
    {
        $this->postal = $postal;
    }



}
