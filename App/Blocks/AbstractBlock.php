<?php

namespace App\Blocks;

class AbstractBlock
{
    protected $dataBlock = null;
    protected ?string $pageLink = null;
    protected ?string $block = null;

    public function render()
    {
        require APP_ROOT . '/views/html/' . $this->block;
    }

    public function setPageLink(string $pageLink): self
    {
        $this->pageLink = $pageLink;
        return $this;
    }

    public function setBlockLink(string $blockLink): self
    {
        $this->block = $blockLink;
        return $this;
    }

    public function setData($dataList): self
    {
        $this->dataBlock = $dataList;
        return $this;
    }

    public function getDataBlock()
    {
        return $this->dataBlock;
    }

    public function getPageLink(): ?string
    {
        return $this->pageLink;
    }
}
