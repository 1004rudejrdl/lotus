<?php
$fb = new Facebook\Facebook([
  'app_id' => '{435335760594195}', // Replace {app-id} with your app id
  'app_secret' => '{c7145b6ab6cd08228d15faf510c60ee9}',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/lotus/mb_login/facebook_call_back.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
 ?>
