<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Domain\Contracts;

interface FilterHandlerInterface
{
    /**
     * @param array $args
     */
    public function setArgs(array $args): void;

    /**
     * @param $value
     * @return mixed
     */
    public function filter($value);

    /**
     * @return string
     */
    public function getFilterName(): string;
}