<?php
namespace OpsDev\CacheBreaker\FusionObjects;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\ActionRequest;
use Neos\Flow\ResourceManagement\ResourceManager;
use Neos\Fusion\Exception as FusionException;
use Neos\Fusion\FusionObjects\AbstractFusionObject;
use OpsDev\CacheBreaker\Service\ResourceService;

/**
 * A Fusion object to create resource URIs for public resources with a cache breaking string
 *
 * The following TS properties are evaluated:
 *  * path
 *  * package
 *
 * See respective getters for descriptions
 */
class ResourceUriImplementation extends AbstractFusionObject
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
     * The location of the resource, can be either a path relative to the Public resource directory of the package or a resource://... URI
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->fusionValue('path');
    }

    /**
     * Target package key (only required for relative paths)
     *
     * @return string
     */
    public function getPackage(): string
    {
        return $this->fusionValue('package');
    }

	/**
	 * Returns the absolute URL of a resource with cache bursting string
	 *
	 * @return string
	 * @throws FusionException
	 * @throws \Exception
	 */
    public function evaluate(): string
    {
        $path = $this->getPath();
        if ($path === null) {
            throw new FusionException('"path" was not specified', 1386458763);
        }

        $package = $this->getPackage();
        if ($package === null) {
            $controllerContext = $this->runtime->getControllerContext();
            /** @var $actionRequest ActionRequest */
            $actionRequest = $controllerContext->getRequest();
            $package = $actionRequest->getControllerPackageKey();
        }

        return $this->resourceService->getResourceUri($path, $package);
    }
}
