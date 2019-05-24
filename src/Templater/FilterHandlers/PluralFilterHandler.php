<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\FilterHandlers;

use Elrond\Translation\Utils\Domain\Contracts\FilterHandlerInterface;

class PluralFilterHandler implements FilterHandlerInterface
{
    public const FILTER_NAME = 'pluralize';

    /**
     * @var array
     */
    protected $args;

    /**
     * @param array $args
     */
    public function setArgs(array $args): void
    {
        $this->args = $args;
    }

    /**
     * @param $value
     * @return mixed|void
     */
    public function filter($value): string
    {
        // TODO: Implement filter() method.
    }

    /**
     * @return string
     */
    public function getFilterName(): string
    {
        return self::FILTER_NAME;
    }

}