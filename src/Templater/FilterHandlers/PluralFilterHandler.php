<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\FilterHandlers;

use Elrond\Translation\Utils\Domain\Contracts\FilterHandlerInterface;
use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;

class PluralFilterHandler implements FilterHandlerInterface
{
    /**
     * @var string|null
     */
    protected $pluralMask;

    /**
     * @var ParserInterface
     */
    protected $maskParser;

    public function filter($value)
    {
        // TODO: Implement filter() method.
    }

    public function setArgs(array $args): void
    {
        $this->pluralMask = $args[0] ?? null;
    }

}