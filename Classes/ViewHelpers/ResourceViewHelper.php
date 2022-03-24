<?php
namespace OpsDev\CacheBreaker\ViewHelpers;

/*
 * This file is part of the OpsDev.CacheBreaker package.
 *
 * (c) 2016 Mario Rimann <mario@rimann.org>
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use Neos\FluidAdaptor\Core\ViewHelper\Exception\InvalidVariableException;
use Neos\Flow\ResourceManagement\ResourceManager;
use OpsDev\CacheBreaker\Service\ResourceService;

/**
 * Returns a shortened md5 of the built JavaScript file
 */
class ResourceViewHelper extends AbstractViewHelper
{
    /**
     * @Flow\Inject
     * @var ResourceManager
     */
    protected $resourceManager;

    /**
     * @Flow\Inject
     * @var ResourceService
     */
    protected $resourceService;

    public function initializeArguments()
    {
        $this->registerArgument('path', 'string', 'Relative path');
        $this->registerArgument('package', 'string', 'Name of the package');
    }

    /**
     * Returns a shortened md5 of the file (built version).
     *
     * @return string
     * @throws InvalidVariableException
     * @throws \Exception
     */
    public function render(): string
    {
        $path = $this->arguments['path'];
        $package = $this->arguments['package'];
        if ($path === null) {
            throw new InvalidVariableException('Missing "path" argument.', 1353512742);
        }
        if ($package === null) {
            $package = $this->controllerContext->getRequest()->getControllerPackageKey();
        }
        return $this->resourceService->getResourceUri($path, $package);
    }
}
