<?php
    $uri_param = '_uri';
    $params = ['lang' => 'en', 'supported_langs' => ['en' => 'English', 'fa' => 'Farsi']];
    if(isset($_REQUEST[$uri_param])) {
        $vars = array_values(array_filter(explode('/', $_REQUEST[$uri_param])));
        if(count($vars) && array_key_exists($vars[0], $params['supported_langs']))
            $params['lang'] = strtolower(array_shift($vars));
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title>Virahub - Coming Soon</title>
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
<script type="text/javascript">
$(function () { $('#defaultCountdown').countdown({until: new Date(2017, 2, 3)}); });
</script>
<style type="text/css">
    .breadcrumb.lang {background-color: transparent;}
    .breadcrumb.lang li a:hover{text-decoration: none}
    .breadcrumb.lang li.active a {border-bottom: 1px solid #e7e7e7; padding-bottom: 5px;}
</style>
</head>

<body>
    <!--WRAP-->
    <div id="wrap">
        <!--CONTAINER-->
        <div class="container">
            <div style='text-align: right'>
                <ul class="breadcrumb lang" style=''>
                    <?php foreach ($params['supported_langs'] as $lang => $value) {
                        echo '<li'.($params['lang'] == $lang ? ' class="active"' : '').'>';
                        echo "<a href='/$lang'>$value</a>";
                        echo "</li>";
                    }?>
                </ul>
                </div>
            <img src="/images/logo.png" alt="Vira Logo" class="image-align" height="160" />
            <h1 style='line-height: 40px'>
                <brand style='font-variant: small-caps;'>Vira</brand><br />
                <span style='margin-bottom:-100px;font-family: "Dancing Script"'>
                    The smart Industry
                </span>
            </h1>
            <p>
                Our site is currently <strong>under construction</strong> but we are working hard<br/> to create a new and fresh design.
            </p>
            <div id="defaultCountdown"></div>
        </div>
        <!--/CONTAINER-->
    </div>
    <!--/WRAP-->
</body>
</html>