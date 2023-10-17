<?php

namespace App\Models\Entities\DatabaseInformation;

class Category
{
    private $id = null;
    private $name = null;
    private $parentId = null;
    private $image = '/views/img/category-cover.jpg';
    private $annotation = null;

    public function getAnnotation()
    {
        return $this->annotation;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getIdParrent()
    {
        return $this->parentId;
    }

    public function setIdParrent($parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }
}
