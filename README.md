# This framework is unsupported, and will not recieve any updates at all. Maybe I'll make a new one.
### WARNING
For some reason, the function that sets $_SESSION["_"] or $_COOKIE["_"] isn't working. - You'll have to set these values yourself. **How do I do this?**
### Luckily it's not that hard!
You just have to check if the function returns 1.
Just like this.
```
if(login($username, $password) == 1){
    // execute the correct login code here. e.g.
    // $_SESSION["username"] = $username;
    // or
    // setcookie("username", $username, time() + (86400 * 5), "/"); (btw 86400 is one day)
    // and then access the cookie with
    // $_COOKIE["username"];
}
```
# Term-Framework
A PHP framework that specializes in login and handling sessions.
### Installation
Please use the framework.php script.
Copy & paste. framework-true.php is just for me to check the framework version.
