<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils;

use Elrond\Translation\Utils\Templater\Parsers\TemplateParser;
use Elrond\Translation\Utils\Templater\Parsers\TextParser;

class Runner
{
    public function run(): void
    {
        $textParser = new TextParser(new TemplateParser());


    }
}