<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Interpreters;

class TemplateVariable implements TemplateExpressionInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * TemplateVariable constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @param TemplateContext $context
     * @return mixed
     */
    public function interpret(TemplateContext $context)
    {
        if (null === $this->value) {
            $context->replace($this);
        }

        return $this->getValue();
    }


}