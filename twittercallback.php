<?php
// Twitter callback - save access token

require(ABSPATH . 'wp-blog-header.php');
$connection = new TwitterOAuth(anfield_live_blogging_TWITTER_CONSUMER_KEY, anfield_live_blogging_TWITTER_CONSUMER_SECRET, get_option('anfieldliveblogging_twitter_request_token'), get_option('anfieldliveblogging_twitter_request_secret'));
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

update_option('anfieldliveblogging_twitter_token', $access_token['oauth_token']);
update_option('anfieldliveblogging_twitter_secret', $access_token['oauth_token_secret']);
update_option('anfieldliveblogging_enable_twitter', '1');

header('Location: ' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=anfield-live-blogging-options');
