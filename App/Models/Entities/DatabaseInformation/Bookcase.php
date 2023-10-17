<?php

namespace App\Models\Entities\DatabaseInformation;

class Bookcase
{
    private $id = null;
    private $name = null;
    private $image = '/views/img/bookcase-cover.jpg';
    private $numberRows = null;
    private $libraryId = null;

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

    public function getImage()
    {
        return $this->image;
    }

    public function getNumberRows()
    {
        return $this->numberRows;
    }

    public function setNumberRows($numberRows): self
    {
        $this->numberRows = $numberRows;
        return $this;
    }

    public function getLibraryId()
    {
        return $this->libraryId;
    }

    public function setLibraryId($libraryId): self
    {
        $this->libraryId = $libraryId;
        return $this;
    }
}
