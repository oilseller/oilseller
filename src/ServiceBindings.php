<?php

namespace Oilseller;

use OilSeller\Repository\DB\OilAppRepository;
use OilSeller\Repository\OilAppRepositoryInterface;

trait ServiceBindings
{
    public $serviceBindings = [
        // Repository services...
        OilAppRepositoryInterface::class => OilAppRepository::class,
    ];
}
