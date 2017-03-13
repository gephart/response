Gephart Routing
===

[![Build Status](https://travis-ci.org/gephart/response.svg?branch=master)](https://travis-ci.org/gephart/response)

Dependencies
---
 - PHP >= 7.0

Instalation
---

```bash
composer require gephart/response
```

Basic using
---

/index.php

```php
<?php

$content = "<body>Content</body>";

$respose = new \Gephart\Response\Response($content);
$respose->render();
```