<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield("title")| AIDE FINANCIERE</title>
    <link rel="icon" href="/site/img/core-img/favicon.ico">
    <link rel="stylesheet" href="/site/style.css">
</head>
<body>

<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
@include("site.partials._header")
@yield("content")
@include("site.partials._footer")



<script src="/site/js/jquery/jquery-2.2.4.min.js"></script>

<script src="/site/js/bootstrap/popper.min.js"></script>

<script src="/site/js/bootstrap/bootstrap.min.js"></script>

<script src="/site/js/plugins/plugins.js"></script>

<script src="/site/js/active.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
