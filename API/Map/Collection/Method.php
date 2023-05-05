<?php

namespace Liloi\Nexus\API\Map\Collection;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Items\Manager;
use Liloi\Nexus\Engine\Domain\Items\Statuses;
use Liloi\Nexus\Engine\Domain\Items\Types;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Nexus\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'statuses' => Statuses::$list,
            'types' => Types::$list
        ]));

        return $response;
    }
}