<?php

namespace OilSeller\Repository;

interface OilRepositoryInterface
{
    public function getContent($key): string;

    public function create();

    public function update();
}
