<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                if (mb_strtolower(mb_substr($uzytkownik_imie, -1)) == 'a') {
                    echo '<img src="dist/img/avatar3.png" class="img-circle" alt="User Image">';
                }
                else
                {
                    echo'<img src="dist/img/avatar5.png" class="img-circle" alt="User Image">';
                }
                ?>
            </div>
            <div class="pull-left info">
                <p><?php echo"$uzytkownik_imie $uzytkownik_nazwisko"; ?></p>

            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php
            if($uzytkownik_grupa=='1')
            {

            echo'<li class="header">UPOWAŻNIENIA</li>
            <li><a href="upowaznienia.php?a=rejestracja"><i class="fa fa-circle-o"></i>Funkcjonariusze</a></li>
            <li><a href="upowaznienia.php?a=rejestracja&id=1"><i class="fa fa-circle-o"></i>Pracownicy</a></li>
            <li><a href="upowaznienia.php?a=rejestracja&id=2"><i class="fa fa-circle-o"></i>Praktyka, staż, itp.</a></li>
            <li><a href="upowaznienia.php"><i class="fa fa-circle-o"></i> Przegląd</a></li>';

                echo '<li class="header">ADMINISTRACJA</li>
            <li><a href="uzytkownicy.php"><i class="fa fa-circle-o text-red"></i> <span>Użytkownicy</span></a></li>
            <li><a href="uzytkownicy_grupa.php"><i class="fa fa-circle-o text-yellow"></i> <span>Użytkownicy Grupy</span></a></li>
            <li><a href="kopia_zapasowa.php"><i class="fa fa-circle-o text-green"></i> <span>Kopia Zapasowa</span></a></li>';
            }
            elseif($uzytkownik_grupa=='2') {

                echo '<li class="header">UPOWAŻNIENIA</li>
            <li><a href="upowaznienia.php?a=rejestracja"><i class="fa fa-circle-o"></i>Funkcjonariusze</a></li>
           
            <li><a href="upowaznienia.php"><i class="fa fa-circle-o"></i> Przegląd</a></li>';
            }
            elseif($uzytkownik_grupa=='3')
            {
                echo'<li class="header">UPOWAŻNIENIA</li>
             <li><a href="upowaznienia.php?a=rejestracja&id=1"><i class="fa fa-circle-o"></i>Pracownicy</a></li>
            <li><a href="upowaznienia.php?a=rejestracja&id=2"><i class="fa fa-circle-o"></i>Praktyka, staż, itp.</a></li>
            <li><a href="upowaznienia.php"><i class="fa fa-circle-o"></i> Przegląd</a></li>';
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>