<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater;

class Replacer
{
    /**
     * @var array
     */
    protected $replacements = [];

    /**
     * @param array $replacements
     */
    public function setReplacements(array $replacements): void
    {
        $this->replacements = $replacements;
    }
}