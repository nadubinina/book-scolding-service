<?php

namespace App\Models\Entities\DatabaseInformation;

class Publisher
{
    private $id = null;
    private $name = null;
    private $surname = null;
    private $image = '/views/img/publisher-cover.jpg';
    private $dateOfBirth = null;
    private $dateOfDeath = null;
    private $annotation = null;

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDateOfBirth($dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function setDateOfDeath($dateOfDeath): self
    {
        $this->dateOfDeath = $dateOfDeath;
        return $this;
    }

    public function setAnnotation($annotation): self
    {
        $this->annotation = $annotation;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): self
    {
        $this->surname = $surname;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function getDateOfDeath()
    {
        return $this->dateOfDeath;
    }

    public function getAnnotation()
    {
        return $this->annotation;
    }
}
