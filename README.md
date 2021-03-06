# Feed Reader
A simple feed reader
## Installation
```bash
$ composer require mehedimi/feed-reader
```
## Basic Uses:

```php
<?php
    $feed = new \Mehedi\Feed();
    // Reading RSS Feed
    $rss = $feed->rss('http://your-url.com/rss')
                ->read();
   
    echo $rss->getTitle(); // Get the channel title

    // Access channel extra field
    echo $rss->channel()->extra;
    
    foreach ($rss->items() as $item) {
        echo $item->title; // Get the item title
        // Accessing attribute
        echo $item->title->attributes()->attributeName;
    }

    // Reading Atom Feed

    $atom = $feed->atom('http://your-url.com/atom')
                 ->read();
    
    echo $atom->getTitle(); // Title
    echo $atom->getUpdated()->format('d F, Y'); // Last Updated Date

    // Access channel extra field
    echo $atom->feed()->extra;

    foreach ($atom->entries() as $entry) {
        echo $entry->title; // Get the item title
        // Accessing attribute
        echo $entry->title->attributes()->attributeName;
    }
```

## Authentication

If your feed resource are protected by HTTP Basic Auth then you can use `basicAuth` 
```php
<?php

$feed = new \Mehedi\Feed();

$feed->rss('url')
     ->basicAuth('username', 'password')
     ->read();
// OR
$feed->atom('url')
     ->basicAuth('username', 'password')
     ->read();
```

## With Laravel

```php
<?php
    // Just use Feed Facade
    $rss = \Mehedi\Facades\Feed::rss('url')->read();
  
```