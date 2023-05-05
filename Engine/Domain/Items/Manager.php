<?php

namespace Liloi\Nexus\Engine\Domain\Items;

use Liloi\API\Errors\Exception;
use Liloi\Nexus\Engine\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'items';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by ts desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function create(string $url): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'caption' => 'Enter the caption',
            'summary' => '// enter summary',
            'program' => '// enter program',
            'status' => Statuses::COMPOSE,
            'type' => Types::FILE,
            'link' => $url,
            'ts' => gmdate('Y-m-d H:i:s'),
            'tags' => 'enter the tags',
            'data' => '{}'
        ]);
    }

    public static function load(string $key_item): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_item="%s";',
            $name, $key_item
        ));

        return Entity::create($row);
    }

    public static function loadByURL(string $URL): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where link="%s";',
            $name, $URL
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_item']);

        self::update($name, $data, sprintf('key_item="%s"', $entity->getKey()));
    }
}