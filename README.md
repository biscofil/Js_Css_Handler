Include Js/Css from Php easily
------------------------------
This PHP library allows to easily link css/js files from your code. Use it in your MVC installation for a cleaner code.  

# Demo Page

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


----------


# addJsFile
Default:

    Jscsshandler::addJsFile('filename');
    //produces
    <script src="filename"></script>

Custom attributes:

    Jscsshandler::addJsFile('filename',array('attr_name' => 'attr_value'));
    //produces
    <script src="filename" attr_name="attr_value"></script>
    

# addCssFile
Default:

    Jscsshandler::addCssFile('filename');
    //produces
    <link href="filename">
    
Custom attributes:

    Jscsshandler::addCssFile('filename',array('attr_name' => 'attr_value'));
    //produces
    <link href="filename" attr_name="attr_value">
    


# includeKnown
Default:
(If no version parameter is passed then the library loads the last one)

    Jscsshandler::includeKnown('foo');

Custom version:

    Jscsshandler::includeKnown('foo','version');

You can add pre-configured plugins in the library code:


     $p = base_url('public'); //root folder
     self::$known = [
            'botstrap' => [
                '3.1.1' => [
                    'require' => ['jquery' => '3.1.1', 'font_awesome' => '4.7.0'],
                    'js' => [$p . 'plugins/bootstrap/3.1.1/js/bootstrap.min.js']
                ],
                '4.0.0-alpha.6' => [
                    'require' => ['jquery' => '3.1.1', 'font_awesome' => '4.2.0'],
                    'js' => [$p . 'plugins/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'],
                    'css' => [$p . 'plugins/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css']
                ]
             ]
           ]

# setJsProperty

    Jscsshandler::setJsProperty('property_name', 'value');
    //produces
    <script>
    var __property_name = "value";
    </script>





