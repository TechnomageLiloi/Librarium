<?php

namespace Liloi\Nexus\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    static ?Manager $manager = null;

    public static function collect(): void
    {
        $manager = new Manager();

        // @todo: add automatic API method collect.
         $manager->add(new Method('Holocron.Map.Collection', '\Liloi\Nexus\API\Map\Collection\Method::execute'));
         $manager->add(new Method('Holocron.Map.Show', '\Liloi\Nexus\API\Map\Show\Method::execute'));

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->getResponse();
    }
}