<?php
//Spara innehåll från formulär index i variablarna savedfrom och //savedto
//cookien ska innehålla det man matar in i formuläret
//hämta from och to från formuläret 

$savedfrom=$_GET['from'];
$savedto=$_GET['to'];

setcookie("savedfrom",$savedfrom, time() + 3600, '/');
setcookie("savedto",$savedto, time() + 3600, '/');
//kod för att spara cookiesarna savedfrom och savedto, med utgångstid
//Finns nu två cookies, "savedfrom" och "savedto"
?>
  <!DOCTYPE html>
  <html lang="sv">

  <head>
    <meta charset="UTF-8">
    <title>Projet Tågtabell</title>
    <meta name="Author" content="Therese Levin" />
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="images/logo.jpg" />

  </head>

  <body>
    <div class="header">
      <a href="http://ddwap.mah.se/ah7411/ME132A/Projekt/">
        <!--SVG kod för logotyp och text jag skapat -->
        <svg version="1.1" id="Lager_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1024 768" style="enable-background:new 0 0 1024 768;" xml:space="preserve">
      <style type="text/css">
          .st0{font-family:'Helvetica-Bold';}
          .st1{font-size:130.72px;}
          .st2{font-family:'Geneva';}
          .st3{font-size:36.6721px;}
          .st4{fill:#FFFFFF;}
          .st5{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
      </style>
      <text transform="matrix(1.0734 0 0 1 247.9692 361)" class="st0 st1">Tågtrafiken</text>
      <text transform="matrix(1.0063 0 0 1 465 443.3457)" class="st2 st3">Din tågtabell från Trafikverket</text>
      <g>
	<path d="M166.1,244.8H61.2c-6.6,0-12,5.4-12,12v117.3c0,6.6,5.4,12,12,12h104.9c6.6,0,12-5.4,12-12.1V256.8
		C178.1,250.2,172.7,244.8,166.1,244.8z M74,257.1h77.3c2.8,0,5.1,2.3,5.1,5.1c0.1,2.8-2.2,5.1-5.1,5.1H74c-2.8,0-5.1-2.3-5.1-5.1
		S71.2,257.1,74,257.1z M82.2,368.3c-7.3,0-13.3-5.6-13.3-12.6s6-12.6,13.3-12.6s13.3,5.6,13.3,12.6S89.5,368.3,82.2,368.3z
		 M106.3,303.9c0,6.6-5.4,12-12,12H70.1c-6.6,0-12-5.4-12-12v-10.6c0-6.6,5.4-12,12-12h24.2c6.6,0,12,5.4,12,12V303.9z M143.2,368.3
		c-7.3,0-13.3-5.6-13.3-12.6s6-12.6,13.3-12.6s13.3,5.6,13.3,12.6S150.5,368.3,143.2,368.3z M168.3,303.9c0,6.6-5.4,12-12,12h-26.2
		c-6.6,0-12-5.4-12-12v-10.6c0-6.6,5.4-12,12-12h26.2c6.6,0,12,5.4,12,12V303.9z"/>
	<ellipse cx="112.7" cy="211.6" rx="13.3" ry="12.6"/>
	<ellipse class="st4" cx="143.2" cy="355.7" rx="13.3" ry="12.6"/>
	<ellipse class="st4" cx="82.2" cy="355.7" rx="13.3" ry="12.6"/>
	<path class="st4" d="M156.3,281.3h-26.2c-6.6,0-12,5.4-12,12v10.6c0,6.6,5.4,12,12,12h26.2c6.6,0,12-5.4,12-12v-10.6
		C168.3,286.7,162.9,281.3,156.3,281.3z"/>
	<path class="st4" d="M94.3,281.3H70.1c-6.6,0-12,5.4-12,12v10.6c0,6.6,5.4,12,12,12h24.2c6.6,0,12-5.4,12-12v-10.6
		C106.3,286.7,100.9,281.3,94.3,281.3z"/>
	<path class="st4" d="M74,267.3h77.3c2.9,0,5.2-2.3,5.1-5.1c0-2.8-2.3-5.1-5.1-5.1H74c-2.8,0-5.1,2.3-5.1,5.1S71.2,267.3,74,267.3z"
		/>
</g>
<line class="st5" x1="223.8" y1="140.5" x2="223.8" y2="474.6"/>
</svg>
      </a>
      <!-- Menyn -->
      <ul>
        <li><a href="http://ddwap.mah.se/ah7411/ME132A/Projekt/">Hem</a></li>
        <li><a href="https://www.trafikverket.se/">Trafikverket</a></li>
        <li><a href="http://mah-webb.github.io/courses/me132a/projects/project2018.html">Projektbeskrivning</a></li>
      </ul>
    </div>

    <div class="whole">
      <div class="wrapper2">
        <?php
        //Min Api-nyckel från trafikverket är sparad i variabeln $key
        $key='ec0d7a06fea94d4882f8b67c15b3f31a';
        //Lägger till filen trafikinfo.php med funktioner som jag kan kalla på i denna //filen
        include 'trafikinfo.php';


        //Har använt break <br> i en variabel för att underlätta
        $break="<br>";

        //Hämtar från stationen och till stationen från formuläret
        $from = $_GET['from'];
        $to = $_GET['to'];

        //Så att man kan skriva ut namen på de valda stationerna utan att få förkortningarna 
        $fromname=station_name($from);
        $toname=station_name($to);


        //Välkommstmeddelandet om vilka stationer man valt
         echo "<h5>Avgångar från $fromname till $toname </h5>";

        echo "<div class='delete'>";
        echo "<a href='http://ddwap.mah.se/ah7411/ME132A/projekt/clearcookie.php'>Ta bort tabell</a>";
        echo "</div>";
        //ersätta "m" och "al" med en veriabel som hämtas från formuläret
        //@ för att inte skriva ut felmeddelandet för stationer som inte fungerar, för att //"supress" php varningar
         $stations=@next_train($from,$to,60,90);

            echo "<table>"; 
              echo '<tr>' . '<th>' . "Tid" . '</th>' . '<th>' . "Ändrad tid" . '</th>' . '<th>' . "Inställt" . '</th>' . '<th>' . "Spår" . '</th>'. '<th>' . "Bolag" . '</th>' . '</tr>';

        //Presenterar innehållet i arrayn $stations i en tabell
         foreach ($stations as $row) 
          {   echo "<table>"; 
              echo '<tr>';
              echo '<td>' . short_time($row['AdvertisedTimeAtLocation']) . '</td>';
              echo '<td>' . short_time($row['EstimatedTimeAtLocation']) . '</td>';
              echo '<td>' . $row['Canceled'] . '</td>';
              echo '<td>' . $row['TrackAtLocation'] . '</td>';
              echo '<td>' . $row['InformationOwner'] . '</td>';
              echo '</tr>';
              echo "</table>";
          }
        

      ?>
      </div>

      <div class="search2">
        <?php
        echo "<hr>";
        echo "<h2>Gör en ny sökning</h2>";
        echo "<hr>";

         //Skriver ut formuläret, skickar till filen saved.php
        echo "<form method='GET' action='saved.php'>";
        //Echo text
        echo "<p>Från:</p>";
        //echo select tagg med namnet from, från stationerna
        echo "<select name='from'>";
        //Funktionen stationlist, skriver ut alla stationer nära //"M"
        //Loopar genom och skriver ut alla stationer, lägger det i //en opiton-tagg med namn "$name" och value "$code" som //innehållet stationen namn och förkortning
        $stationlist = stations_near("M",20000);
        foreach ($stationlist as $code => $name) {
          echo "<option name='$name' value='$code'>$name<br>";
          echo "</option>";
        }
        echo "</select><br>";

        echo "<p>Till:</p>";
        //Ny select tagg, $to
        echo "<select name='to'>";

        $stationlist = stations_near("M",20000);
          foreach ($stationlist as $code => $name) {
            echo "<option name='$name' value='$code'>$name<br>";
            echo "</option>";
          }


        echo "<input type='submit' class='button' value='Spara'>";

        echo "</form>";
    ?>
      </div>



    </div>
    <footer>
      <hr>
      <div class="grid">
        <div>
          <h2><a href="https://www.trafikverket.se/">Trafikverket</a></h2>
        </div>
        <div>
          <h2><a href="https://www.mah.se/">Malmö Univeritet</a></h2>
        </div>
        <div>
          <h2><a href="http://mah-webb.github.io/courses/me132a/projects/project2018.html">Projektbeskrivning</a></h2>
        </div>
      </div>
    </footer>

  </body>

  </html>