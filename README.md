leomoon-twitter2rss
===================

Get RSS feed of your Twitter account using OAuth with caching.

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
