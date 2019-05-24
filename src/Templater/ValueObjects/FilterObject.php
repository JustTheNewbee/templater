<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\ValueObjects;

class FilterObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|null
     */
    protected $arguments;

    /**
     * FilterObject constructor.
     * @param string $name
     * @param array|null $arguments
     */
    public function __construct(string $name, ?array $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array|null
     */
    public function getArguments(): ?array
    {
        return $this->arguments;
    }
}