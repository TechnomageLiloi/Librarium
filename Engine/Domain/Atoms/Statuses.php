<?php

namespace Liloi\Nexus\Engine\Domain\Atoms;

class Statuses
{
    public const COMPOSE = 1;
    public const ACTIVE = 2;
    public const PUBLISHED = 3;
    public const DEPRECATED = 4;
    public const ANCIENT = 5;

    static public array $list = [
        self::COMPOSE => 'Compose',
        self::ACTIVE => 'Active',
        self::PUBLISHED => 'Published',
        self::DEPRECATED => 'Deprecated',
        self::ANCIENT => 'Ancient',
    ];
}