<!DOCTYPE html>
<html lang="en">
    <head>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-framework/Frontside/Library/Backbone.min.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/rune-api/Client/API.js'); ?></script>
        <script><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/librarium/API/Map/Requests.js'); ?></script>
        <style><?php echo file_get_contents(ROOT_DIR . '/vendor/anton-moskalenko/librarium/Engine/Manager.css'); ?></style>
        <title>Nexus</title>
    </head>
    <body>
        <div id="header">

        </div>
        <div id="page">

        </div>
        <div id="footer">

        </div>
        <script>
            <?php if($_SERVER['REQUEST_URI'] === '/'): ?>
                API.Map.collection();
            <?php else: ?>
                API.Map.show('<?php echo $_SERVER['REQUEST_URI']; ?>');
            <?php endif; ?>
        </script>
    </body>
</html>