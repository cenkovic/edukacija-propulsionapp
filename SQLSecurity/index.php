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
        <link href="/google-code-prettify/prettify.css" rel="stylesheet">
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
                                <a href="">MySQL upravljanje korisničkim nalozima</a>

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

                        <h2>  Opšti faktori koji utiču na bezbednost</h2>
                    <ul class="padding">
                        <li>
                            Odabir dobre lozinke </li>
                        <li>
                            Privilegije koje dodeljujemo korisnicima</li>
                        <li>
                            Osiguravanje aplikacije od SQL Injectiona</li>
                        <li>
                            Bezbednost same instalacije (obratiti pažnju da fajlovi nisu
                            čitljivi od strane neovlašćenih lica)</li>
                        <li>
                            Kontrola pristupa unutar samog sistema baze podataka</li>
                        <li>
                            Kreiranje rezervne kopije baze podatak kao i konfiguracionih i log fajlova
                        </li>
                    </ul>
                </div>
                <div>
                    <h2>Smernice o bezbednosti</h2>
                    <b> Prilikom pokretanja MySQL-a, obrtiti pažnju na sledeće stvari:</b>
                    <ul class="padding">
                        <li>
                            Nikada ne davati nikome pristup user tabeli u mysql bazi podataka osim root nalogu.</li>
                        <li>Pomoću komanda GRANT i REVOKE upravljate kontrolom pristupa u MySQLu.</li>
                        <li> Uvek treba da podesite password za root, a proveru da li imate podešen
                            password možete da uradite pomoću sledeće komande mysql -u root. Ako vam
                            ne traži password, znači da svako može da pristupi vašim bazama sa svim privilegijama.</li>
                        <li>
                            Sa komadnom SHOW GRANTS možete da vidite koji korisnik može da pristupi čemu, a sa
                            komadnom REVOKE možete da oduzmete privilegije.</li>
                        <li>
                            Nikada lozinke nemojte da čuvate u čitljivom formatu, nego koristite sha2(), sha1(), md5() hash funkcije.</li>
                        <li>
                            Nikada ne birajte lozinke sa rečima koje se nalaze u rečniku.</li>
                        <li>
                            Firewall može da poveća bezbednost vaše baze za 50%.</li>
                        <li>
                            Proverite da li vam je port 3306 otvoren komandom telnet server_host 3306</li>
                        <li>
                            Uvek koristite šifrovan protokol za prenos podataka preko Interneta kao što je SSL i SSH.</li>
                        <li>
                            Provera da li su tokovi podataka šifrovani:<br/><br/>
                            <pre class="prettyprint">
 tcpdump -l -i eth0 -w -src or dst port 3306 | strings</pre></li>
                    </ul>

                    <h2>Kako držati šifru sigurno</h2>
                    <div class="padding"> Uvek koristiti -p pa onda u novom redu kucati password, nikako u istom redu
                        <pre class="prettypeprint">
shell> mysql -u root -p db_name
Enter password: ********
                        </pre>
                    </div>
                </div>
                     <div>
                    <h2>Password Hash</h2>
                    <div class="padding"> Password za mysql se nikada ne čuva u izvornom obliku, već u hashu.
                        Sa sledećom komandom možete da pogledate hash vašeg passworda, i ako uporedite sa poljem password u sistemskoj tabeli user,
                        videćete da su polja istog sadržaja.
                        <pre class="prettypeprint">
mysql> SELECT PASSWORD('mypass');
+--------------------+
| PASSWORD('mypass') |
+--------------------+
| 6f8c114b58f2ce9e   |
+--------------------+
                        </pre>
                    </div>
                </div>
                      <div>
                    <h2>Password Validation Plugin</h2>
                    <div class="padding">
                        <pre class="prettypeprint">
mysql> INSTALL PLUGIN validate_password SONAME 'validate_password.so';
                        </pre>
                        <pre class="prettypeprint">
mysql> SHOW VARIABLES LIKE 'validate_password%';
+--------------------------------------+--------+
| Variable_name                        | Value  |
+--------------------------------------+--------+
| validate_password_dictionary_file    |        |
| validate_password_length             | 8      |
| validate_password_mixed_case_count   | 1      |
| validate_password_number_count       | 1      |
| validate_password_policy             | MEDIUM |
| validate_password_special_char_count | 1      |
+--------------------------------------+--------+

  --validate-password[=value]
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
