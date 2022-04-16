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
This should be all for now.
*/
// Config
$connscript = ""; // Replace the value with the location of your script.
$dbhost = "hostname (usually localhost)";
$dbuser = "username to access your DB";
$dbpass = "password to access your DB";
$dbname = "name for your DB";
// If you want to fix an issue, open the script on github.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://raw.githubusercontent.com/TermOfficial/Term-Framework/main/framework-true.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true)
$framework = curl_exec($ch);
curl_close($ch);
echo "<pre>$framework</pre>";
?>
