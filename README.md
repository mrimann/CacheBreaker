OpsDev.CacheBreaker
==================


Introduction
------------

Helper package for Flow and Neos installations where a cache-breaker is needed when delivering static assets:

Without this package, static assets referenced via Fluid's ResourceViewhelper would be linked in the HTML-Output like this:

````<link rel="stylesheet" href="https://wherever.tld/_Resources/Static/Packages/Packagekey/Path/filename.css">```

Under certain circumstances, one would want to add a cache-breaker addition to this URL, to make 100% sure the URL is changing, as soon as the referenced file changes - or in other words: to avoid having browsers to use an old, cached version of the file.

Result in the HTML output then looks like this:

````<link rel="stylesheet" href="https://wherever.tld/_Resources/Static/Packages/Packagekey/Path/filename.css?022c245a20fe">```


Installation
------------

Just add/require the package via composer:

```composer require "opsdev/cache-breaker" "*"```


Configuration
-------------

No configuration needed for the package itself.

Usage
-----

* Add the namespace declaration to your Fluid-Template

```{namespace opsdev=OpsDev\CacheBreaker\ViewHelpers}```

* Add the CacheBreaker where needed

Now find the spots in your Fluid template where you link to the static assets you'd like to "protect" from Caching and add add the following *after* the existing call to the Resource ViewHelper of Fluid:

```?{opsdev:resource(path: 'Path/to/your/file.extension', package: 'Vendor.YourPackageName')}```

(don't forget the "?" in front - or your resulting URL will most likely be broken)

* Test it in the Frontend

Now request a page where this template is being used and verify that the linked file has a "?xyz" addon in the URL, where "xyz" is a shortened md5 string consisting of characters and numbers.
