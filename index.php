<?
// example
include_once dirname(__FILE__) . '/twitter2rss.class.php';
$screenName = 'YourTwitterAccountName';
$options = array(
	'keys'=>array(
		'CONSUMER_KEY'=>'d3d9446802a44259755d38e6d163e820',
		'CONSUMER_SECRET'=>'c20ad4d76fe97759aa27a0c99bff6710',
		'ACCESS_TOKEN'=>'c81e728d9d4c2f636f067f89cc14862c',
		'ACCESS_SECRET'=>'a87ff679a2f3e71d9181a67b7542122c',
	),
	'cache_dir'=>'./cache/', // default: ./cache/  (optional)
	'cache_time'=>10, // minutes; default: 15   (optional)
	'limit'=>10, // default: 20  (optional)
	
);

$rss = new twitter2rss($screenName, $options);
$rss->render();

?>
