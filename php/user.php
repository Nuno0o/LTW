<?php

include('connectdb.php');

function add_user(
  $username,
  $password,
  $email,
  $name,
  $birth,
  $city,
  $country
) {
  global $dbh;

  $options = ['cost' => 12];
  $hash = password_hash($password, PASSWORD_DEFAULT, $options);

  $stmt = $dbh->prepare('INSERT INTO users VALUES (?, ?, ?, ?, ?, ?, ?)');
  $stmt->execute(
    array(
      $username,
      $hash,
      $email,
      $name,
      $birth,
      $city,
      $country
    )
  );
}

function verify_user($username, $password) {
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute(array($username));
  $user = $stmt->fetch();
  return ($user !== false && password_verify($password, $user['password']));
}

function populate_database(){
  add_user("user1","81dc9bdb52d04dc20036dbd8313ed055","quam@duilectus.ca","Austin Willis","1995-05-01","Kalisz","Micronesia");
  add_user("user2","1234","interdum.Nunc.sollicitudin@Quisquefringillaeuismod.net","Odessa Pena","1966-11-08","Jaipur","Cyprus");
  add_user("user3","1234","scelerisque.neque@tristiqueneque.com","Hedley Washington","1973-06-12","Redruth","Liberia");
  add_user("user4","1234","ut.pellentesque@ultricessitamet.ca","Trevor Richard","1954-07-07","Macklin","New Zealand");
  add_user("user5","1234","eleifend.non.dapibus@arcuet.com","Summer Sutton","1971-07-26","Starachowice","Macedonia");
  add_user("user6","1234","nibh@nec.com","Francis Kirby","1943-09-25","Honolulu","Monaco");
  add_user("user7","1234","lectus.convallis.est@fringillapurus.edu","Mari Olsen","1944-07-07","West Vancouver","Mauritius");
  add_user("user8","1234","metus@Sedmalesuadaaugue.com","Griffin Mitchell","1962-08-24","College","Cura�ao");
  add_user("user9","1234","cursus@bibendum.ca","Nadine Rollins","1961-10-31","Traun","Gibraltar");
  add_user("user10","1234","Nam.nulla@etnuncQuisque.ca","Zeph Zimmerman","1970-05-13","Balikesir","Falkland Islands");
  add_user("user11","1234","luctus@Nulla.ca","Cooper Pope","1990-02-26","Nancagua","Brunei");
  add_user("user12","1234","erat.volutpat.Nulla@Aenean.com","Lael Donaldson","1997-12-09","Cami�a","Puerto Rico");
  add_user("user13","1234","Donec.vitae@ametlorem.net","Warren Schwartz","1970-10-15","�u�oa","Slovakia");
  add_user("user14","1234","pretium@sempercursusInteger.edu","Aidan Lester","1947-01-16","Maisi�res","Sudan");
  add_user("user15","1234","sodales.elit@cursusNuncmauris.co.uk","Burke Davenport","1982-11-15","Pukekohe","Palau");
  add_user("user16","1234","quis@ut.org","Isaac Peck","1999-08-14","Sauris","Iran");
  add_user("user17","1234","condimentum.Donec@dictum.org","Hermione Cash","1974-10-28","Kilmalcolm","Honduras");
  add_user("user18","1234","pellentesque@lacusvestibulumlorem.co.uk","Nasim May","1986-12-09","San Giorgio Albanese","Luxembourg");
  add_user("user19","1234","adipiscing@viverra.com","Kessie Witt","1990-09-01","Telde","Bonaire, Sint Eustatius and Saba");
  add_user("user20","1234","pharetra.nibh@aceleifend.com","Herman Aguirre","1994-02-25","Elgin","Nepal");
  add_user("user21","1234","Quisque@Maurisquisturpis.org","Victor Dalton","1994-03-21","Oudekapelle","Guinea-Bissau");
  add_user("user22","1234","tempor@maurissagittisplacerat.ca","Hedwig Doyle","1985-11-24","Goderich","Italy");
  add_user("user23","1234","eget.ipsum@metus.net","Zachary Adkins","1961-11-01","Bernburg","Sao Tome and Principe");
  add_user("user24","1234","felis@feugiat.com","Cole Hale","1967-09-01","Workington","Wallis and Futuna");
  add_user("user25","1234","Aliquam.fringilla.cursus@est.edu","Ignacia Crosby","1943-02-06","Seraing","Guatemala");
  add_user("user26","1234","felis.adipiscing@ametnulla.edu","Alec Mccarty","1954-10-23","Camet�","Togo");
  add_user("user27","1234","quam.vel@amet.ca","Gwendolyn Serrano","1951-04-03","Boignee","Serbia");
  add_user("user28","1234","non.leo@Sedmolestie.org","Nelle Whitley","1945-03-25","Vitrival","Austria");
  add_user("user29","1234","lacus@mollisvitae.co.uk","Oscar Barry","1989-04-22","Germersheim","Lebanon");
  add_user("user30","1234","sodales@iaculis.ca","Marvin Wood","1962-02-18","Picinisco","Turkey");
  add_user("user31","1234","mus.Proin.vel@acfacilisisfacilisis.org","Jada Harmon","1997-03-21","Bergama","Thailand");
  add_user("user32","1234","tortor@gravidaPraesent.com","Jemima Ford","1979-07-05","Burlington","Thailand");
  add_user("user33","1234","bibendum.sed@ornaretortorat.co.uk","Jescie Burton","1955-03-17","Newport","Uganda");
  add_user("user34","1234","magna.Suspendisse@arcuCurabiturut.co.uk","Candice Reilly","1970-06-25","Essene","Israel");
  add_user("user35","1234","Quisque@ornare.net","Galena Reed","1942-01-18","Brye","Comoros");
  add_user("user36","1234","ornare@velpedeblandit.edu","Zachery Nieves","1998-09-29","Chiavari","Mauritius");
  add_user("user37","1234","risus@Quisque.co.uk","Rowan Pearson","1940-01-03","Wilmont","Myanmar");
  add_user("user38","1234","Ut@aliquetlobortis.co.uk","Iliana Cleveland","1970-09-05","Kirkland","Brazil");
  add_user("user39","1234","facilisis.facilisis@ultricies.com","Buckminster Hahn","1941-07-27","Lumaco","Korea, South");
  add_user("user40","1234","ac.feugiat@magna.edu","Nora Matthews","1968-02-19","Kenosha","Mauritania");
  add_user("user41","1234","semper@lectus.edu","Madaline Guy","1997-12-01","Sennariolo","Grenada");
  add_user("user42","1234","ultrices.mauris.ipsum@etmagnisdis.org","Joelle Christian","1954-08-29","Ospedaletto Lodigiano","Nauru");
  add_user("user43","1234","libero.Donec@suscipit.edu","Kylie Contreras","1979-11-02","Durgapur","Palau");
  add_user("user44","1234","venenatis@afacilisis.com","Emi Mercer","1971-07-12","Wodonga","Laos");
  add_user("user45","1234","cubilia@laciniaatiaculis.co.uk","Eric Todd","1950-09-06","Avelgem","Congo (Brazzaville)");
  add_user("user46","1234","justo.Praesent.luctus@infaucibusorci.edu","Kermit Miranda","1964-09-10","Villers-sur-Semois","Seychelles");
  add_user("user47","1234","quis.tristique@Quisquenonummy.com","Randall Riggs","1984-05-04","Calgary","Azerbaijan");
  add_user("user48","1234","metus@Duis.org","Penelope Dudley","1961-08-13","Derby","Liberia");
  add_user("user49","1234","auctor.ullamcorper@faucibusorciluctus.edu","Gloria Gould","1967-06-26","Rez�","Bulgaria");
  add_user("user50","1234","gravida.molestie.arcu@sem.ca","Vladimir Valencia","1942-10-08","Weyburn","Chad");
  add_user("user51","1234","convallis@nonummy.ca","Cruz Spence","1974-12-10","Kavaratti","Viet Nam");
  add_user("user52","1234","at@aliquetmolestie.com","Constance Petersen","1941-01-21","Blevio","San Marino");
  add_user("user53","1234","tincidunt.neque.vitae@pedenonummyut.edu","Yeo Gaines","1990-08-19","Catanzaro","Armenia");
  add_user("user54","1234","est@tempusrisusDonec.co.uk","Evan White","1965-06-24","Llaillay","Belgium");
  add_user("user55","1234","Aliquam@IntegerurnaVivamus.co.uk","Griffith Sexton","1987-12-13","Zaffelare","Korea, South");
  add_user("user56","1234","elit@nisi.net","Devin Rasmussen","1961-04-16","Cagli","Costa Rica");
  add_user("user57","1234","ut@ultricies.co.uk","Raja Carlson","1941-02-13","Ipatinga","Namibia");
  add_user("user58","1234","euismod@Namac.co.uk","Micah Soto","1960-01-25","Katowice","Western Sahara");
  add_user("user59","1234","ante@aliquetPhasellus.ca","Tamekah Morris","1971-07-02","Avernas-le-Bauduin","Thailand");
  add_user("user60","1234","rutrum@Maecenas.com","Zeus Kirkland","1968-09-10","Tofield","Serbia");
  add_user("user61","1234","dignissim@tempuslorem.net","Akeem Bernard","1964-01-21","Jemeppe-sur-Meuse","Malta");
  add_user("user62","1234","erat.volutpat@Nuncsollicitudincommodo.net","Lana Chaney","1958-01-01","Rueglio","Hong Kong");
  add_user("user63","1234","a.feugiat.tellus@Mauriseu.org","Courtney Humphrey","1977-08-29","Neerheylissem","Colombia");
  add_user("user64","1234","molestie@duilectus.ca","Harper Price","1989-10-20","Avise","Guernsey");
  add_user("user65","1234","mus@duiinsodales.co.uk","Cynthia Glenn","1965-05-27","Castelnovo del Friuli","Gibraltar");
  add_user("user66","1234","ut.odio.vel@antebibendumullamcorper.com","Azalia Adams","1980-03-18","Affligem","Nauru");
  add_user("user67","1234","nibh@euismod.edu","Kiayada Finley","1965-09-10","Chiusanico","South Georgia and The South Sandwich Islands");
  add_user("user68","1234","malesuada.id.erat@nullavulputatedui.com","Zeus Williamson","1989-03-29","Los Lagos","Papua New Guinea");
  add_user("user69","1234","at.pede@adlitora.ca","Basia Fitzpatrick","1960-06-12","Calvera","Christmas Island");
  add_user("user70","1234","amet.ante.Vivamus@Aliquamerat.ca","Carson Guerrero","1964-10-03","Maintal","Andorra");
  add_user("user71","1234","pellentesque.tellus@aliquetProinvelit.net","Amal Knapp","1946-03-03","Cartagena","Pitcairn Islands");
  add_user("user72","1234","cursus.in.hendrerit@Aliquamnisl.org","Veda Peterson","1947-09-27","Hafizabad","Lebanon");
  add_user("user73","1234","id@Nam.com","Jaden Perez","1968-12-10","Heinsch","Afghanistan");
  add_user("user74","1234","Cras@vitaedolorDonec.edu","Lucian Buchanan","1990-08-17","El Carmen","South Georgia and The South Sandwich Islands");
  add_user("user75","1234","ipsum.nunc@necmauris.co.uk","Whoopi Delaney","1967-01-05","Whitehorse","Macedonia");
  add_user("user76","1234","pede@fermentum.net","Rhea Flores","1977-05-06","Nurallao","Montenegro");
  add_user("user77","1234","et@eleifendCrassed.com","Zachary Torres","1953-09-10","Orl�ans","Bhutan");
  add_user("user78","1234","sapien@aauctornon.com","Clio Calderon","1982-12-10","Tourinne","Albania");
  add_user("user79","1234","non.leo@malesuada.net","Amal Valencia","1991-04-06","Hereford","Uganda");
  add_user("user80","1234","felis.eget.varius@Loremipsumdolor.ca","Drew Holland","1993-07-19","Darwin","Comoros");
  add_user("user81","1234","augue.eu.tempor@facilisisfacilisis.ca","Caesar Jacobson","1979-08-22","Pietrarubbia","India");
  add_user("user82","1234","ultrices.posuere.cubilia@egetvariusultrices.com","Barclay Barrera","1994-12-17","Vottem","Mali");
  add_user("user83","1234","ligula@eget.com","Chantale Klein","1944-12-31","Ehein","Switzerland");
  add_user("user84","1234","aliquam@metusAeneansed.com","Aileen Boyer","1984-03-17","Preore","Guyana");
  add_user("user85","1234","ut@accumsaninterdumlibero.ca","Thomas Nash","1990-01-20","Nederokkerzeel","Nigeria");
  add_user("user86","1234","massa.Mauris@vulputatemauris.ca","Ignatius Dillard","1974-03-12","Erpion","Monaco");
  add_user("user87","1234","pede@eratin.com","Zahir Blankenship","1989-11-07","Peralillo","Andorra");
  add_user("user88","1234","sed@a.com","Nina Cooley","1993-02-08","Frankfurt am Main","Laos");
  add_user("user89","1234","enim@fringilla.edu","Danielle Contreras","1967-02-23","Fosses-la-Ville","Hong Kong");
  add_user("user90","1234","eleifend.Cras@nisinibhlacinia.net","Heather Stanley","1988-03-14","Bayonne","French Guiana");
  add_user("user91","1234","egestas.a@euturpisNulla.edu","Timothy Burgess","1995-11-27","Itegem","Cuba");
  add_user("user92","1234","ultrices@rutrumurnanec.edu","Chantale Spence","1972-08-18","Watson Lake","Russian Federation");
  add_user("user93","1234","tristique@ipsum.co.uk","Ulric Shepard","1996-12-13","Bulandshahr","Saudi Arabia");
  add_user("user94","1234","at.arcu.Vestibulum@DonecestNunc.org","Gannon Guy","1951-02-13","Casnate con Bernate","Saint Vincent and The Grenadines");
  add_user("user95","1234","felis.Nulla@etarcu.co.uk","Lara Mcclure","1979-05-01","Milton Keynes","Mongolia");
  add_user("user96","1234","nec.imperdiet.nec@Vivamus.edu","Kellie Villarreal","1978-05-12","Wunstorf","Nauru");
  add_user("user97","1234","feugiat@sociosqu.net","Daquan Perkins","1973-02-24","Rock Springs","Korea, South");
  add_user("user98","1234","turpis.Nulla.aliquet@auctor.net","Hedda Snow","1992-06-17","Herdersem","Uruguay");
  add_user("user99","1234","risus@nisl.net","Colin Snider","1969-03-27","Cardedu","Sint Maarten");
  add_user("user100","1234","nunc@risusDonecnibh.edu","Logan Beasley","1971-08-16","Malartic","Sudan");
  add_user("admin","1234",NULL,NULL,NULL,NULL,NULL);
}

?>
