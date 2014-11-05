<?php
  // include the library
  include dirname(__FILE__) . '/lib/tmhOAuth.php';
  include dirname(__FILE__) . '/lib/tmhUtilities.php';
  
  // connect to MySQL database
  $dbHost = "your_database_host_here";
  $dbUsername = "your_database_username_here";
  $dbPassword = "your_database_password_here";
  $dbName = "your_database_name_here";
  
  $dbConn = mysql_connect($dbHost, $dbUsername, $dbPassword) or die("The MySQL database now under site maintenance! Please be patient and we will back soon!");
  mysql_select_db($dbName, $dbConn) or die("Database name is not available !!");
  mysql_set_charset('utf8', $dbConn);
  mysql_query("SET NAMES 'utf8'", $dbConn);

  // initialize the Twitter library with your value
  $tmhOAuth = new tmhOAuth(array(
    'consumer_key'    => 'your_consumer_key_here',
    'consumer_secret' => 'your_consumer_secret_here',
    'user_token'      => 'your_user_token_here',
    'user_secret'     => 'your_user_secret_here',
  ));
  
  // let's query to the table (based on table example on the README)
  $sqlString = "SELECT * FROM news WHERE is_published_to_twitter = 0 ORDER BY published_datetime DESC LIMIT 1";
  $resultId = mysql_query($sqlString, $dbConn);
  
  if(mysql_num_rows($resultId) > 0) {
    // get the data from table
    $newsId = mysql_result($resultId, 0, "id");
    $title = mysql_result($resultId, 0, "title");
    $link = mysql_result($resultId, 0, "url");
  
    // publish to Twitter
    $code = $tmhOAuth->request('POST', $tmhOAuth->url('1.1/statuses/update'), array(
      'status' => $title . ' ' . $link,
      'wrap_links' => true
    ));

    if($code == 200) {
      tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
      
      // set the column value so on the next run your content will not posted again to Twitter
      $sqlString = "UPDATE news SET is_published_to_twitter = 1 WHERE id = " . $newsId;
      mysql_query($sqlString, $dbConn);
    } else {
      tmhUtilities::pr($tmhOAuth->response['response']);
    }
  }
