<?php

/**
 * Description of JsCssHandler
 *
 * @author filippo bisconcin
 */
class Jscsshandler {

    private static $properties = array();
    private static $js_files = array();
    private static $css_files = array();
    private static $known = null;

    public function __construct() {
        $p = base_url('public');
        self::$known = [
            'jquery' => [
                '1.10.2' => ['js' => [$p . 'plugins/jquery/1.10.2/jquery.min.js']],
                '1.11.0' => ['js' => [$p . 'plugins/jquery/1.11.0/jquery.min.js']],
                '1.11.1' => ['js' => [$p . 'plugins/jquery/1.11.1/jquery.min.js']],
                '1.12.4' => ['js' => [$p . 'plugins/jquery/1.12.4/jquery.min.js']],
                '2.1.0' => ['js' => [$p . 'plugins/jquery/2.1.0/jquery.min.js']],
                '2.1.4' => ['js' => [$p . 'plugins/jquery/2.1.4/jquery.min.js']],
                '3.1.0' => ['js' => [$p . 'plugins/jquery/3.1.0/jquery.min.js']],
                '3.1.1' => ['js' => [$p . 'plugins/jquery/3.1.1/jquery.min.js']]
            ],
            'jquery_ui' => [
                '1.10.3' => [
                    'js' => [$p . 'plugins/jquery/ui/1.10.3/jquery-ui.custom.min.js'],
                    'css' => [$p . 'plugins/jquery/ui/1.10.3/jquery-ui.custom.min.css']
                ],
                '1.12.1' => [
                    'js' => [$p . 'plugins/jquery/ui/1.12.1/jquery-ui.min.js'],
                    'css' => [$p . 'plugins/jquery/ui/1.12.1/jquery-ui.min.css']
                ]
            ],
            'jquery_migrate' => [
                '1.2.1' => ['js' => [$p . 'plugins/jquery/migrate/jquery-migrate-1.2.1.min.js']],
                '1.4.1' => ['js' => [$p . 'plugins/jquery/migrate/jquery-migrate-1.4.1.min.js']]
            ],
            'font_awesome' => [
                '4.0.3' => ['css' => [$p . 'plugins/font_awesome/4.0.3/css/font-awesome.min.css', 'plugins/font_awesome/4.0.3/css/font-awesome-ie7.min.css']],
                '4.2.0' => ['css' => [$p . 'plugins/font_awesome/4.2.0/css/font-awesome.min.css']],
                '4.7.0' => ['css' => [$p . 'plugins/font_awesome/4.7.0/css/font-awesome.min.css']],
            ],
            'bootstrap' => [
                '3.1.1' => [
                    'require' => ['jquery' => '3.1.1', 'font_awesome' => '4.7.0'],
                    'js' => [$p . 'plugins/bootstrap/3.1.1/js/bootstrap.min.js']
                ],
                '3.2.0' => [
                    'require' => ['jquery' => '3.1.1', 'font_awesome' => '4.2.0'],
                    'js' => [$p . 'plugins/bootstrap/3.2.0/js/bootstrap.min.js'],
                    'css' => [
                        $p . 'plugins/bootstrap/3.2.0/css/bootstrap.min.css',
                        $p . 'plugins/bootstrap/3.2.0/css/bootstrap-theme.min.css'
                    ]
                ],
                '3.3.7' => [
                    'require' => ['font_awesome' => '4.2.0'],
                    'js' => [$p . 'plugins/bootstrap/3.3.7/js/bootstrap.min.js'],
                    'css' => [
                        $p . 'plugins/bootstrap/3.3.7/css/bootstrap.min.css',
                        $p . 'plugins/bootstrap/3.3.7/css/bootstrap-theme.min.css'
                    ]
                ],
                '4.0.0-alpha.6' => [
                    'require' => ['jquery' => '3.1.1', 'font_awesome' => '4.2.0'],
                    'js' => [$p . 'plugins/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'],
                    'css' => [$p . 'plugins/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css']
                ]
            ],
            'flexslider' => [
                '2.2.2' => [
                    'js' => [$p . 'plugins/flexslider/2.2.2/jquery.flexslider.min.js'],
                    'css' => [$p . 'plugins/flexslider/2.2.2/flexslider.min.css']
                ]
            ],
            'genius' => [
                '1.1.0_3' => [
                    'require' => ['jquery_migrate' => '1.2.1', 'jquery_ui' => '1.12.1', 'bootstrap' => '3.3.7', 'font_awesome' => '4.0.3', 'gritter' => '1.7.4'],
                    'js' => [
                        $p . 'genius/1.1.0_3/js/jquery.sparkline.min.js',
                        $p . 'genius/1.1.0_3/js/custom.min.js',
                        $p . 'genius/1.1.0_3/js/core.min.js'
                    ],
                    'css' => [
                        'http://fonts.googleapis.com/css?family=Lato:300',
                        'http://fonts.googleapis.com/css?family=Lato:400',
                        'http://fonts.googleapis.com/css?family=Kaushan+Script',
                        $p . 'genius/1.1.0_3/css/style.css',
                        $p . 'genius/1.1.0_3/css/retina.min.css'
                    ]
                ],
                '2.0.1_4' => [
                    'require' => ['bootstrap' => '4.0.0-alpha.6'],
                    'js' => [$p . 'genius/2.0.1_4/js/'],
                    'css' => [
                        $p . 'genius/2.0.1_4/css',
                        $p . 'genius/2.0.1_4/css'
                    ]
                ]
            ],
            'andia' => [
                '1.0.0' => [
                    'require' => ['bootstrap' => '3.3.7', 'flexslider' => '2.2.2'],
                    'js' => [
                        $p . 'andia/1.0.0/js/bootstrap-hover-dropdown.min.js',
                        $p . 'andia/1.0.0/js/jquery.backstretch.min.js',
                        $p . 'andia/1.0.0/js/wow.min.js',
                        $p . 'andia/1.0.0/js/retina-1.1.0.min.js',
                        $p . 'andia/1.0.0/js/jquery.magnific-popup.min.js',
                        $p . 'andia/1.0.0/js/jflickrfeed.min.js',
                        $p . 'andia/1.0.0/js/masonry.pkgd.min.js',
                        $p . 'andia/1.0.0/js/jquery.ui.map.min.js'
                    ],
                    'css' => [
                        'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400',
                        'http://fonts.googleapis.com/css?family=Droid+Sans',
                        'http://fonts.googleapis.com/css?family=Lobster',
                        $p . 'andia/1.0.0/css/animate.css',
                        $p . 'andia/1.0.0/css/magnific-popup.css',
                        $p . 'andia/1.0.0/css/form-elements.css',
                        $p . 'andia/1.0.0/css/style.min.css',
                        $p . 'andia/1.0.0/css/media-queries.css'
                    ]
                ]
            ],
            'analytics' => [
                '0' => [
                    'js' => [
                        $p . 'analytics/0/analytics.min.js'
                    ]
                ]
            ],
            'gridstack' => [
                '0.3.0' => [
                    'require' => ['lodash' => '3.5.0'],
                    'js' => [
                        $p . 'plugins/gridstack/0.3.0/js/gridstack.js',
                        $p . 'plugins/gridstack/0.3.0/js/gridstack.jQueryUI.js'
                    ],
                    'css' => [
                        $p . 'plugins/gridstack/0.3.0/css/gridstack.css',
                        $p . 'plugins/gridstack/0.3.0/css/gridstack-extra.css'
                    ]
                ]
            ],
            'lodash' => [
                '3.5.0' => [
                    'js' => [
                        $p . 'plugins/lodash/3.5.0/js/lodash.min.js'
                    ]
                ]
            ],
            'bootbox' => ['4.3.0' => ['js' => [$p . 'plugins/bootbox/4.3.0/bootbox.min.js']]],
            'gritter' => [
                '0' => [
                    'js' => [$p . 'plugins/gritter/0/jquery.gritter.min.js'],
                    'css' => [$p . 'plugins/gritter/0/jquery.gritter.min.css']
                ],
                '1.7.4' => [
                    'js' => [$p . 'plugins/gritter/1.7.4/js/jquery.gritter.min.js'],
                    'css' => [$p . 'plugins/gritter/1.7.4/css/jquery.gritter.css']
                ],
            ],
            'nestable' => [
                '0' => ['js' => [$p . 'plugins/nestable/0/jquery.nestable.min.js'],]
            ],
            'elfinder' => [
                '2.0' => [
                    'css' => [
                        $p . 'plugins/elfinder/2.0/elfinder.min.css',
                        $p . 'plugins/elfinder/2.0/elfinder.theme.css'],
                    'js' => [$p . 'plugins/elfinder/2.0/jquery.elfinder.min.js']
                ]
            ]
        ];

        self::setJsProperty('site_url', site_url());
        self::setJsProperty('base_url', base_url());
        self::setJsProperty('public_url', $p);
    }

