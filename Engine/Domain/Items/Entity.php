<?php

namespace Liloi\Nexus\Engine\Domain\Items;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getCaption()
 * @method void setCaption(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getLink()
 * @method void setLink(string $value)
 *
 * @method string getTs()
 * @method void setTs(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_item');
    }

    public function getKeyPrefix(): string
    {
        return '#' . str_pad($this->getField('key_item'), 3, '0', STR_PAD_LEFT);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }
}