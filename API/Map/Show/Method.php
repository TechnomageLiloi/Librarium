<?php

namespace Liloi\Nexus\API\Map\Show;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Map\Manager as MapManager;
use Liloi\Nexus\Engine\Domain\Items\Manager as ItemsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Nexus\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $url = self::getParameter('url');
        $entity = MapManager::loadByURL($url);

        $items = ItemsManager::loadCollection($entity->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'items' => $items
        ]));

        return $response;
    }
}