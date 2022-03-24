OpsDev.CacheBreaker
==================

This package provides a ViewHelper and a Fusion object that work like their original counterparts, but appending cache breaking segment based on the file's md5.

Installation
------------

Require the package via composer:

```
composer require "opsdev/cache-breaker"
```


Usage
-----

### Use as a Fluid ViewHelper

```
{namespace opsdev=OpsDev\CacheBreaker\ViewHelpers}
<link rel="stylesheet" href="{opsdev:resource(path: 'path/to/your/file.css', package: 'Vendor.YourPackageName')}" />
```

### Use as a Fusion object

```
stylesheets.index = T:Tag {
    tagName = 'link'
    attributes {
        href = OpsDev.CacheBreaker:ResourceUri {
            path = 'path/to/your/file.css'
            package = 'Vendor.YourPackageName'
        }
        type = 'text/css'
        rel = 'stylesheet'
    }
}
```

Credits
-------

The development of this package is partially sponsored by [CodeQ](http://codeq.at) web factory, [St Philaret Christian Orthodox Institute](http://psmb.github.io/) and [internezzo ag](https://www.internezzo.ch/).


Also the following persons have contributed to this package - thanks!
- Dimitri Pisarev
- Simon Schaufelberger
- Guang Ha
