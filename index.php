<?php
include_once './Jscsshandler.php';

Jscsshandler::includeKnown('bootstrap');
Jscsshandler::includeKnown('foo');

Jscsshandler::setJsProperty('product_id', rand(1, 10));
?>

<html>
    <head>

        <title>Demo Jscsshandler</title>

        <?php
        //css files
        Jscsshandler::out_css_files();
        ?>

        <?php
        //properties
        Jscsshandler::out_js_properties();
        ?>
    </head>
    <body>

        <?php
        //js files
        Jscsshandler::out_js_files();
        ?>
    </body>
</html>