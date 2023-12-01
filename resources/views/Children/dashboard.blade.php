<!DOCTYPE html>
<html>
  <head>
    <title>Student Dashboard</title>
    
<link rel="stylesheet" href="{{asset('css/dashboard_styles.css')}}">
  </head>
  
  <body>
  <script src="funcs.js"></script>
    <div id="stud_info">
    <pre style="font-size: 18px; ">
<div id="prof">
<b>Name:</b>
<h3>{{$child->name}}</h3>
<b>Age:</b>
<h3>{{$child->age}}</h3>
</div>
<hr>
    </pre>  
<table style="margin-top:-73px;">
<tr><th><button id="my-button"  onmouseover="homeworks()">Homeworks</button>
    <div id="my-options">
    <pre>
homework 1
homework 2
homework 3</pre>
  </div>
  </th></tr>
  <tr><th><button id="my-button"  onmouseover="games()">Games</button>
  
<div id="my-options">
  <pre>
Spelling
Puzzles
mental math</pre>
  </div>
  <audio id="gams">
    <source src="audio/games.mp3" type="audio/mpeg">
</audio>
  </th></tr>
  <tr><th><button id="my-button"  onmouseover="projects()">Projects</button>
  <audio id="pros">
    <source src="audio/projects.mp3" type="audio/mpeg">
</audio>
    <div id="my-options">
    <ul>
      <li>Option 1</li>
      <li>Option 2</li>
      <li>Option 3</li>
    </ul>
  </div>
  </th></tr>
  <tr><th><button id="my-button"  onmouseover="worksheets()">Worksheets</button>
  <audio id="wors">
    <source src="audio/worksheets.mp3" type="audio/mpeg">
</audio>
    <div id="my-options">
    <ul>
      <li>Option 1</li>
      <li>Option 2</li>
      <li>Option 3</li>
    </ul>
  </div>
  </th></tr>
  <tr><th><button id="my-button" onclick="openNewTab()" onmouseover="buy_a_book()">buy a book</button>
  <audio id="buys">
    <source src="audio/buy-a-book.mp3" type="audio/mpeg">
</audio>
</th></tr>
  
  </table>
  <script>function games() {
    var sound = document.getElementById("gams");
    sound.currentTime = 0;
    sound.play();
  }
  function openNewTab() {
  var width = 600;
  var height = 400;
  var left = (screen.width - width) / 2;
  var top = (screen.height - height) / 2;
  window.open('pare_login.php', '_blank', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);
}
  function projects() {
    var sound = document.getElementById("pros");
    sound.currentTime = 0;
    sound.play();
  }
  function worksheets() {
    var sound = document.getElementById("wors");
    sound.currentTime = 0;
    sound.play();
  }
  function buy_a_book() {
    var sound = document.getElementById("buys");
    sound.currentTime = 0;
    sound.play();
  }</script>
  <hr>
<table>
<tr><th><a href="profile.php"> <button id="my-button"  onmouseover="profile()">go to profile</button></a>
  </th></tr>
  <tr><th><a href="{{route('getchilds')}}"><button id="my-button"  onmouseover="logout()">Log out <img src="images/logout.png" width="40px" style="float:right; align:right;" ></button></a>
   
  </th></tr>
</table>  
    </div>

<audio id="homs">
    <source src="audio/homeworks.mp3" type="audio/mpeg">
</audio>
  <div class="dashboard">
    <audio id="logs">
    <source src="audio/logout.mp3" type="audio/mpeg">
  </audio>
    <audio id="profs">
    <source src="audio/go-to-profile.mp3" type="audio/mpeg">
  </audio>

      <br><h1>Here are some topics that your kid can learn!</h1>
    <nav>
