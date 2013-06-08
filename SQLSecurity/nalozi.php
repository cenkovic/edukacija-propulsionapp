<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Zend aplikacija">
        <meta name="author" content="Elena Tuksar">
        <title>MySQL Sigurnost</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap responsive -->
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- Font awesome - iconic font with IE7 support -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/font-awesome-ie7.css" rel="stylesheet">
        <!-- Bootbusiness theme -->
        <link href="css/boot-business.css" rel="stylesheet">
        <link href="google-code-prettify/prettify.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/boot-business.js"></script>
        <script type="text/javascript" src="google-code-prettify/run_prettify.js"></script>
    </head>
    <body>
        <!-- Start: HEADER -->
    <header>
        <!-- Start: Navigation wrapper -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a href="" class="brand brand-bootbus">MySQL Sigurnost</a>
                    <!-- Below button used for responsive navigation -->

                    <!-- Start: Primary navigation -->
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li>
                                <a href="index.php">Opšte bezbednosti</a>

                            </li>

                            <li><a href="privilegije.php">MySQL pristup sistemu privilegija</a></li>
                            <li>
                                <a href="nalozi.php">MySQL upravljanje korisničkim nalozima</a>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Navigation wrapper -->
    </header>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                   
                <div>
                    <h2>Korisnička imena i lozinke</h2>
                    
                    <div class="padding">



                           Čuvaju se u bazi mysql, u tabeli user.

                    </div>
                     <div class="padding">
                           Konektovanje sa određenim korisnikom
                            <pre class="prettyprint">

shell> mysql -u username -ppassword db_name
                            </pre>
                     </div>

                </div>
              
                     <div>
                    <h2>Kreiranje korisnika</h2>
                    <div class="padding"> Neophodno je da se prvo ulogujemo kao root, a onda da pokrenemo komandu za kreiranje korisnika
                        <pre class="prettypeprint">
shell> mysql --user=root mysql
mysql> CREATE USER 'monty'@'localhost' IDENTIFIED BY 'some_pass';
                        </pre>
                        Ako hoćemo direktno da ubacimo korisnika u tabelu, to možemo da učinimo na sledeći način:
                         <pre class="prettypeprint">
mysql> INSERT INTO user (Host,User,Password,...)
->     VALUES('%.mydomain.com','myname',PASSWORD('mypass'),...);
mysql> FLUSH PRIVILEGES;
                         </pre>
                    </div>
                </div>
                    <div>
                    <h2>Brisanje korisnika</h2>
                    <div class="padding">
                        Neophodno je da se prvo ulogujemo kao root, a onda da pokrenemo
                        komandu za brisanje korisnika
                        <pre class="prettypeprint">
DROP USER 'jeffrey'@'localhost';
                        </pre>

                    </div>
                </div>
                      <div>
                    <h2>Podešavanje limita za korisničke naloge</h2>
                    <div class="padding">
                       Neka od podešavanja su:<br/>
                       Broj upita koje može da izvrši po satu<br/>
                       Broj update-a po sati<br/>
                       Koliko puta može da se konektuje po satu<br/>
                       Broj istovremenih konekcija na server od jednog korisnika


                        <pre class="prettypeprint">
mysql> CREATE USER 'francis'@'localhost' IDENTIFIED BY 'frank';
mysql> GRANT ALL ON customer.* TO 'francis'@'localhost'
    ->     WITH MAX_QUERIES_PER_HOUR 20
    ->          MAX_UPDATES_PER_HOUR 10
    ->          MAX_CONNECTIONS_PER_HOUR 5
    ->          MAX_USER_CONNECTIONS 2;
                        </pre>

                    </div>
                </div>
                     <div>
                    <h2>Dodeljivanje lozinke</h2>
                    <div class="padding">
                        Prilikom kreiranja naloga
                        <pre class="prettypeprint">
mysql> CREATE USER 'jeffrey'@'localhost'
    -> IDENTIFIED BY 'mypass';
                        </pre>

                    </div>
                     <div class="padding">
                        Podešavanje lozinke
                        <pre class="prettypeprint">
mysql> SET PASSWORD FOR
    -> 'jeffrey'@'localhost' = PASSWORD('mypass');  //podešavanje za određenog korisnika

mysql> SET PASSWORD = PASSWORD('mypass'); //podešavanje naše lozinke

shell> mysqladmin -u user_name -h host_name password "newpwd" // ako menjamo iz komande linije i nismo pristupili mysql serveru

mysql> UPDATE mysql.user SET Password = PASSWORD('bagel')
    -> WHERE Host = 'localhost' AND User = 'francis';
mysql> FLUSH PRIVILEGES;

                        </pre>

                    </div>
                       <div class="padding">
                        Podešavanje isticanja lozinke
                        <pre class="prettypeprint">
ALTER USER 'myuser'@'localhost' PASSWORD EXPIRE; //podešavanje da je neka lozinka istekla

shell> mysql -u myuser -p
Password: ******
ERROR 1862 (HY000): Your password has expired. To log in you must
change it using a client that supports expired passwords.


                        </pre>

                    </div>
                      <div class="padding">
                       <h2> MySQL-a i  SSL-a</h2>
                        <pre class="prettypeprint">
mysql> SHOW VARIABLES LIKE 'have_ssl';  //provera da li SSL ukljucen
+---------------+-------+
| Variable_name | Value |
+---------------+-------+
| have_ssl      | YES   |
+---------------+-------+


shell> mysqld --ssl-ca=ca-cert.pem \    //Certificate Authority (CA) certificate.
         --ssl-cert=server-cert.pem \   //sertifikat javnog kljuca koji se salje korisnicima
         --ssl-key=server-key.pem       //privatni kljuc


                        </pre>

                    </div>
                    <div class="padding">
                      Kreiranje SSL fajlova iz komandne linije
                        <pre class="prettypeprint">
# kreiranje direktorijuma za sertifikat i pristup direktorijumu
shell> rm -rf newcerts
shell> mkdir newcerts && cd newcerts

# Kreiranje CA sertifikata
shell> openssl genrsa 2048 > ca-key.pem
shell> openssl req -new -x509 -nodes -days 3600 \
         -key ca-key.pem -out ca-cert.pem

# Kreiranje server sertifikata
# server-cert.pem = public key, server-key.pem = private key
shell> openssl req -newkey rsa:2048 -days 3600 \
         -nodes -keyout server-key.pem -out server-req.pem
shell> openssl rsa -in server-key.pem -out server-key.pem
shell> openssl x509 -req -in server-req.pem -days 3600 \
         -CA ca-cert.pem -CAkey ca-key.pem -set_serial 01 -out server-cert.pem

# Kreiranje client certificate
# client-cert.pem = public key, client-key.pem = private key
shell> openssl req -newkey rsa:2048 -days 3600 \
         -nodes -keyout client-key.pem -out client-req.pem
shell> openssl rsa -in client-key.pem -out client-key.pem
shell> openssl x509 -req -in client-req.pem -days 3600 \
         -CA ca-cert.pem -CAkey ca-key.pem -set_serial 01 -out client-cert.pem

#Verifikacija sertifikata

shell> openssl verify -CAfile ca-cert.pem server-cert.pem client-cert.pem
server-cert.pem: OK
client-cert.pem: OK


                        </pre>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <footer>

        <div class="container">
            <p>
                &copy; Propulsion Apps 2013 All Rights Reserved
            </p>
        </div>
    </footer>
    <!-- End: FOOTER -->

</body>
</html>
