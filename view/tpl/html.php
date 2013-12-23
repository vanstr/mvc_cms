<!DOCTYPE html>
<html>
<head>
    <title>{$title}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Styles -->
    <link href="{$dirSRC}css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{$dirSRC}css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="{$dirSRC}css/bootstrap-overrides.css" rel="stylesheet"/>
    <link href="{$dirSRC}css/theme.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{$dirSRC}css/lib/animate.css" media="screen, projection"/>
    <!-- <link rel="stylesheet" href="css/services.css" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="{$dirSRC}css/lib/flexslider.css" type="text/css" media="screen"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?97"></script>
    {$modelHeader}

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
{$navbar}
{$body}
{$footer}

<script src="{$dirSRC}js/bootstrap.min.js"></script>
<script src="{$dirSRC}js/theme.js"></script>
<script type="text/javascript" src="{$dirSRC}js/flexslider.js"></script>
<script type="text/javascript" src="{$dirSRC}js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('.edit').editable('?page=admin&part=text', {
            type      : 'textarea',
            indicator : 'Saving...',
            cancel    : 'Cancel',
            submit    : 'OK',
            tooltip   : 'refresh',
            id        : 'id',
            name      : 'newvalue',
            submitdata : {action: "edittext", silent: "true"}
        });
    });
</script>
{$modelFooter}
</body>
</html>