<pre>               <button class="hbut" onmouseover="guided_lessons()">Guided lessons</button>              <button class="hbut" onmouseover="lessons_plans()">lessons plans</button>              <button class="hbut" onmouseover="talk()">Talk to tutor</button>              <button class="hbut" onmouseover="song_vids()">song videos</button>              <button class="hbut" onmouseover="online_exer()">online exercise</button><a href="web.php"></a></pre>
</nav>
<hr>
<audio id="guis">
    <source src="{{asset('audio/guided-lessons.mp3')}}" type="audio/mpeg">
</audio>
<audio id="less">
    <source src="{{asset('audio/lessons-plans.mp3')}}" type="audio/mpeg">
</audio>
<audio id="tals">
    <source src="{{asset('audio/talk-to-tutor.mp3')}}" type="audio/mpeg">
</audio>
<audio id="sons">
    <source src="{{asset('audi/song-videos.mp3')}}" type="audio/mpeg">
</audio>
<audio id="onls">
    <source src="{{asset('audio/online-exercises.mp3')}}" type="audio/mpeg">
</audio>
      <div class="courses">
        <div class="course" onmouseover="numbers()" style="background-image: url({{asset('images/numbers-lessons.png')}}); background-size:contain;background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Numbers</h2>
          <p>here your kid will Learn numbers and counting with 
             fun ways.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
            <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
            <progress value="32" max="100" style="margin-left: 1.8cm;"> 32% </progress></div>
            <audio id="nums">
    <source src="audio/numbers.mp3" type="audio/mpeg">
  </audio>
        </div>
        <div class="course" onmouseover="colors()" style="background-image: url({{asset('images/coloring-lessons.png')}}); background-size:contain;background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Colors</h2>
          <p>Explore the world of colors through drawing activities.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
    <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
    <progress value="41" max="100" style="margin-left: 1.8cm;"> 41% </progress></div>
    <audio id="cols">
    <source src="audio/colors.mp3" type="audio/mpeg">
  </audio>
        </div>
        <div class="course" onmouseover="shapes()" style="background-image: url({{asset('images/shapes-lessons.jpg')}});background-size: contain;background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Shapes</h2>
          <p>Find the diferrence between the shapes and it's names.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
            <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
            <progress value="85" max="100" style="margin-left: 1.8cm;"> 85% </progress></div>
            <audio id="shas">
    <source src="audio/shapes.mp3" type="audio/mpeg">
  </audio>
        </div>
        <div class="course" onmouseover="letters()" style="background-image: url({{asset('images/letters-lessons.png')}});background-size: contain; background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Letters</h2>
          <p>Learn the alphabet from A to Z with an example of each letter.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
            <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
            <progress value="17" max="100" style="margin-left: 1.8cm;"> 17% </progress></div>
            <audio id="lets">
    <source src="audio/letters.mp3" type="audio/mpeg">
  </audio>
          </div>
        <div class="course" onmouseover="animals()" style="background-image: url({{asset('images/animals-lessons.png')}});background-size: contain;background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Animals</h2>
          <p>explore the animals and thier names and voices.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
            <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
            <progress value="78" max="100" style="margin-left: 1.8cm;"> 78% </progress></div>
            <audio id="anis">
    <source src="audio/animals.mp3" type="audio/mpeg">
  </audio>
        </div>
        <div class="course" onmouseover="story()" style="background-image: url({{asset('images/story.png')}});background-size: contain;background-repeat: no-repeat; border: #2a2e2e solid 2px;">
          <h2>Story</h2>
          <p>choose the story your kid like,and let him listen to it.</p>
          <a href="#">Start</a>
          <div style="margin-top: 10px; color: rgb(53, 44, 56);">
            <label style="margin-left: 1cm;">Your progress in this Lesson:</label>
            <progress value="50" max="100" style="margin-left: 1.8cm;"> 50% </progress></div>
            <audio id="stos">
    <source src="audio/story.mp3" type="audio/mpeg">
  </audio>
        </div>
      </div>
    </div>
   <!--- <p class="footer">© 2023     Childlearn. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>-->
  </body>
</html>