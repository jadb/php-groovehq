# GrooveHQ SDK for PHP

Un-official PHP library to consume the GrooveHQ API.

```
$ composer require jadb/groovehq:dev-master
```

Example:

```php
<?php

require 'vendor/autoload.php';

$gh = new \GrooveHQ\Client('41529cf5de0f4daa10098ff4881521c0cfea8b127d8e11bc5cc2cadb974e9a72');

$tickets = $gh->tickets();
$customers = $gh->customers();

$response = $tickets->list(['state' => 'unread']);
$unread_tickets = $response['tickets'];

$response = $tickets->find(['ticket_number' => '1']);
$first_ticket = $response['ticket'];

$response = $tickets->state(['ticket_number' => '1']);
$first_ticket_state = $response['state'];

$response = $tickets->update(['ticket_number' => '1', 'state' => 'opened']);

$response = $customers->list();
$customers = $response['customers'];

...
```
