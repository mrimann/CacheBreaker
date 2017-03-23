OpsDev.CacheBreaker
==================

This ViewHelper works like `f:uri.resource` ViewHelper, but it appends cache breaking segment based on file's md5.

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

Credit
------

The development of this package is partially sponsored by [CodeQ](http://codeq.at) web factory and [St Philaret Christian Orthodox Institute](http://psmb.github.io/).
