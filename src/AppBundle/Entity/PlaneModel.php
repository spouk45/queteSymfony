<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaneModel
 *
 * @ORM\Table(name="planeModel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaneModelRepository")
 */
class PlaneModel
{

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flight",mappedBy="plane")
     */
    private $planeModels;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=128)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=64)
     */
    private $manufacturer;

    /**
     * @var int
     *
     * @ORM\Column(name="cruiseSpeed", type="integer")
     */
    private $cruiseSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="planeNbSeats", type="integer")
     */
    private $planeNbSeats;

    /**
     * @var bool
     *
     * @ORM\Column(name="isAvailable", type="boolean")
     */
    private $isAvailable;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return PlaneModel
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     *
     * @return PlaneModel
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set cruiseSpeed
     *
     * @param integer $cruiseSpeed
     *
     * @return PlaneModel
     */
    public function setCruiseSpeed($cruiseSpeed)
    {
        $this->cruiseSpeed = $cruiseSpeed;

        return $this;
    }

    /**
     * Get cruiseSpeed
     *
     * @return int
     */
    public function getCruiseSpeed()
    {
        return $this->cruiseSpeed;
    }

    /**
     * Set planeNbSeats
     *
     * @param integer $planeNbSeats
     *
     * @return PlaneModel
     */
    public function setPlaneNbSeats($planeNbSeats)
    {
        $this->planeNbSeats = $planeNbSeats;

        return $this;
    }

    /**
     * Get planeNbSeats
     *
     * @return int
     */
    public function getPlaneNbSeats()
    {
        return $this->planeNbSeats;
    }

    /**
     * Set isAvailable
     *
     * @param boolean $isAvailable
     *
     * @return PlaneModel
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * Get isAvailable
     *
     * @return bool
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->planeModels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add planeModel
     *
     * @param \AppBundle\Entity\Flight $planeModel
     *
     * @return PlaneModel
     */
    public function addPlaneModel(\AppBundle\Entity\Flight $planeModel)
    {
        $this->planeModels[] = $planeModel;

        return $this;
    }

    /**
     * Remove planeModel
     *
     * @param \AppBundle\Entity\Flight $planeModel
     */
    public function removePlaneModel(\AppBundle\Entity\Flight $planeModel)
    {
        $this->planeModels->removeElement($planeModel);
    }

    /**
     * Get planeModels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaneModels()
    {
        return $this->planeModels;
    }
}
