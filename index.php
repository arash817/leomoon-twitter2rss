<?php
######################################################################################################################################
#                                                        LeoMoon  Twitter2RSS                                                        #
######################################################################################################################################
/*
Written by:
    Amin Babaeipanah and Arash Soleimani

Changelog:
    1.0: First release with no cache (cron based)
    1.1: Cache added by Arash Soleimani and cron feature was removed

How to install:
    01- Sign up for Twitter developer account with your twitter login @: https://dev.twitter.com/apps
    02- Create a new application
    03- Fill "Name", "Description", and "Website"
        "Website" must be the same website where this script will be installed...
    04- Click on your newly created application
    05- Make sure "Access" is "Read only"
    06- Make sure "Callback URL" is the same as "Website" in step 3
    07- Click "Update this Twitter application's settings
    08- Click "OAuth tool" tab and get "Consumer key", "Consumer secret", "Access token", and "Access token secret"
        and paste them accordingly below...
    09- Upload "index.php", "OAuth.php", and "twitteroauth.php", and "cache" folder to your webserver. Something like below:
        www.yourwebsite.com/twitter2rss/index.php
        www.yourwebsite.com/twitter2rss/OAuth.php
        www.yourwebsite.com/twitter2rss/twitteroauth.php
        www.yourwebsite.com/twitter2rss/cache/
    10- Go to "www.yourwebsite.com/twitter2rss/index.php" and your rss will be genrated
    11- If "www.yourwebsite.com/twitter2rss/cache/" is empty, then change permission of "cache" folder to 777.
*/
######################################################################################################################################
#                                                        EDIT VARIABLES BELOW                                                        #
######################################################################################################################################
define('CONSUMER_KEY',    ''); #Twitter Application Consumer Key
define('CONSUMER_SECRET', ''); #Twitter Application Consumer Secret Key
define('ACCESS_TOKEN',    ''); #Twitter Application Access Token
define('ACCESS_SECRET',   ''); #Twitter Application Access Token Secret
$screen_name=''; #Screen name to show in RSS feed (Your twitter account without "@")
$cache_dir='./cache/'; #Default cache dir
$min = 15; #Cache time in minutes
######################################################################################################################################
$cache_file = $cache_dir.md5($_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]);
if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * $min ))) {
   if($_GET['type'] == 'rss' || !isset($_GET['type']))
  	header('Content-Type:text/xml;charset=utf-8');
		echo file_get_contents($cache_file);
} else {
	include dirname(__FILE__) . '/twitteroauth.php';
	$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_SECRET);
	$request = $twitter->get('statuses/user_timeline',array('screen_name'=>$_GET['screen_name'],'count'=>$_GET['count']));
	if(!isset($request->error)) {
		$rss = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		$rss.= '<rss version="2.0">' . "\n";
		$rss.= '    ' . '<channel>' . "\n";
		$rss.= '        '.'<title>@'.$screen_name.' Twitter Feed</title>'."\n";
		$rss.= '        '.'<link>https://twitter.com/'.$screen_name.'</link>'."\n";
		$rss.= '        '.'<description>Null</description>'."\n";
		$rss.= '        '.'<language>en-us</language>'."\n";
		$rss.= '        '.'<lastBuildDate>'.date('r').'</lastBuildDate>'."\n";
		if(count($request)>0) {
			foreach($request as $tweet) {
				$rss .= '        ' . '<item>' . "\n";
				$rss .= '            ' . '<title>' . $tweet->text . '</title>' . "\n";
				$rss .= '            ' . '<description><![CDATA[' . $tweet->text . ']]></description>' . "\n";
				$rss .= '            ' . '<guid>http://www.twitter.com/' . $tweet->user->screen_name . '/statuses/' . $tweet->id_str . '</guid>' . "\n";
				$rss .= '            ' . '<link>http://www.twitter.com/' . $tweet->user->screen_name . '/statuses/' . $tweet->id_str . '</link>' . "\n";
				$rss .= '            ' . '<pubDate>'.date('r',strtotime($tweet->created_at)).'</pubDate>' . "\n";
				$rss .= '        ' . '</item>' . "\n";
			}
		}
		$rss.= '    ' . '</channel>' . "\n";
		$rss.= '</rss>' . "\n";
		file_put_contents($cache_file, $rss, LOCK_EX);
		header('Content-Type:text/xml;charset=utf-8');
		echo $rss;
	}
}
?>
