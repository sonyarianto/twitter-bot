twitter-bot
===========

<h2>What is twitter-bot</h2>
This project 'twitter-bot' is an easy sample of creating a Twitter bot for your info service. This sample project is based on PHP.

Imagine you have a blog or news database and you want to publish your blog/news to your Twitter followers.

<h2>Requirements</h2>
- You need to have news/article/blog table<br>
- Your table structure usually looks like this.<br>
<br>
<pre>
=================================================================================================================
| Table name: news                                                                                              |
=================================================================================================================
| id | title    | description    | url                          | published_datetime  | is_published_to_twitter |
-----------------------------------------------------------------------------------------------------------------
| 1  | My Title | My Description | http://www.sony-ak.com/?id=3 | 2014-01-05 13:10:00 | 0                       |
-----------------------------------------------------------------------------------------------------------------
| 2  | My Data  | My Desc Data   | http://www.sony-ak.com/?id=4 | 2014-01-05 15:20:00 | 0                       |
-----------------------------------------------------------------------------------------------------------------
</pre>
- You have to create Twitter application (with read/write permission).<br>
- Get the consumer key, consumer secret, user token and user secret from Twitter application details.<br>
- The column 'is_published_to_twitter' is used to detect that row/lines already published to Twitter, so the default should be 0 and after success published to Twitter then it will set to 1.<br>

OK now let see the code.

<h2>Real world usage</h2>
Later you can use the script on the cronjob to post to Twitter for example every 5 minutes. This is the example of cronjob setup that run the script every 5 minutes.

<pre>
*/5 * * * * /usr/bin/php -q /home/your_any_folder/post_to_twitter.php > /dev/null 2>&1
</pre>

<h2>Improvements</h2>
You can improve or create your own needs based on this project.

<h2>Credits</h2>
This project is using library from https://github.com/themattharris/tmhOAuth/

