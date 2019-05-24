<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Parsers;

use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;
use Elrond\Translation\Utils\Templater\ValueObjects\TemplateObject;

class TemplateParser implements ParserInterface
{
    protected const FILTER_DELIMITER = '|';
    protected const NAME_PATTERN  = '/[a-zA-Z][\w]*/';

    /**
     * @param string $text
     * @return TemplateObject
     */
    public function parse(string $text): TemplateObject
    {
        $parts = explode(self::FILTER_DELIMITER, $text);

        $varName = array_shift($parts);

        $filters = [];
        foreach ($parts as $filterPattern) {
            preg_match(self::NAME_PATTERN, $filterPattern, $matches);

            $filterName = $matches[0] ?? null;


        }
    }

}