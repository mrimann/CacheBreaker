OpsDev.CacheBreaker
==================

This ViewHelper works like `f:uri.resource` ViewHelper, but it appends cache breaking segment based on file's md5.

Installation
------------

Just add/require the package via composer:

```
composer require "opsdev/cache-breaker"
```


Usage
-----

### Add the namespace declaration to your Fluid-Template

```
{namespace opsdev=OpsDev\CacheBreaker\ViewHelpers}
```

### Use the resource ViewHelper to include resources with cache breaking hash

```
<link rel="stylesheet" href="{opsdev:resource(path: 'path/to/your/file.css', package: 'Vendor.YourPackageName')}" />
```

Credit
------

The development of this package is partially sponsored by [CodeQ](http://codeq.at) web factory.
