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

use TYPO3\Flow\Annotations as Flow;

/**
 *
 * Returns a shortened md5 of the built JavaScript file
 */
class ResourceViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Returns a shortened md5 of the file (built version).
     *
     * @param string $path The location of the resource, can be either a path relative to the Public resource directory of the package or a resource://... URI
     * @param string $package Target package key. If not set, the current package key will be used
     * @return string
     */
    public function render($path = null, $package = null)
    {
        if (strpos($path, 'resource://') === 0) {
            return substr(md5_file($path), 0, 12);
        } else {
            return substr(md5_file('resource://' . $package . '/Public/' . $path), 0, 12);
        }
    }
}