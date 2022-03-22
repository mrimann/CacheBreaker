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

	/**
	 * Returns a shortened md5 of the file (built version).
	 *
	 * @param null|string $path The location of the resource, can be either a path relative to the Public resource directory of the package or a resource://... URI
	 * @param null|string $package Target package key. If not set, the current package key will be used
	 * @return string
	 * @throws InvalidVariableException
	 * @throws \Exception
	 */
    public function render(string $path = null, string $package = null): string
    {
        if ($path === null) {
            throw new InvalidVariableException('Missing "path" argument.', 1353512742);
        }
        if ($package === null) {
            $package = $this->controllerContext->getRequest()->getControllerPackageKey();
        }
        return $this->resourceService->getResourceUri($path, $package);
    }
}
