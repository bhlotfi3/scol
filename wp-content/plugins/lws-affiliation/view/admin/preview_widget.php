<?php

// Listing des bannières
$banners = unserialize(file_get_contents(__DIR__ . '/../../data/banners'));

?>
<html>

<head>
    <title>Preview Widget Affiliation LWS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <?php foreach ($banners['widget'] as $k => $type) : ?>
            <?php foreach ($type as $widget) : ?>
                <?php if ($widget['id'] == $_GET['id']) : ?>
                    <?php echo $widget['code_source'];
                    break; ?>
                <?php endif ?>
            <?php endforeach ?>
        <?php endforeach ?>

</body>

</html>