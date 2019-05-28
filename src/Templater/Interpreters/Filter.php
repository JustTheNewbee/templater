<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Interpreters;

class Filter implements TemplateExpressionInterface
{

    /**
     * @var TemplateExpressionInterface
     */
    protected $templateVariable;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|null
     */
    protected $arguments;

    /**
     * @var Filter|null
     */
    protected $nextFilter;

    /**
     * Filter constructor.
     * @param TemplateExpressionInterface $templateVariable
     * @param string $name
     * @param array|null $arguments
     */
    public function __construct(
        TemplateExpressionInterface $templateVariable,
        string $name,
        ?array $arguments = null
    ) {
        $this->templateVariable = $templateVariable;
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

    /**
     * @return Filter|null
     */
    public function getNextFilter(): ?Filter
    {
        return $this->nextFilter;
    }

    /**
     * @param Filter|null $nextFilter
     */
    public function setNextFilter(?Filter $nextFilter): void
    {
        $this->nextFilter = $nextFilter;
    }

    /**
     * @param TemplateContext $context
     * @return mixed
     */
    public final function interpret(TemplateContext $context)
    {
        $this->doFiltration($context);

        if (null !== $this->nextFilter) {
            $this->nextFilter->doFiltration($context);
        }

        return $this->templateVariable->getValue();
    }

    protected function doFiltration(TemplateContext $context): void
    {
        $this->templateVariable->interpret($context);
        $context->filter($this->templateVariable, $this);
    }

    /**
     * @return TemplateExpressionInterface
     */
    public function getTemplateVariable(): TemplateExpressionInterface
    {
        return $this->templateVariable;
    }
}