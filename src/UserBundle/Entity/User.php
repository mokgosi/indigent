<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your first name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The first name is too short.",
     *     maxMessage="The first name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $first_name;
    
     /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your last name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The last name is too short.",
     *     maxMessage="The last name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $last_name;
    
     /**
     * @ORM\Column(type="string", length=15)
     *
     * @Assert\Length(
     *     min=10,
     *     max="15",
     *     minMessage="Contact no. is too short.",
     *     maxMessage="Contact no. is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $mobile;
    
     /**
     * @ORM\Column(type="string", length=15)
     *
     * @Assert\Length(
     *     min=10,
     *     max="15",
     *     minMessage="Telephone no. is too short.",
     *     maxMessage="Telephone no. is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $telephone;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }
    
    function getMobile() {
        return $this->mobile;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
}