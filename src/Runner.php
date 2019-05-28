<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils;

use Elrond\Translation\Utils\Templater\FilterHandlers\PluralFilterHandler;
use Elrond\Translation\Utils\Templater\Interpreters\TemplateContext;
use Elrond\Translation\Utils\Templater\Parsers\TemplateParser;
use Elrond\Translation\Utils\Templater\Parsers\TextParser;
use Elrond\Translation\Utils\Templater\TemplateFacade;

class Runner
{
    public function run(): void
    {
        $pliralFilterHandler = new PluralFilterHandler();
        TemplateContext::addFilterHandler('plural', new PluralFilterHandler());

        $textParser = new TextParser(new TemplateParser());
        $context = new TemplateContext();

        $facade = new TemplateFacade($textParser, $context);

        $facade->replaceTemplates(
            'Test for template engine {{ var1 }}, {{ var1}} and pluralization generator {{ var3 | plural (\'(0) No items | [2-3] items | {n % 10 === 0} other\')}}',
            [
                'var1' => 'var1',
                'var3' => 0
            ]
        );
    }
}