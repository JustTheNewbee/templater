<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Domain\Contracts;

interface ParserInterface
{
    /**
     * @param string $text
     * @return mixed
     */
    public function parse(string $text);
}