<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater;

use Elrond\Translation\Utils\Domain\Contracts\FilterHandlerInterface;
use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;
use Elrond\Translation\Utils\Templater\Interpreters\TemplateContext;
use Elrond\Translation\Utils\Templater\Interpreters\TemplateExpressionInterface;

class TemplateFacade
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * @var TemplateContext
     */
    protected $templateContext;

    /**
     * TemplateFacade constructor.
     * @param ParserInterface $parser
     * @param TemplateContext $templateContext
     */
    public function __construct(
        ParserInterface $parser,
        TemplateContext $templateContext
    ) {
        $this->parser = $parser;
        $this->templateContext = $templateContext;
    }

    /**
     * @param string $rawText
     * @param array $replacements
     * @return string
     */
    public function replaceTemplates(string $rawText, array $replacements): string
    {
        $this->templateContext->setReplacements($replacements);

        $templates = $this->parser->parse($rawText);

        array_walk($templates, static function (TemplateExpressionInterface &$expression) {
            $expression = $expression->interpret($this->templateContext);
        });

        return strtr($rawText, $templates);
    }
}