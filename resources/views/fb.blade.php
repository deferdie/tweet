<?php
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("/YOUR_PATH_TO/facebook_php_sdk/facebook.php");

// initialize Facebook class using your own Facebook App credentials
// see: https://developers.facebook.com/docs/php/gettingstarted/#install
$config = array();
$config['appId'] = '484875971718522';
$config['secret'] = '8bd3d507fe33b18e3c5479e291adc6eb';
$config['fileUpload'] = false; // optional

$fb = new Facebook($config);

// define your POST parameters (replace with your own values)
$params = array(
  "access_token" => "YOUR_ACCESS_TOKEN", // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
  "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
  "link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
  "picture" => "http://i.imgur.com/lHkOsiH.png",
  "name" => "How to Auto Post on Facebook with PHP",
  "caption" => "www.pontikis.net",
  "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);

// post to Facebook
// see: https://developers.facebook.com/docs/reference/php/facebook-api/
try {
  $ret = $fb->api('/YOUR_FACEBOOK_ID/feed', 'POST', $params);
  echo 'Successfully posted to Facebook';
} catch(Exception $e) {
  echo $e->getMessage();
}
?>
