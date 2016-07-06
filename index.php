<?php
    $uri_param = '_uri';
    $params = [
        'lang' => 'fa',
        'supported_langs' => [
            'en' => ['English', 'ltr', 'en-US'],
            'fa' => ['Farsi', 'rtl', 'fa-IR']
        ],
        'locale' => 'fa-IR',
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
<html lang="<?= $params['lang'] ?>" dir='<?= $params['dir'] ?>'>
<head>
<meta charset="utf-8">

<title><?= get_trans('title') ?></title>

<meta name="author" content="<?= get_trans('site_author') ?>" />
<meta name="keywords" content="<?= get_trans('site_keywords') ?>" />
<meta name="description" content="<?= get_trans('site_description') ?>" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?= get_trans('title') ?>" />
<meta property="og:url" content="<?= "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>" />
<meta property="og:image" content="/images/logo.png" />
<meta property="og:description" content="<?= get_trans('site_description') ?>" />
<meta property="og:locale" content="<?= $params['locale'] ?>" />
<?php foreach ($params['supported_langs'] as $lang => $value): if($lang == $params['lang']) continue; ?>
<meta property="og:locale:alternate" content="<?= $value[2] ?>" />
<?php endforeach; ?>
<meta property="og:site_name" content="Virahub" />

<link rel="alternate" href="//virahub.net" hreflang="fa-IR" />
<?php foreach ($params['supported_langs'] as $lang => $value): ?>
<link rel="alternate" href="//virahub.net/<?= $lang ?>" hreflang="<?= $value[2] ?>" />
<?php endforeach; ?>

<link rel="shortcut icon" href="/favicon.ico" type="image/ico">

<!--CSS-->
<link href="/css/style.css" rel="stylesheet">
<link href="/css/bootstrap-light.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
<link href='//fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet'>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.1/jquery.fullPage.min.css">
<!--/CSS-->

<style type="text/css">
    .breadcrumb.lang {background-color: transparent; position: absolute; top: 0; right: 0;}
    .breadcrumb.lang li a:hover{text-decoration: none}
    .breadcrumb.lang li.active a {border-bottom: 1px solid #e7e7e7; padding-bottom: 5px; color: #444;}
    .section-header {line-height: 20px; text-align: center; border-top: 1px solid #aeaeae; padding-top: 10px; margin: 20px 40px 5px 40px; font-size: 34px; font-size: 3.4rem;}
    .section-header span {position: relative; padding: 0 30px; top: -26px; background: #ffffff; letter-spacing: -0.01em; line-height: 3.4rem;}
</style>
</head>

<body>
    <!--CONTAINER-->
    <div class="container-fluid">
    <div id="fullpage">
    		<div class="section">
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
		        <display-header style='line-height: 40px'>
		            <brand style='font-variant: small-caps;'><?= get_trans('company_name') ?></brand><br />
		            <small style='margin-bottom:-100px;font-family: "Dancing Script"'>
		                <?= get_trans('company_slogans') ?>
		            </small>
		        </display-header>
		        <p style='padding:20px 0 20px 0'>
		            <?= get_trans('under_construction_text') ?>
		        </p>
	        </div>
    		<div class="section fp-auto-height" style='padding-bottom: 10%;'>
	        	<display-header class="section-header" style="font-family: <?= $params['lang'] == 'fa' ? '"Arial"; font-size: 40px' : "Dancing Script" ?>; margin-bottom: 100px">
                    <span><?= get_trans('count_down_text') ?></span>
				</display-header>
        		<div id="defaultCountdown"></div>
	        </div>
	        <div class="section">
	        	<h1 class="section-header">
                    <span><?= get_trans('header_contact_us') ?></span>
				</h1>
	        	<p><strong><?= get_trans('contact_us') ?></strong></p>
	        </div>
    </div>
    </div>
    <!--/CONTAINER-->

<!--JS-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.1/vendors/jquery.easings.min.js"></script> -->
<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.1/vendors/scrolloverflow.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.1/jquery.fullPage.min.js" type="text/javascript"></script>
<script src="/js/jquery.plugin.js" type="text/javascript"></script>
<script src="/js/jquery.countdown.js" type="text/javascript"></script>
<script src="/js/jquery.countdown-<?= $params['lang'] ?>.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#defaultCountdown').countdown({until: new Date(2017, 2, 3)});
	    console.log($("#fullpage").fullpage)
	    $('#fullpage').fullpage({
        	anchors: ['intro', 'countdown', 'contactus'],
        	navigation: true,
        	navigationPosition: "<?= $params['lang'] == "fa" ? "left" : "right" ?>"
	    });
	});
</script>
</body>
</html>