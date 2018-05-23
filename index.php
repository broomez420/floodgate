<?php require $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php
  if (isset($_GET['ref_source'])) { // undocumented alias for cryptator
    header('Location: ' . str_replace('?ref_source=', '?rotator=', str_replace('&ref_source=', '&rotator=', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")), true, 301);
    exit;
  }

  $referrer = null; // The address of the referrer.
  if (isset($_GET['r']))
    $referrer = $_GET['r'];

  $referrer_currency = null; // The currency that the referrer wants to be paid in.
  if (isset($_GET['rc']))
    $referrer_currency = $_GET['rc'];

  $referred = (isset($referrer) && isset($referrer_currency)); // Whether the user was referred.

  if (!isset($_GET['rotator']))
    header('X-Frame-Options: sameorigin', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="main.css">

<title><?php echo $cfg_site_name; ?></title>
 <?php include $_SERVER['DOCUMENT_ROOT'] . '/custom/head.php'; ?>

<style>
table, th, td {
    border: 1px solid black;
    border-radius: 25px;
}
</style>

</head> 
            
<body>

<script type="text/javascript" src="https://coinmedia.co/new_code_site82523.js"></script>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/topnav.php';?>



<div class="row">
  <div class="column side">
    
	<center>
<iframe data-aa='886655' src='//ad.a-ads.com/886655?size=250x250' scrolling='no' style='width:250px; height:250px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>

		</center>
  </div>
  
  
  
  
  <div class="column middle">
<center><table width="99%" bgcolor="#98AFC7"></center>
  <tr>
    <td><center><h2>Welcome</h2></center>
 <h1><?php echo $cfg_site_name; ?></h1>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/autoheadline.php';?>

 <?php if (!empty($cfg_MOTD)) echo '<aside id="motd"><div style="min-width:40vw"><b>Announcements</b></div>' . $cfg_MOTD . '</aside>'; ?>
 <div style="padding-left: 1em">
  <form action="verify.php" method="post">
   <?php
     if ($referred) {
       echo '<input type="hidden" name="r" value="' . htmlspecialchars($referrer, ENT_QUOTES|ENT_SUBSTITUTE|ENT_DISALLOWED|ENT_HTML5) . '"/>';
       echo '<input type="hidden" name="rc" value="' . htmlspecialchars($referrer_currency, ENT_QUOTES|ENT_SUBSTITUTE|ENT_DISALLOWED|ENT_HTML5) . '"/>';
     }
     if (isset($_GET['rotator']))
       echo '<input type="hidden" name="rotator" value="' . htmlspecialchars($_GET['rotator'], ENT_QUOTES|ENT_SUBSTITUTE|ENT_DISALLOWED|ENT_HTML5) . '"/>';
   ?>
   <?php
     if ($cfg_use_captcha) {
       require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/captcha.php';
       embed_captcha();
     }
   ?>
   <input type="text" name="address" required="required" pattern="[A-Za-z0-9]+" placeholder="address" size="40" style="font-family: monospace"/><br/>
   <select name="currency" required="required">
    <?php if ($cfg_BCH_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'BCH')) {echo 'selected="selected" ';} echo 'value="BCH">BCH (~' . ($cfg_BCH_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_BLK_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'BLK')) {echo 'selected="selected" ';} echo 'value="BLK">BLK (~' . ($cfg_BLK_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_BTC_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'BTC')) {echo 'selected="selected" ';} echo 'value="BTC">BTC (~' . ($cfg_BTC_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_BTX_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'BTX')) {echo 'selected="selected" ';} echo 'value="BTX">BTX (~' . ($cfg_BTX_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_DASH_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'DASH')) {echo 'selected="selected" ';} echo 'value="DASH">DASH (~' . ($cfg_DASH_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_DOGE_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'DOGE')) {echo 'selected="selected" ';} echo 'value="DOGE">DOGE (~' . ($cfg_DOGE_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_ETH_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'ETH')) {echo 'selected="selected" ';} echo 'value="ETH">ETH (~' . ($cfg_ETH_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_LTC_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'LTC')) {echo 'selected="selected" ';} echo 'value="LTC">LTC (~' . ($cfg_LTC_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_POT_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'POT')) {echo 'selected="selected" ';} echo 'value="POT">POT (~' . ($cfg_POT_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_PPC_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'PPC')) {echo 'selected="selected" ';} echo 'value="PPC">PPC (~' . ($cfg_PPC_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
    <?php if ($cfg_XPM_enabled) {echo '<option '; if (isset($referrer_currency) && ($referrer_currency == 'XPM')) {echo 'selected="selected" ';} echo 'value="XPM">XPM (~' . ($cfg_XPM_amount) . ' every ' . ($cfg_refresh_time / 60) . ' minutes)</option>';} ?>
   </select>
   <input id="start_claiming" type="submit" value="Start claiming"/>
   <div style="max-width:80ch"><?php include $_SERVER['DOCUMENT_ROOT'] . '/custom/claim_options.php'; ?></div>
  </form>
 </div>
 <p>Referral link: <code><?php echo htmlspecialchars($cfg_site_url, ENT_QUOTES|ENT_SUBSTITUTE|ENT|DISALLOWED|ENT_HTML5); ?>?r=<var>YOUR_ADDRESS</var>&amp;rc=<var>CURRENCY</var></code> (rotator owners, please append <code>&amp;rotator=YOUR_ROTATOR_NAME</code> to the URL)</p>
 <?php if ($cfg_enable_google_analytics) echo '<p>This site uses Google&nbsp;Analytics and cookies. It doesn&#700;t really matter, and the information collected is <em>completely</em> anonymous and stripped of any identifying information. Nobody cares anyway; the people who <em>do</em> care about your information don&#700;t tell you that they have it. The information collected here would be akin to glancing at your feet from across the street while holding a censor bar over your face, body, and skin.<br/>Nice shoes, by the way!</p>'; ?>

</td>
  </tr>
</table>  


<center><table width="99%" bgcolor="#98AFC7"></center>
  <tr>
    <td><center><p><b><h2>Latest News!</h2></b></p></center>
<center>
<p>NEW SPACE CRYPTO GAME!!  <a href="http://starcoins.ws/r/432" target="_blank">Star Coins!!</a></p>
<p><a href="https://cointiply.com/r/kO86" target="_blank">Cointiply!  Earn money and great referral program!</a></p>
<p style="margin:0;"><h2>New Faucets and Auto Faucets on a </p><p><a href="http://findfreecrypto.com/" target="_blank">New Website!</a></h2></p><br>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/newspage.php';?>



<br><br><br>
<a href="http://potcoinlotto.com/?ref=japakar" target="_blank"><img src="http://potcoinlotto.com/i/468x60-1.png"></a>
</center>
</td>
  </tr>
</table>


  <br>
  </div>
  
  
  
  <div class="column side">
  
<center>
<iframe src="https://coinmedia.co/new_code_site96735.js" scrolling="no" frameborder="0" width="200px" height="230px"></iframe>     
	</center>
  </div>
</div>


<script type="text/javascript"><!--
zone = "33";
pl = "4092";
url = "https://bitraffic.com";
//--></script>
<script type="text/javascript" src="https://bitraffic.com/show.js"></script>
<br>
<center>
<p><i>Copyright 2017 &copy; Japakar.</i></p>
</center>


<!-- Bitcoadz.io - Ad Display Code -->
<script data-cfasync="false" type="text/javascript" src="//www.bitcoadz.io/display/items.php?12916&766&300&250&4&0&0&8"></script>
<!-- Bitcoadz.io - Ad Display Code -->
</body>
</html>