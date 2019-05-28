<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Interpreters;

use Elrond\Translation\Utils\Domain\Contracts\FilterHandlerInterface;

class TemplateContext
{
    /**
     * @var array
     */
    protected $replacements = [];

    /**
     * @var array
     */
    protected static $filterHandlers = [];

    /**
     * @param array $replacements
     */
    public function setReplacements(array $replacements): void
    {
        $this->replacements = $replacements;
    }

    /**
     * @param TemplateVariable $variable
     */
    public function replace(TemplateVariable $variable): void
    {
        if (array_key_exists($variable->getName(), $this->replacements)) {
            $variable->setValue($this->replacements[$variable->getName()]);
        }
    }

    /**
     * @param TemplateVariable $variable
     * @param Filter $filter
     * @throws \Exception
     */
    public function filter(TemplateVariable $variable, Filter $filter): void
    {
        if (!array_key_exists($filter->getName(), self::$filterHandlers)) {
            throw new \Exception(sprintf('There is no handler for \'%s\' filter.', $filter->getName()));
        }

        /** @var FilterHandlerInterface $handler */
        $handler = self::$filterHandlers[$filter->getName()];

        if (null !== $filter->getArguments()) {
            $handler->setArgs($filter->getArguments());
        }

        $variable->setValue($handler->filter($variable->getValue()));
    }

    /**
     * @param string $filterName
     * @param FilterHandlerInterface $filterHandler
     */
    public static function addFilterHandler(string $filterName, FilterHandlerInterface $filterHandler): void
    {
        self::$filterHandlers[$filterName] = $filterHandler;
    }
}