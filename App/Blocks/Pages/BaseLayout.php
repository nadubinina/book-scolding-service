<?php

namespace App\Blocks\Pages;

use App\Models\Session;
use App\Models\SqlQueries\AbstractTableQueries;

class BaseLayout
{
    public function getEntity($entity)
    {
        $entitySplit = explode('_', $entity);
        $entityName = null;
        foreach ($entitySplit as $word) {
            $entityName .= ucfirst($word);
        }
        $entityName = lcfirst($entityName);

        $method = 'get' . ucfirst($entity) . 'Id';
        $this->{$entityName} = AbstractTableQueries::getTableRecord($this->{$method}(), $entity);
        return $this->{$entityName};
    }

    public function renderHeader()
    {
        include 'views/html/header.phtml';
        $this->renderSignHeader();
    }

    public function renderHead()
    {
        (new \App\Blocks\HeadBlock())
            ->setTitle($this->title)
            ->setStyles($this->styles)
            ->render();
    }

    public function renderSignHeader()
    {
        $isAuth = Session::isLogin();
        if ($isAuth) {
            include 'views/html/header-user-page.phtml';
        } else {
            include 'views/html/header-sign.phtml';
        }
    }
}
