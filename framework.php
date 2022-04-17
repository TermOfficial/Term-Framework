<?php
/*
Well hello there! :D
Don't be scared, I'll be here to guide you along here.
Although before you can use this, I'd like to say a few things.
1. You can use this framework FREE OF CHARGE! All you have to do is give credit for the script (per the MIT License) unless I give explicit permission.
2. If you encounter a problem, try solving it yourself! If you solve it, make a pull request to make life easier for other developers! (and me. D:) If you can't solve it, create an issue. (https://github.com/TermOfficial/Term-Framework)
3. Enjoy!

This script uses MySQLi, file_get_contents (you must be able to get contents from raw.githubusercontent.com with an https request header.)
If you don't have the following, the script won't function.

In order to connect to your database, you can use your own script by specifying it in config, but it needs one requirement. The database must be connected to under $db.
If you don't want to use your own script, use the connector below.

INSTALLATION:
in every script, require the framework.
Then, for the first time upon using the framework, run the function setup();
This will then setup the database and create all files required.

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
$dbhost = "localhost"; // the last few variables should be self-explanitory. This value is usually localhost.
$dbuser = "";
$dbpass = "";
$dbname = "";

// If you want to fix an issue, open the script on github.

function checkver($ver){ // PLEASE FIX!
  if($ver != file_get_contents("https://raw.githubusercontent.com/TermOfficial/Term-Framework/main/framework-true.php")){
    echo "<script>console.warn('Term-Framework is out of date. Update the script here: https://github.com/TermOfficial/Term-Framework ~Term-Framework~')</script>";
  } else {
    echo "<script>console.log('Update check pass. ~Term-Framework~')</script>";
}
}

// connect to the db!
if($connscript != NULL){
    require($connscript);
} else {
    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if($db->error){
        exit("Connection failure.");
    }
    if($usecookies = false){
        session_start();
    }
}

// use this to test Term-Framework's functionality
function test(){
  echo "Term-Framework test script.";
}

// use this only once!
function setup(){
    echo "Setting up DB";
    global $db;
    global $dbname;
    $setup = $db->prepare("CREATE TABLE `".$dbname."`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(64) NOT NULL , `password` VARCHAR(64) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;");
    $setup->execute();
    if(!$setup->error){
        echo "<br>users created";
      $setup = $db->prepare("CREATE TABLE `".$dbname."`.`token` ( `uid` INT(10) NOT NULL , `token` VARCHAR(64) NOT NULL ) ENGINE = MyISAM;");
      $setup->execute();
      if(!$setup->error){
         echo "<br>tokens created<br>Finished!";
         return 1;
      } else {
        echo "epic fail";
        return $setup->error();
      }
    } else {
        echo "epic fail";
        return $setup->error();
    }
}

function clogin($username, $password){
  global $db;
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $makeacc = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $makeacc->bind_param("ss", $username, $hash);
  $makeacc->execute();
  if($makeacc->error){
    return $makeacc->error();
  } else {
    return 1;
  }
}

function login($username, $password){
  return "not implemented";
}
//checkver("b1014");
?>
