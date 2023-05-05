<?php

namespace Liloi\Nexus\Engine\Domain\Atoms;

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
        return self::getTablePrefix() . 'atoms';
    }

    public static function loadCollection(string $key_item): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_item="%s" order by key_atom desc;',
            $name, $key_item
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function create(string $key_item): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'key_item' => $key_item,
            'title' => 'Enter the title',
            'status' => Statuses::COMPOSE,
            'type' => Types::UNKNOWN,
            'global' => 'https://',
            'local' => '/',
            'data' => '{}',
        ]);
    }

    public static function load(string $key_atom): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_atom="%s";',
            $name, $key_atom
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_atom']);

        self::update($name, $data, sprintf('key_atom="%s"', $entity->getKey()));
    }
}