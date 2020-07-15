<?php

namespace OilSeller\Repository\DB;

use OilSeller\Oil\Oil;

class OilRepository
{
    protected $appID;

    public function __construct($appID)
    {
        $this->appID = $appID;
        $this->model = New Oil;
    }

    public function getContent(string $key): string
    {
        $ins = $this->model
            ->newQuery()
            ->where('app_id', $this->appID)
            ->where('key', $key)
            ->firstOrFail(['content']);
        return $ins->content;
    }
}
