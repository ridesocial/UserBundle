<?php
namespace RideSocial\Bundle\UserBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="RideSocial\Bundle\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends \FOS\UserBundle\Model\User
{
    /**
     * Id
     * @var integer
     */
    protected $id;

    /**
     * First name
     * @var string
     */
    protected $firstName;
    
    /**
     * Last name
     * @var string 
     */
    protected $lastName;
    
    /**
     * Gender
     * @var string
     */
    protected $gender;
    
    /**
     * Email
     * @var string
     */
    protected $email;
    
    /**
     * Birthdate
     * @var \DateTime
     */
    protected $birthdate;

    /**
     * Facebook id
     * @var string
     */
    protected $facebookId;

    /**
     * Google id
     * @var string 
     */
    protected $googleId;

    /**
     * Linkedin id
     * @var string
     */
    protected $linkedinId;

    /**
     * Twitter id
     * @var string
     */
    protected $twitterId;

    /**
     * Foursquare id
     * @var string
     */
    protected $foursquareId;

    /**
     * Avatar
     * @var string
     */
    protected $avatar = '/bundles/ridesocialuser/images/avatars/default.png';

    /**
     * Slug
     * @var string
     */
    protected $slug;
    
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
     * Get slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     */
    public function setSlug($slug = null)
    {
        if (null == $slug) {
            $this->slug = str_replace(
                ' ',
                '-',
                $this->getName()
            );
        }

        return $this;
    }

    public function getName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Get the full name of the user (first + last name)
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    /**
     * @param  string $facebookId
     * @return void
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
        $this->setUsername($facebookId);
        $this->salt = '';
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param Array
     */
    public function setFBData($fbdata)
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
            $this->addRole('ROLE_FACEBOOK');
        }
        if (isset($fbdata['first_name'])) {
            $this->setFirstName($fbdata['first_name']);
        }
        if (isset($fbdata['last_name'])) {
            $this->setLastName($fbdata['last_name']);
        }
        if (isset($fbdata['email'])) {
            $this->setEmail($fbdata['email']);
        }
    }

    /**
     * @param  string $firstname
     * @return User
     */
    public function setFirstName($firstname)
    {
        $this->firstName = $firstname;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set last_name
     *
     * @param  string $lastname
     * @return User
     */
    public function setLastName($lastname)
    {
        $this->lastName = $lastname;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Set username
     *
     * @param  string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set googleId
     *
     * @param  string $googleId
     * @return User
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;

        return $this;
    }

    /**
     * Get googleId
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * Set linkedinId
     *
     * @param  string $linkedinId
     * @return User
     */
    public function setLinkedinId($linkedinId)
    {
        $this->linkedinId = $linkedinId;

        return $this;
    }

    /**
     * Get linkedinId
     *
     * @return string
     */
    public function getLinkedinId()
    {
        return $this->linkedinId;
    }

    /**
     * Set twitterId
     *
     * @param  string $twitterId
     * @return User
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * Get twitterId
     *
     * @return string
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set foursquareId
     *
     * @param  string $foursquareId
     * @return User
     */
    public function setFoursquareId($foursquareId)
    {
        $this->foursquareId = $foursquareId;

        return $this;
    }

    /**
     * Get foursquareId
     *
     * @return string
     */
    public function getFoursquareId()
    {
        return $this->foursquareId;
    }

    /**
     * Set avatar
     *
     * @param  string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getUrl()
    {
        return $this->url;
    }
   
    /**
     * Set gender
     *
     * @param string $gender
     * @return User
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
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }
}
