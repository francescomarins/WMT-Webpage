<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION | Home</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="javascript.js"></script>
</head>

<body>
  <a href="#container" class="skip-to-main-content">Skip to main content</a>
  <div id="menu" class="menu">
    <a class="logo currentpage" title="Home" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php" class="currentpage link">Home</a>
    <a href="partecipants.php" class="link">Participants</a>
    <a href="statistics.php" class="link">Statistics</a>
    <a href="votes.php" class="link">Voting page</a>
    <button type="button" class="vote" name="vote" onclick="document.location = 'votes.php';">Vote!</button>
    <a href="javascript:void(0);" class="icon" onclick="showMenu()">
      <em class="fa fa-bars"></em>
    </a>
  </div>
  <section id="container">
    <header id="header">
      <h1 class="logo">VOTES4EUROVISION</h1>
      <h2>2022</h2>
    </header>
    <article class="aim" id="aim">
      <h2>What is the aim of this website?</h2>
      <p>
        This page aims at collecting the popular opinion about ESC songs given that during the competition
        it is possible to vote only upon a payment. This, instead, is a way to discover how results would be
        different if voting was free.
      </p>
      <p>
        What are you waiting for? Click on the button below or on VOTING PAGE in the menu and vote for your favourite!
      </p>
      <p class="button-container">
        <button type="button" class="vote" name="vote" onclick="document.location = 'votes.php';">Vote now!</button>
      </p>
    </article>
    <hr>
    <article class="intro" id="intro">
      <h2>The contest</h2>
      <img id="maneskin" src="img/maneskin.jpeg" alt="Manekin celebrating their win at Eurovision 2021">
      <p>
        The Eurovision Song Contest 2022 is the upcoming 66th edition of the Eurovision Song Contest.
        It is set to take place in Turin, Italy, following the country's victory at the 2021 contest with the song "Zitti e buoni" by Måneskin.
        Organised by the European Broadcasting Union (EBU) and host broadcaster Radiotelevisione italiana (RAI),
        the contest will be held at the PalaOlimpico, and will consist of two semi-finals on 10 and 12 May, and a final on 14 May 2022.
        The three live shows will be hosted by Italian television presenter Alessandro Cattelan, singer Laura Pausini and singer Mika.
      </p>
    </article>
    <hr>
    <article class="why" id="why">
      <h2>Why does this website exist?</h2>
      <img id="learning" src="img/learning.jpeg" alt="A book and mathematical formulas">
      <p>
        The entire website is a university project to be handed in for an exam.
        The topic of the website has been decided by the student.
      </p>
      <h2>Copyrights</h2>
      <p>
        The images used in the website are copyright free.
        The author has not payed any royalites for names mentioned given that the purpose of the website is fully educational.
        Furthermore, the site has profit-making intent.
      </p>
    </article>
    <footer id="footer">
      <hr>
      <h3>Some external links</h3>
      <a class="fa fa-location-arrow" href="http://www.comune.torino.it/" title="Municipality of Turin"></a>
      <a class="fa fa-instagram" href="https://www.instagram.com/eurovision" title="Euovision Song Contest Instagram Account"></a>
      <a class="fa fa-youtube" href="https://www.youtube.com/channel/UCRpjHHu8ivVWs73uxHlWwFA" title="Eurovision Song Contest YouTube Channel"></a>
      <p>
        &copy; All rights reserved - Francesco Marinelli - 2022
      </p>
    </footer>
  </section>
</body>
</html>
