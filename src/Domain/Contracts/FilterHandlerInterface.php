<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Domain\Contracts;

interface FilterHandlerInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function filter($value);

    /**
     * @param array$args
     * @return void
     */
    public function setArgs(array $args): void;
}