    public static function includeKnown(string $name, string $version = null) {
        if (array_key_exists($name, self::$known)) {
            $item = null;
            if (is_null($version)) {
                $item = end(self::$known[$name]);
                if (!$item) {
                    DIE("CANNOT LOAD $name.");
                }
            } else {
                if (array_key_exists($version, self::$known[$name])) {
                    $item = & self::$known[$name][$version];
                } else {
                    DIE("CANNOT LOAD $name - $version.");
                }
            }

            if (array_key_exists('require', $item)) {
                foreach ($item['require'] as $file => $_version) {
                    self::includeKnown($file, $_version);
                }
            }

            if (array_key_exists('js', $item)) {
                foreach ($item['js'] as $file) {
                    self::addJsFile($file);
                }
            }

            if (array_key_exists('css', $item)) {
                foreach ($item['css'] as $file) {
                    self::addCssFile($file);
                }
            }
        } else {
            DIE("CANNOT LOAD $name.");
        }
    }

    public static function setJsProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    public static function myformat($data) {
        if (is_array($data)) {
            $out = "[";
            foreach ($data as $key => $val) {
                $out .= self::myformat($val) . ",";
            }
            return $out . "]";
        } elseif (is_object($data)) {
            $out = "{";
            foreach ($data as $key => $val) {
                $out .= "'$key':" . self::myformat($val) . ",";
            }
            return $out . "}";
        } elseif (is_numeric($data)) {
            return $data;
        } else {
            return "'$data'";
        }
    }

