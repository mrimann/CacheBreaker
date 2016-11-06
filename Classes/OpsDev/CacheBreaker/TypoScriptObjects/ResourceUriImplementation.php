<?php
namespace OpsDev\CacheBreaker\TypoScriptObjects;

/*
 * This file is part of the TYPO3.TypoScript package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\I18n\Service;
use TYPO3\Flow\Mvc\ActionRequest;
use TYPO3\Flow\Resource\Resource;
use TYPO3\Flow\Resource\ResourceManager;
use TYPO3\TypoScript\Exception as TypoScriptException;

/**
 * A TypoScript object to create resource URIs
 *
 * The following TS properties are evaluated:
 *  * path
 *  * package
 *  * resource
 *  * localize
 *
 * See respective getters for descriptions
 */
class ResourceUriImplementation extends AbstractTypoScriptObject
{

    /**
     * Returns the absolute URL of a resource
     *
     * @return string
     * @throws TypoScriptException
     */
    public function evaluate()
    {
        $resource = $this->getResource();
        
        return 'xyz';
    }
}
