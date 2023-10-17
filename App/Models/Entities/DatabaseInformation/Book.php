<?php

namespace App\Models\Entities\DatabaseInformation;

class Book
{
    private $id = null;
    private $name = null;
    private $image = '/views/img/book-cover.jpg';
    private $countryId = null;
    private $publisherId = null;
    private $createdAt = null;
    private $price = null;
    private $categoryId = null;
    private $annotation = null;

    public function getAnnotation()
    {
        return $this->annotation;
    }

    public function setAnnotation($annotation): self
    {
        $this->annotation = $annotation;
        return  $this;
    }

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

    public function setCountryId($countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function setPublisherId($publisherId): self
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }

    public function setCategoryId($categoryId): self
    {
        $this->categoryId = $categoryId;
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

    public function getCountryId()
    {
        return $this->countryId;
    }

    public function getPublisherId()
    {
        return $this->publisherId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
