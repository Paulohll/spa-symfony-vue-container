<?php

namespace App\Entity;

use App\Repository\ViviendaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use DateTime;
use DateTimeInterface;
/**
 * @ORM\Entity(repositoryClass=ViviendaRepository::class)
 * @ORM\Table(name="viviendas")
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"type": "exact"})
 */
class Vivienda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotBlank()
     */
    private $shortdescription;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="integer",unique=true)
     * @Assert\NotBlank()
     */
    private $codereference;


    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $owner;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * @ORM\Column(type="string",length=1)
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private  $createdat;


    /******** METHODS ********/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortdescription(): ?string
    {
        return $this->shortdescription;
    }

    public function setShortdescription(string $shortdescription): self
    {
        $this->shortdescription = $shortdescription;  

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }  

    public function setDescription(string $description): self
    {
        $this->description = $description;  

        return $this;
    }

    public function getCodereference(): ?int
    {
        return $this->codereference;
    }

    public function setCodereference(int $codereference): self
    {
        $this->codereference = $codereference;  

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;  

        return $this;
    }

    public function gettype(): ?string
    {
        return $this->type;
    }

    public function settype(string $type): self
    {
        $this->type = $type;  

        return $this;
    }
    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;  

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;  

        return $this;
    }

    public function setCreatedat(?DateTime $timestamp): self
    {
        $this->createdat = $timestamp;
        return $this;
    }

    public function getCreatedat(): ?DateTime
    {
        return $this->createdat;
    }
    
    /**
     * Prepersist gets triggered on Insert
     * @ORM\PrePersist
     */
    public function setCreatedAtAutomatically()
    {
        if ($this->getCreatedat() === null) {
            $this->setCreatedat(new \DateTime());
        }
    }

    
}
