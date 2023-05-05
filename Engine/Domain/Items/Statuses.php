<?php

namespace Liloi\Nexus\Engine\Domain\Items;

class Statuses
{
    public const COMPOSE = 1;
    public const ACTIVE = 2;
    public const PUBLISHED = 3;

    static public array $list = [
        self::COMPOSE => 'Compose',
        self::ACTIVE => 'Active',
        self::PUBLISHED => 'Published'
    ];
}