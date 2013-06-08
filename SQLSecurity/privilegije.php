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

                        Privilegije u MySQLu
                        <ul class="padding">
                            <li>
                                Administratorske privilegije - omogućavaju upravljanje MySQL serverom. Globalne su, jer se ne vezuju za korisnika ili bazu </li>
                            <li>
                                Database privilegije</li>
                            <li>
                                Privilegije za objekte baze podataka - tabele, indexi, view</li>

                        </ul>
                    </div>
                    <div>
                        <h2>Privilegije koje su omogućene za GRANT i REVOKE</h2>


                        <pre class="prettypeprint">
<table summary="Permissible Privileges for GRANT and
REVOKE" border="1"><colgroup><col><col><col></colgroup><thead><tr><th scope="col">Privilege</th><th scope="col">Column</th><th scope="col">Context</th></tr></thead><tbody><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create"><code class="literal">CREATE</code></a></td><td><code class="literal">Create_priv</code></td><td>databases, tables, or indexes</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_drop"><code class="literal">DROP</code></a></td><td><code class="literal">Drop_priv</code></td><td>databases, tables, or views</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_grant-option"><code class="literal">GRANT OPTION</code></a></td><td><code class="literal">Grant_priv</code></td><td>databases, tables, or stored routines</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_lock-tables"><code class="literal">LOCK TABLES</code></a></td><td><code class="literal">Lock_tables_priv</code></td><td>databases</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_references"><code class="literal">REFERENCES</code></a></td><td><code class="literal">References_priv</code></td><td>databases or tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_event"><code class="literal">EVENT</code></a></td><td><code class="literal">Event_priv</code></td><td>databases</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_alter"><code class="literal">ALTER</code></a></td><td><code class="literal">Alter_priv</code></td><td>tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_delete"><code class="literal">DELETE</code></a></td><td><code class="literal">Delete_priv</code></td><td>tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_index"><code class="literal">INDEX</code></a></td><td><code class="literal">Index_priv</code></td><td>tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_insert"><code class="literal">INSERT</code></a></td><td><code class="literal">Insert_priv</code></td><td>tables or columns</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_select"><code class="literal">SELECT</code></a></td><td><code class="literal">Select_priv</code></td><td>tables or columns</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_update"><code class="literal">UPDATE</code></a></td><td><code class="literal">Update_priv</code></td><td>tables or columns</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create-temporary-tables"><code class="literal">CREATE TEMPORARY TABLES</code></a></td><td><code class="literal">Create_tmp_table_priv</code></td><td>tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_trigger"><code class="literal">TRIGGER</code></a></td><td><code class="literal">Trigger_priv</code></td><td>tables</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create-view"><code class="literal">CREATE VIEW</code></a></td><td><code class="literal">Create_view_priv</code></td><td>views</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_show-view"><code class="literal">SHOW VIEW</code></a></td><td><code class="literal">Show_view_priv</code></td><td>views</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_alter-routine"><code class="literal">ALTER ROUTINE</code></a></td><td><code class="literal">Alter_routine_priv</code></td><td>stored routines</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create-routine"><code class="literal">CREATE ROUTINE</code></a></td><td><code class="literal">Create_routine_priv</code></td><td>stored routines</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_execute"><code class="literal">EXECUTE</code></a></td><td><code class="literal">Execute_priv</code></td><td>stored routines</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_file"><code class="literal">FILE</code></a></td><td><code class="literal">File_priv</code></td><td>file access on server host</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create-tablespace"><code class="literal">CREATE TABLESPACE</code></a></td><td><code class="literal">Create_tablespace_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_create-user"><code class="literal">CREATE USER</code></a></td><td><code class="literal">Create_user_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_process"><code class="literal">PROCESS</code></a></td><td><code class="literal">Process_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_proxy"><code class="literal">PROXY</code></a></td><td>see <code class="literal">proxies_priv</code> table</td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_reload"><code class="literal">RELOAD</code></a></td><td><code class="literal">Reload_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_replication-client"><code class="literal">REPLICATION CLIENT</code></a></td><td><code class="literal">Repl_client_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_replication-slave"><code class="literal">REPLICATION SLAVE</code></a></td><td><code class="literal">Repl_slave_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_show-databases"><code class="literal">SHOW DATABASES</code></a></td><td><code class="literal">Show_db_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_shutdown"><code class="literal">SHUTDOWN</code></a></td><td><code class="literal">Shutdown_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_super"><code class="literal">SUPER</code></a></td><td><code class="literal">Super_priv</code></td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_all"><code class="literal">ALL [PRIVILEGES]</code></a></td><td>&nbsp;</td><td>server administration</td></tr><tr><td scope="row"><a class="link" href="privileges-provided.html#priv_usage"><code class="literal">USAGE</code></a></td><td>&nbsp;</td><td>server administration</td></tr></tbody></table>
                        </pre>
                        <h6>Kreiranje korisnika</h6>
                         <pre class="prettypeprint">
CREATE USER 'jeffrey'@'localhost' IDENTIFIED BY 'mypass';
                         </pre>
                        <h6>Dodeljivanje pravo selecta</h6>
                         <pre class="prettypeprint">
GRANT SELECT ON db2.invoice TO 'jeffrey'@'localhost';
                         </pre>
                         <h6>Oduzimanje pravo inserta</h6>
                         <pre class="prettypeprint">
REVOKE INSERT ON *.* FROM 'jeffrey'@'localhost';
                         </pre>
                          <h6>Prikaz privilegija</h6>
                         <pre class="prettypeprint">
SHOW GRANTS FOR 'bob'@'pc84.example.com';
                         </pre>
                          
                           <h6>Prikaz konektovanih korisnika</h6>
                         <pre class="prettypeprint">
mysql> SELECT CURRENT_USER();
+----------------+
| CURRENT_USER() |
+----------------+
| @localhost     |
+----------------+
                         </pre>
<div>
                        <h2>Kada su uvažene promene privilegija</h2>
                        <div class="padded">
                            Za neke promene privilegija MySQL odmah ponovo učitava u memoriju grant tabelu, a za neke je potrebno da se server restartuje kako bi se izvršile promene.
                            Ako za promenu GRANT tabele koristimo komande kao što su GRANT, REVOKE, SET PASSWORD i RENAME USER, promene će se izvšiti odmah.
                            A ako indirektno menjamo ova pravila pomoću komandi INSERT, UPDATE ili DELETE potrebno je da restartujemo server da bi se izvršile promene.
                        </div>
</div>
                           <div>
                        
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
