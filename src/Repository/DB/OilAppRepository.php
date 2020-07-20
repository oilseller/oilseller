<?php

namespace OilSeller\Repository\DB;

use OilSeller\Repository\OilAppRepositoryInterface;

class OilAppRepository implements OilAppRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $modelClass = config('oilseller.models.oil_app');
        $this->model = new $modelClass;
    }

    public function getAll()
    {
        return $this->model->newQuery()->get();
    }
}
