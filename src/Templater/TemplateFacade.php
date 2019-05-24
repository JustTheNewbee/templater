<?php
declare(strict_types=1);

namespace Elrond\Translation\Utils\Templater;

use Elrond\Translation\Utils\Domain\Contracts\FilterHandlerInterface;
use Elrond\Translation\Utils\Domain\Contracts\ParserInterface;

class TemplateFacade
{
    /**
     * @var ParserInterface
     */
    protected $parser;



    /**
     * @var array
     */
    protected $filterHandlers = [];

    /**
     * @param FilterHandlerInterface $filterHandler
     */
    public function addFilterHandler(FilterHandlerInterface $filterHandler): void
    {
        $this->filterHandlers[$filterHandler->getFilterName()] = $filterHandler;
    }
}