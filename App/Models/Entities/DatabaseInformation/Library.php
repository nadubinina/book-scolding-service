<?php

namespace App\Models\Entities\DatabaseInformation;

class Library
{
    private $id = null;
    private $name = null;
    private $address = null;
    private $image = '/views/img/library-cover.jpg';
    private $foundingDate = null;
    private $numberOfBook = null;

    public function setNumberOfBook($numberOfBook): self
    {
        $this->numberOfBook = $numberOfBook['all_books_in_library'];
        return $this;
    }

    public function getNumberOfBook()
    {
        return $this->numberOfBook;
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

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getFoundingDate()
    {
        return $this->foundingDate;
    }

    public function setFoundingDate($foundingDate): self
    {
        $this->foundingDate = $foundingDate;
        return $this;
    }
}
