<?php

namespace Jh\Bundle\JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jh\Bundle\JobBundle\Entity\Suburb
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jh\Bundle\JobBundle\Entity\SuburbRepository")
 */
class Suburb
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;
    
    /**
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * @var integer $region_id
     *
     * @ORM\Column(name="region_id", type="integer")
     */
    private $region_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="suburbs")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set latitude
     *
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set region_id
     *
     * @param integer $regionId
     */
    public function setRegionId($regionId)
    {
        $this->region_id = $regionId;
    }

    /**
     * Get region_id
     *
     * @return integer 
     */
    public function getRegionId()
    {
        return $this->region_id;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set region
     *
     * @param Jh\Bundle\JobBundle\Entity\Region $region
     */
    public function setRegion(\Jh\Bundle\JobBundle\Entity\Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return Jh\Bundle\JobBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
}