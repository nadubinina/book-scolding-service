<?php

namespace App\Models\Entities\DatabaseInformation;

class BookCopy
{
    private $id = null;
    private $bookId = null;
    private $copyNumber = null;
    private $bookcaseId = null;
    private ?Book $book = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId): self
    {
        $this->bookId = $bookId;
        return $this;
    }

    public function getCopyNumber()
    {
        return $this->copyNumber;
    }

    public function setCopyNumber($copyNumber): self
    {
        $this->copyNumber = $copyNumber;
        return $this;
    }

    public function getBookcaseId()
    {
        return $this->bookcaseId;
    }

    public function setBookcaseId($bookcaseId): self
    {
        $this->bookcaseId = $bookcaseId;
        return $this;
    }

    public function setBook($book): self
    {
        $this->book = $book;
        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function getName()
    {
        return ($this->book->getName() . ' (' . $this->getCopyNumber() . ')') ;
    }

    public function getImage()
    {
        return $this->book->getImage();
    }
}
