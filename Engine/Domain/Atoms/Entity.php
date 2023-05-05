<?php

namespace Liloi\Nexus\Engine\Domain\Atoms;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getGlobal()
 * @method void setGlobal(string $value)
 *
 * @method string getLocal()
 * @method void setLocal(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_atom');
    }

    public function getKeyPrefix(): string
    {
        return '#' . str_pad($this->getField('key_atom'), 3, '0', STR_PAD_LEFT);
    }

    public function getKeyItem(): string
    {
        return $this->getField('key_item');
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function save(): void
    {
        Manager::save($this);
    }
}