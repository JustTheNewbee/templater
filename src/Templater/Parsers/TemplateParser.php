<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Parsers;

use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;
use Elrond\Translation\Utils\Templater\Interpreters\Filter;
use Elrond\Translation\Utils\Templater\Interpreters\TemplateExpressionInterface;
use Elrond\Translation\Utils\Templater\Interpreters\TemplateVariable;

class TemplateParser implements ParserInterface
{
    protected const VAR_NAME_PATTERN  = '/([a-zA-Z][\w]*)[\s]*\|?/';
    protected const FILTER_NAME_PATTERN = '/\|[\s]*([a-zA-Z][\w]*)/';
    protected const FILTER_ARGUMENT_PATTERN = '/".*?"|\'.*?\'/';

    /**
     * @param string $text
     * @return TemplateExpressionInterface
     * @throws \Exception
     */
    public function parse(string $text): TemplateExpressionInterface
    {
        preg_match(self::VAR_NAME_PATTERN, $text, $matches);
        $varName = $matches[1] ?? null;

        if (null === $varName) {
            throw new \Exception(sprintf('Template \'%s\' contains incorrect variable name.', $text));
        }

        $templateVariable = new TemplateVariable($varName);

        preg_match_all(self::FILTER_NAME_PATTERN, $text, $matches);

        $filterNames = $matches[1];
        $filterNamesCount = count($filterNames);

        $filters = [];
        for ($index = 0; $index < $filterNamesCount; $index++) {
            $name = $filterNames[$index];

            $start = strpos($text, $filterNames[$index]);
            $end = isset($filterNames[$index + 1]) ? strpos($text, $filterNames[$index + 1]) : strlen($text);
            $filterSubstring = substr($text, $start, $end - $start);

            preg_match_all(self::FILTER_ARGUMENT_PATTERN, $filterSubstring, $matches);

            $arguments = [];
            foreach (reset($matches) as $argument) {
                $arguments[] = substr($argument, 1, -1); // remove quotes
            }

            $filters[] = new Filter($templateVariable, $name, $arguments);
        }
        /** @var Filter $mainFilter */
        $mainFilter = $currentFilter = reset($filters);

        while (false !== ($nextFilter = next($filters))) {
            $currentFilter->setNextFilter($nextFilter);
            $currentFilter = $nextFilter;
        }

        return $mainFilter;
    }

}