twitter-bot
===========

This project 'twitter-bot' is an easy sample of creating a Twitter bot for your info service. This sample project is based on PHP.

Imagine you have a blog or news database and you want to publish your blog/news to your Twitter followers.

Requirements:<br>
- You need to have news/article/blog table<br>
- Your table structure usually looks like this.<br>
<pre>
---------------------------------------------------------------------------------------------------------------
id | title    | description    | url                          | published_datetime  | is_published_to_twitter |
---------------------------------------------------------------------------------------------------------------
1  | My Title | My Description | http://www.sony-ak.com/?id=3 | 2014-01-05 13:10:00 | 0                       |
---------------------------------------------------------------------------------------------------------------
</pre>
- You have to create Twitter application (with read/write permission).<br>
- Get the consumer key, consumer secret, user token and user secret from Twitter application details.<br>
- The column 'is_published_to_twitter' is used to detect that row/lines already published to Twitter, so the default should be 0 and after success published to Twitter then it will set to 1.<br> 

