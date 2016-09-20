<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="./dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo"$uzytkownik_imie $uzytkownik_nazwisko"; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Hasło wygasa za: XX dni</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Wyszukaj...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>MENU:

                <a href="index.php">
                    <i class="fa fa-dashboard"></i><span>Strona Główna</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Nadgodziny</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="nadgodziny.php?a=rejestracja"><i class="fa fa-circle-o"></i>Nowy wniosek</a></li>
                    <li><a href="nadgodziny.php"><i class="fa fa-circle-o"></i> Przegląd</a></li>
                    <?php
                    if($uzytkownik_funkcja>0 or $uzytkownik_uprawnienia==1)
                    {
                        echo '<li><a href="nadgodziny.php?a=przeglad_grupa"><i class="fa fa-circle-o"></i> Przegląd Grupy</a></li>';
                        echo '<li><a href="nadgodziny.php?a=przeglad_grupa_osoby"><i class="fa fa-circle-o"></i> Przegląd Grupy Osoby</a></li>';
                    }
                    ?>
                </ul>
            </li>
           <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="./layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="./layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="./layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="./widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
                </a>
            </li>

            <li>
                <a href="./calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li>
                <a href="../mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="./documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
            <li class="header">ADMINISTRACJA</li>
            <li><a href="uzytkownicy.php"><i class="fa fa-circle-o text-red"></i> <span>Użytkownicy</span></a></li>
            <li><a href="uzytkownicy_grupa.php"><i class="fa fa-circle-o text-yellow"></i> <span>Użytkownicy Grupy</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>