<?php
    $target_launch_date = [2017, 6, 26];
    $uri_param = '_uri';
    $params = [
        'lang' => 'fa',
        'supported_langs' => [
            'en' => ['English', 'ltr', 'en-US'],
            'fa' => ['فارسی', 'rtl', 'fa-IR']
        ],
        'supported_views' => [
            'index', 'about'
        ],
        'locale' => 'fa-IR',
        'dir' => 'rtl',
        'view' => ["name" => "index", "args" => []]
    ];
    if(isset($_GET[$uri_param])) {
        $vars = array_values(array_filter(explode('/', $_GET[$uri_param])));
        if(count($vars)) {
            if(array_key_exists(strtolower($vars[0]), $params['supported_langs'])) {
                $lang = strtolower(array_shift($vars));
                $params['dir'] = $params['supported_langs'][$lang][1];
                $params['lang'] =  $lang;
            }
            if(in_array(strtolower($vars[0]), $params['supported_views'])) {
                $params['view']['name'] = strtolower(array_shift($vars));
                for($i = 0; $i < count($vars); ) $params['view']['args'][$vars[$i++]] = @$vars[$i++];
            }
        }
    }
    $_trans = parse_ini_file('conf/trans.ini', true);
    function get_trans($label) { global $_trans, $params; return @$_trans[$params['lang']][$label]; }
    set_include_path(get_include_path() . PATH_SEPARATOR . 'mvc');
?>
<?php require "layout/header.phtml" ?>
<?php require "views/".$params['view']['name'].".phtml" ?>
<?php require "layout/footer.phtml" ?>