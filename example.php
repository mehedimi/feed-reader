<?php

require './vendor/autoload.php';

$feed = new \Mehedi\Feed();

$rss = $feed->rss('https://wordpress.org/news/feed/')->read();
$atom = $feed->atom('https://wordpress.org/news/atom/')->read();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>RSS Feed</h2>
    <h1><a href="<?= $rss->getLink()?>"><?= "Title: {$rss->getTitle()}"?></a></h1>
    <p><?= $rss->getDescription()?></p>

    <ul>
        <?php foreach ($rss->items() as $item):?>
            <li>
                <h3>
                    <a href="<?= $item->link;?>"><?= $item->title;?></a>
                </h3>

                <p>Description: <?= $item->description;?></p>
            </li>
        <?php endforeach;?>
    </ul>

    <h2>Atom Feed</h2>
    <h1><a href="<?= $atom->getID()?>"><?= "Title: {$atom->getTitle()}"?></a></h1>
    <p>Last Update: <?= $atom->getUpdated()->format('d F, Y')?></p>

    <ul>
        <?php foreach ($atom->entries() as $entry):?>
            <li>
                <h3>
                    <a href="<?= $entry->link;?>"><?= $entry->title;?></a>
                </h3>

                <p>Summery: <?= $entry->summary;?></p>

                <p>Author: <?= $entry->author->name?></p>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>
