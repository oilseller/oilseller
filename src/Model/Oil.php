<?php

namespace OilSeller\Oil;

use Illuminate\Database\Eloquent\Model;

class OilAccessLog extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('oilseller.tables.oil_access_logs'));
    }
}
