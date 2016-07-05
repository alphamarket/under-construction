<?php
    $uri_param = '_uri';
    $params = [
        'lang' => 'fa',
        'supported_langs' => [
            'en' => ['English', 'ltr'],
            'fa' => ['Farsi', 'rtl']
        ],
        'dir' => 'auto'
    ];
    if(isset($_GET[$uri_param])) {
        $vars = array_values(array_filter(explode('/', $_GET[$uri_param])));
        if(count($vars) && array_key_exists(strtolower($vars[0]), $params['supported_langs'])) {
            $lang = strtolower(array_shift($vars));
            $params['dir'] = $params['supported_langs'][$lang][1];
            $params['lang'] =  $lang;
        }

    }
    $_trans = parse_ini_file('conf/trans.ini', true);
    function get_trans($label) { global $_trans, $params; return @$_trans[$params['lang']][$label]; }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $params['lang'] ?>" xml:lang="<?= $params['lang'] ?>" dir='<?= $params['dir'] ?>'>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta name="author" content="<?= get_trans('site_author') ?>">
<meta name="keywords" content="<?= get_trans('site_keywords') ?>">
<meta name="description" content="<?= get_trans('site_description') ?>">

<link rel="alternate" href="//virahub.net" hreflang="en-US" />
<link rel="alternate" href="//virahub.net/en" hreflang="en-US" />
<link rel="alternate" href="//virahub.net/fa" hreflang="fa-IR" />


<title><?= get_trans('title') ?></title>
<link rel="shortcut icon" href="/favicon.ico" type="image/ico">

<!--CSS-->
<link href="/css/style.css" rel="stylesheet">
<link href="/css/bootstrap-light.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
<link href='//fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet" crossorigin="anonymous">
<!--/CSS-->

<!--JS-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.plugin.js" type="text/javascript"></script>
<script src="/js/jquery.countdown.js" type="text/javascript"></script>
<script src="/js/jquery.countdown-<?= $params['lang'] ?>.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () { $('#defaultCountdown').countdown({until: new Date(2017, 2, 3)}); });
</script>
<style type="text/css">
    .breadcrumb.lang {background-color: transparent;}
    .breadcrumb.lang li a:hover{text-decoration: none}
    .breadcrumb.lang li.active a {border-bottom: 1px solid #e7e7e7; padding-bottom: 5px; color: #444;}
</style>
</head>

<body>
    <!--CONTAINER-->
    <div class="container-fluid">
        <div style='text-align: right'>
            <ul class="breadcrumb lang" style=''>
                <?php foreach ($params['supported_langs'] as $lang => $value) {
                    echo '<li'.($params['lang'] == $lang ? ' class="active"' : '').'>';
                    echo "<a href='/$lang'>${value[0]}</a>";
                    echo "</li>";
                }?>
            </ul>
            </div>
        <div class="clear-fix" style='margin-top:50px;'></div>
        <img src="/images/logo.png" alt="Vira Logo" class="image-align" height="160"/>
        <h1 style='line-height: 40px'>
            <brand style='font-variant: small-caps;'><?= get_trans('company_name') ?></brand><br />
            <span style='margin-bottom:-100px;font-family: "Dancing Script"'>
                <?= get_trans('company_slogans') ?>
            </span>
        </h1>
        <p style='padding:20px 0 20px 0'>
            <?= get_trans('under_construction_text') ?><br />
            <strong><?= get_trans('contact_us') ?></strong>
        </p>
        <div id="defaultCountdown"></div>
    </div>
    <!--/CONTAINER-->
</body>
</html>