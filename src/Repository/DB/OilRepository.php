<?php

namespace OilSeller\Repository\DB;

use OilSeller\Oil\Oil;

class OilRepository
{
    public function __construct()
    {
        $this->model = New Oil;
    }

    public function getContent($appID, $key): string
    {
        $ins = $this->model
            ->newQuery()
            ->where('app_id', $appID)
            ->where('key', $key)
            ->firstOrFail(['content']);
        return $ins->content;
    }
}
