<?php

namespace App\Blocks;

use App\Blocks\AbstractBlock;

class HeadBlock extends AbstractBlock
{
    private $title = null;
    private $styles = null;
    protected ?string $block = 'head.phtml';

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function setStyles($styles): self
    {
        $this->styles = $styles;
        return $this;
    }
}
