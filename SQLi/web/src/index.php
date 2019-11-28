<?php
    include 'config.php';
    include 'flag.php';
    $black_list = "/limit|by|substr|mid|,|admin|benchmark|like|or|char|union|substring|select|greatest|%00|\'|=| |in|<|>|-|\.|\(\)|#|and|if|database|users|where|table|concat|insert|join|having|sleep/i";

    if(preg_match($black_list, $_POST['username'])) exit("<script>alert('hacker!!!');</script>");
    if(preg_match($black_list, $_POST['passwd'])) exit("<script>alert('hacker!!!');</script>");

    $sql="select * from users where username='$_POST[username]' and passwd='$_POST[passwd]'";
    $result = mysql_fetch_array(mysql_query($sql));

    $password = mysql_fetch_array(mysql_query("select passwd from users where username='admin'"));

    if(($password['passwd'])&&($password['passwd'] === $_POST['passwd'])){
        echo $flag;
    }
    if($result['username']){
        header("location:welcome.php");
    }else{
        echo("<script>alert(\"try to make the sqlquery have its own results\")</script>");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>这是一个登录框</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<div class="dowebok limiter">
    <div class="container-login100" style="background-image: url('images/img-01.jpg');">
        <div class="wrap-login100 p-t-190 p-b-30">
            <form class="login100-form validate-form" method="POST" action="./index.php">
                <div class="login100-form-avatar">
                    <img src="images/avatar-01.jpg" alt="AVATAR">
                </div>

                <span class="login100-form-title p-t-20 p-b-45">Please Hack Me Hard</span>

                <div class="wrap-input100 validate-input m-b-10" data-validate="请输入用户名">
                    <input class="input100" type="text" name="username" placeholder="用户名" autocomplete="off">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate="请输入密码">
                    <input class="input100" type="password" name="passwd" placeholder="密码">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn">登 录</button>
                    <?php echo "<h1>sqlquery : {$sql}<br></h1>";?>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vendor/jquery/jquery-1.12.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>