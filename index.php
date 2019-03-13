<!DOCTYPE html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <title>Projekt Tågtabell</title>
  <meta name="Author" content="Therese Levin" />
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
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
      <h1>Välkommen till Tågtrafiken</h1>
      <?php
        //Api-nyckel från trafikverket är sparad i variabeln $key
        $key='ec0d7a06fea94d4882f8b67c15b3f31a';
        //Lägger till filen trafikinfo.php med funktioner som jag kan kalla på i denna //filen
        include 'trafikinfo.php';
      
        //Cookie  
         if(isset($_COOKIE["savedfrom"])) {
            //kod för att kolla om cookie finns
            //visa innnehållet i $cookie
            //Spara cookie med namn i en ny variabel, $savedfrom, innehåller sparade input från //form
            $savedfrom=$_COOKIE["savedfrom"];
            $savedto=$_COOKIE["savedto"];
            //Så att man kan skriva ut namen på de valda stationerna utan att få förkortningarna
            $savedfrom_name=station_name($savedfrom);
            $savedto_name=station_name($savedto);
            echo "<h2>Din personliga sparade tabell med avgångarna $savedfrom_name till $savedto_name</h2>"; 
            //Table head kommer bara upp när det finns en cookie
            echo "<table>"; 
            echo '<tr>' . '<th>' . "Tid" . '</th>' . '<th>' . "Ändrad tid" . '</th>' . '<th>' . "Inställt" . '</th>' . '<th>' . "Spår" . '</th>'. '<th>' . "Bolag" . '</th>' . '</tr>'; 
            //En länk till "clearcookie", som tar bort den sparade cookien
            echo "<div class='delete'>";
            echo "<a href='http://ddwap.mah.se/ah7411/ME132A/projekt/clearcookie.php'>Ta bort tabell</a>";
            echo "</div>";
          }
  

        //Jag har valt att välja bort else
        //För att jag vill att där alltid ska vara ett formulär
        //Även om det finns cookies eller inte
        //Och han man en else med ett formulär, blir det dubbelt
        //Detta för att jag vill att besökaren alltid ska ha valet att kunna //söka en ny tabell

        
        //ersätta "m" och "al" med en veriabel som hämtas från formuläret
        //@ för att inte skriva ut felmeddelandet för stationer som inte fungerar, för att //"supress" php varningar
     $stations=@next_train($savedfrom,$savedto,60,60);
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
      
    
 
    echo "<hr>";
    echo "<div class='formalign'>";
    echo "<h2>Vart vill du åka?</h2>";
    echo "<h3>Tabellen är sparad till nästa gång</h3>";
    echo "<p>När en tabell sparas godkänner du användandet av cookies.</p>";
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
        echo "<br><input type='submit' class='button' value='Sök'>";

        echo "</form>";
        echo "</div>";
    
    
        ?>

    </div>
    <div class="search">
      <div>
        <h2>Information</h2>
        <hr>
        <h3>Cookies</h3>
        <h4>I enlighet med lagen om elektronisk kommunikation så får du som besökare här information om användning av kakor på denna webbplats. Detta för att du ska veta vad cookies används till på våra sidor och hur du som besökare, om du vill, kan undvika sådan användning</h4>
      </div>

      <div>
        <h2 class="punkt">.</h2>
        <hr>
        <h3>Hur du undviker Cookies</h3>
        <p>Om du vill undvika cookies kan du ändra inställningarna i din webbläsare.</p>
        <b>Du kan välja att neka alla kakor eller att bli tillfrågad när en hemsida försöker spara en kaka på dator.</b>
      </div>

      <div>
        <hr>
        <h3>Vad är Cookies?</h3>
        <p>En kaka (cookie) är en liten textfil som en webbplats begär att få spara på besökarens dator. Kakor används på många webbplatser för att ge en besökare tillgång till olika funktioner. Informationen i kakan är möjlig att använda för att följa en användares surfande på webbplatser som använder samma kaka.</p>
      </div>

      <div>
        <hr>
        <h3>Mer information om lagen</h3>
        <p>För mer information om lagen om elektronisk kommunikation kan du besöka <a href="http://www.pts.se/"> Post- och telestyrelsens webbplats.</a></p>
        <p>Information tagen från <a href="https://www.skanetrafiken.se/om-oss/cookies/?_t_id=1B2M2Y8AsgTpgAmY7PhCfg%3d%3d&_t_q=cookies&_t_tags=language%3asv&_t_ip=81.88.3.194&_t_hit.id=Skanetrafiken_Web_Models_Pages_InformationPage/_108f883f-cec7-4881-ab9f-2531220b4475_sv&_t_hit.pos=1">Skånetrafiken</a></p>
      </div>
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
