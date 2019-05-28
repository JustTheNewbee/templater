<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater\Parsers;

use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;

class PluralMaskParser implements ParserInterface
{
    protected const SELECTOR_DELIMITER = '|';

    public function parse(string $pluralMask): array
    {
        $rawSelectors = explode(self::SELECTOR_DELIMITER, $pluralMask);

        // TODO
    }

}