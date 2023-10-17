<?php

namespace App\Controllers;

use App\Database;
use App\Exceptions\NotFoundException;
use App\Models\SqlQueries\AbstractTableQueries;

abstract class BaseController
{
    abstract public function render();
    public function redirect(string $urn)
    {
        $uri = "Location: /$urn";
        header($uri, true, 302);
    }

    public function setEntityId($id, $tableName): self
    {
        if ($id == null) {
            http_response_code(404);
            throw new NotFoundException();
        }

        $this->id = $id;
        return $this;
    }
}
