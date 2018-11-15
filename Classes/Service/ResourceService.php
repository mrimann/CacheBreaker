<?php
namespace OpsDev\CacheBreaker\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\ResourceManagement\ResourceManager;

class ResourceService {
    /**
     * @Flow\Inject
     * @var ResourceManager
     */
    protected $resourceManager;

	/**
	 * Appends a shortened md5 of the file.
	 *
	 * @param string $path The location of the resource, can be either a path relative to the Public resource directory of the package or a resource://... URI
	 * @param string $package Target package key. If not set, the current package key will be used
	 * @return string
	 * @throws \Exception
	 */
    public function getResourceUri($path, $package = null)
    {
        if (strpos($path, 'resource://') === 0) {
            $matches = array();
            if (preg_match('#^resource://([^/]+)/Public/(.*)#', $path, $matches) === 1) {
                $package = $matches[1];
                $path = $matches[2];
            } else {
                throw new \Exception(sprintf('The path "%s" which was given to the ResourceViewHelper must point to a public resource.', $path), 1353512639);
            }
        }
        if ($package === null) {
            throw new \Exception('Package argument was not provided and it was not included in "path"', 1353512743);
        }
        $uri = $this->resourceManager->getPublicPackageResourceUri($package, $path);
        $hash = substr(md5_file('resource://' . $package . '/Public/' . $path), 0, 8);
        return $uri . '?' . $hash;
    }
}
