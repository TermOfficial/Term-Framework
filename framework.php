<?php
/*
Well hello there! :D
Don't be scared, I'll be here to guide you along here.
Although before you can use this, I'd like to say a few things.
1. You can use this framework FREE OF CHARGE! All you have to do is give credit for the script (per the MIT License) unless I give explicit permission.
2. If you encounter a problem, try solving it yourself! If you solve it, make a pull request to make life easier for other developers! (and me. D:) If you can't solve it, create an issue. (https://github.com/TermOfficial/Term-Framework)
3. Enjoy!

This script uses MySQLi, CURL.
If you don't have the following, the script won't function.

In order to connect to your database, you can use your own script by specifying it in config, but it needs one requirement. The database must be connected to under $db.
If you don't want to use your own script, use the connector below.

If you want to use one of the functions, e.g:
function login($username, $password){
  my login script would be here
}

Then use it like this:
login("username", "password");
and if it is a success, it will return 1. otherwise, it will return the error it ran into.
*/
// Config
$connscript = ""; // Replace the value with the location of your script.
$usecookies = true; // Use cookies instead of PHP Session. No idea if this is more secure or not. Probably not, but if you want it enabled, go ahead.
$dbhost = "hostname (usually localhost)";
$dbuser = "username to access your DB";
$dbpass = "password to access your DB";
$dbname = "name for your DB";

// If you want to fix an issue, open the script on github.

function checkver($ver){ // PLEASE FIX!
  if($ver != file_get_contents("https://raw.githubusercontent.com/TermOfficial/Term-Framework/main/framework-true.php")){
    echo "<script>console.warn('Term-Framework is out of date. Update the script here: https://github.com/TermOfficial/Term-Framework ~Term-Framework~')</script>";
  } else {
    echo "<script>console.log('Update check pass. ~Term-Framework~')</script>";
}
}

if($connscript != NULL){
  require($connscript);
} else {
  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if($usecookies = false){
    session_start();
  }
}

function test(){
  echo "Term-Framework test script.";
}
//checkver("b1014");
?>