    public static function addJsFile($path, $params = null) {
        self::$js_files[] = array('url' => $path, 'params' => $params);
    }

    public static function addCssFile($path, $params = array('rel' => 'stylesheet')) {
        self::$css_files[] = array('url' => $path, 'params' => $params);
    }

    public static function out_js_properties() {
        echo '<script>';
        foreach (self::$properties as $key => $value) {
            echo 'var __' . $key . ' = ' . self::myformat($value) . '; ';
        }
        echo '</script>' . PHP_EOL;
    }

    public static function out_js_files() {
        foreach (self::$js_files as $file) {
            echo '<script src="' . $file['url'] . '"';
            if (!is_null($file['params'])) {
                foreach ($file['params'] as $key => $value) {
                    echo ' ' . $key . (!is_null($value) ? '="' . $value . '"' : '');
                }
            }
            echo '></script>' . PHP_EOL;
        }
    }

    public static function out_css_files() {
        foreach (self::$css_files as $file) {
            echo '<link href="' . $file['url'] . '"';
            if (!is_null($file['params'])) {
                foreach ($file['params'] as $key => $value) {
                    echo ' ' . $key . (!is_null($value) ? '="' . $value . '"' : '');
                }
            }
            echo '>' . PHP_EOL;
        }
    }

}
