<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Interpreters;

interface TemplateExpressionInterface
{
    /**
     * @param TemplateContext $context
     * @return mixed
     */
    public function interpret(TemplateContext $context);
}