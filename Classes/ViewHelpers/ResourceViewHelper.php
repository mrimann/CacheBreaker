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

/**
 * Returns a shortened md5 of the built JavaScript file
 */
class ResourceViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @Flow\Inject
     * @var ResourceManager
     */
    protected $resourceManager;

    /**
     * Returns a shortened md5 of the file (built version).
     *
     * @param string $path The location of the resource, can be either a path relative to the Public resource directory of the package or a resource://... URI
     * @param string $package Target package key. If not set, the current package key will be used
     * @return string
     */
    public function render($path = null, $package = null)
    {
        if ($path === null) {
            throw new InvalidVariableException('Missing "path" argument.', 1353512742);
        }
        if ($package === null) {
            $package = $this->controllerContext->getRequest()->getControllerPackageKey();
        }
        if (strpos($path, 'resource://') === 0) {
            $matches = array();
            if (preg_match('#^resource://([^/]+)/Public/(.*)#', $path, $matches) === 1) {
                $package = $matches[1];
                $path = $matches[2];
            } else {
                throw new InvalidVariableException(sprintf('The path "%s" which was given to the ResourceViewHelper must point to a public resource.', $path), 1353512639);
            }
        }
        $uri = $this->resourceManager->getPublicPackageResourceUri($package, $path);
        $hash = substr(md5_file('resource://' . $package . '/Public/' . $path), 0, 8);
        return $uri . '?' . $hash;
    }
}
