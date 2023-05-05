<?php

namespace Liloi\Nexus\API\Map\Show;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Items\Manager as ItemsManager;
use Liloi\Nexus\Engine\Domain\Items\Statuses as ItemsStatuses;
use Liloi\Nexus\Engine\Domain\Atoms\Manager as AtomsManager;
use Judex\Assert;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Nexus\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $url = self::getParameter('url');
        $entity = ItemsManager::loadByURL($url);

        Assert::true($entity->getStatus() == ItemsStatuses::PUBLISHED);

        $atoms = AtomsManager::loadCollection($entity->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'items' => $atoms
        ]));

        return $response;
    }
}