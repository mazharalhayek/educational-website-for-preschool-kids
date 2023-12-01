<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="body-styles.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}} ">
 <title>
    Childlearn
 </title>
 <link rel="icon" type="image/png" href="images/pencils.jpg"/>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-image: url('images/kids.png');background-repeat: repeat;background-size:unset"  >
<header>
<img src="images/header-logo.png" alt="childlear logo" title="our logo" style="margin-left: 7cm">
</header>
<nav>

  <div id="login" style="position:absolute; top: 200px; bottom: 200px; left: 500px;"></div>

  <a href="#">About Us</a>
  <a href="#">Contact Us</a>
  <a href="{{ route('login') }}" style="float: right">Log In</a>
  <a href="{{ route('register') }}" style="float: right">Register</a>
 </nav>
<div class="main" >
  <h1>Welcome to Childlearn website </h1>
  <p>Our website provides fun and interactive educational resources for kids to learn and explore. We have a wide range of subjects and activities to help them enhance their knowledge and skills.</p>
  <img src="images/Collage—Girl3.png" alt="Kids learning" id="cg" width="500px" height="500px">
  <div id="fr">
  <h2>Our Subjects</h2>
  <p>Here are some of the subjects that your kids can learn:</p>
  <table cellpadding="10" cellpadding-left="10px">
<tr>
    <th><img src="images/colors.png" width="60px" height="100px">Colors</th>
    <th><img src="images/letters.png" width="60px" height="100px">  letters</th>
    <th><img src="images/numbers.png" width="60px" height="100px">  numbers</th>
</tr>
<tr>
    <th><img src="images/shapes.png" width="60px" height="100px">  shapes</th>
    <th><img src="images/animals.png" width="60px" height="100px">  animals</th>
</tr>
   </table>
  <h1>Our Activities</h1>
  <p>Here are some of the fun activities that your kids can enjoy:</p>
  <ul style="font-size:20px;">
    <pre>
Interactive Quizzes                      Educational Games

tuition with animations and sounds       story reading

singing
  </ul>
</pre>
  </div>
<pre style="margin-top: -200px;">
<h4 style="font-size: 30px; color: rgb(24, 23, 23);">
<img src="images/kids1.png" style="margin-left: -220px;">           <img src="images/kids2.png" style="margin-left:-490px;">
      Let them lead                  Help them connect</h4>
</pre>

 </div>
 <footer class="footer">
  <p>© 2023     Childlearn. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
 </footer>
 <iframe id="login-frame" class="login-frame" src="stu_c_ac.php" width="400" height="500" style="display: none;"></iframe>
 <iframe id="pare_ac" class="login-frame" src="pare_c_ac.php" width="400" height="500" style="display: none;"></iframe>
<script src="funcs.js"></script>
</body>
</html>
