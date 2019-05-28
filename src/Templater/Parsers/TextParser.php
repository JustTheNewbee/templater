<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Parsers;

use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;

class TextParser implements ParserInterface
{
    protected const TEMPLATE_PATTERN = '/\{{2}(.*?)\}{2}/';

    /**
     * @var ParserInterface
     */
    protected $templateParser;

    /**
     * TextParser constructor.
     * @param ParserInterface $templateParser
     */
    public function __construct(
        ParserInterface $templateParser
    ) {
        $this->templateParser = $templateParser;
    }

    /**
     * @param string $rawText
     * @return array
     */
    public function parse(string $rawText): array
    {
        preg_match_all(self::TEMPLATE_PATTERN, $rawText, $matches);

        $templates = array_combine($matches[0], array_map(static function (string $template) {
            return $this->templateParser->parse(trim($template));
        }, $matches[1]));

        return $templates;
    }
}