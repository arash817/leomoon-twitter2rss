# LeoMoon Twitter2RSS
## Introduction
Twitter stopped supporting RSS when their API 1.1 was introduced. To get the latest tweets or to automate things (using RSS), you have use their API 1.1 with OAuth. LeoMoon Twitter2RSS is made to make this proccess much easier. With this you can generate latest tweets for your account and use it in different places like IFTTT.com

## Written by
  - Amin Babaeipanah
  - Arash Soleimani

## Changelog
  - 1.2: Twitter2RSS is now a class (twitter2rss.class.php)
  - 1.1: Cache added by Arash Soleimani and cron feature was removed
  - 1.0: First release with no cache (cron based)

## How to install
  - 00: If you have any problems, you can look at index.php example file.
  - 01: Sign up for Twitter developer account with your twitter login @: https://dev.twitter.com/apps
  - 02: Create a new application
  - 03: Fill "Name", "Description", and "Website". "Website" must be the same website where this script will be installed...
  - 04: Click on your newly created application
  - 05: Make sure "Access" is "Read only"
  - 06: Make sure "Callback URL" is the same as "Website" in step 3
  - 07: Click "Update this Twitter application's settings
  - 08: Click "OAuth tool" tab and get "Consumer key", "Consumer secret", "Access token", and "Access token secret" and paste them accordingly below...
  - 09: Upload "index.php", "OAuth.php", and "twitteroauth.php", and "cache" folder to your webserver. Something like below:
      * www.yourwebsite.com/twitter2rss/index.php
      * www.yourwebsite.com/twitter2rss/OAuth.php
      * www.yourwebsite.com/twitter2rss/twitteroauth.php
      * www.yourwebsite.com/twitter2rss/cache/
  - 10: Go to "www.yourwebsite.com/twitter2rss/index.php" and your rss will be genrated
  - 11: If "www.yourwebsite.com/twitter2rss/cache/" is empty, then change permission of "cache" folder to 777.
