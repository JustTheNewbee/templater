<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\ValueObjects;

class TemplateObject
{
    /**
     * @var string
     */
    protected $varName;

    /**
     * @var array
     */
    protected $filters;

    /**
     * TemplateObject constructor.
     * @param string $varName
     * @param array $filters
     */
    public function __construct(string $varName, array $filters)
    {
        $this->varName = $varName;
        $this->filters = $filters;
    }

    /**
     * @return string
     */
    public function getVarName(): string
    {
        return $this->varName;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}