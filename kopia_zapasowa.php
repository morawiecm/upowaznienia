<?php
include 'config.php';
include './funkcje/funkcje_uzytkownicy.php';
include './funkcje/funkcje_wniosek.php';
check_login();
// dane uzytkownika z sesji
$user_data = get_user_data();
$uzytkownik_imie = $user_data['imie'];
$uzytkownik_nazwisko = $user_data['nazwisko'];
$uzytkownik_nazwa = $user_data['user_name'];
$uzytkownik_id = $user_data['user_id'];
$uzytkownik_wydzial = $user_data['wydzial'];
$uzytkownik_sekcja = $user_data['sekcja'];
$uzytkownik_grupa = $user_data['grupa'];
$uzytkownik_uprawnienia = $user_data['specialne'];
$uzytkownik_funkcja=$user_data['funkcja'];
$użytkownik_imie_nazwisko = $uzytkownik_imie . " " . $uzytkownik_nazwisko;
$nazwa_grupy = PobierzNazweGrupy($uzytkownik_grupa);
$data_aktualna = date("Y-m-d H:i:s");
//dane z POST

if(isset($_POST['dokument']))
{
    $dokument=$_POST['dokument'];
}
else
{
    $dokument='';
}

if ($uzytkownik_uprawnienia == 1) {
    $uprawienia = 'Administrator';
} else {
    $uprawienia = 'Użytkownik';
}

?>


<?php
include 'gora.php';
include 'pasek.php';
include 'menu.php';
?>

<!-- Content Wrapper. Contains page content -->

<?php

$baza_nazwa='upowaznienia';
$baza_host='localhost';

if($a=='wykonaj_kopie') {


    $backupsDir = 'upowaznienia/kopia_zapasowa';
    try {
        $pdo = new PDO("mysql:host=$baza_host;dbname=$baza_nazwa", DBUSER, DBPASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlResult = $pdo->query("SHOW tables FROM $baza_nazwa");


        $sqlData = "-- Data wykonania kopii: " . date('d.m.Y') . " r. o godzinie " . date('H:i') ."
        -- Baza: $dbName
        SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";";

        while ($queryTable = $sqlResult->fetch(PDO::FETCH_ASSOC)) {
            $sqlTable = $queryTable['Tables_in_' . $baza_nazwa];
            $sqlResultB = $pdo->query("SHOW CREATE TABLE $sqlTable");
            $queryTableInfo = $sqlResultB->fetch(PDO::FETCH_ASSOC);


            $sqlData .= "\n\n--
        -- Struktura dla tabeli `$sqlTable`
        --\n\n";
            $sqlData .= $queryTableInfo['Create Table'] . ";\n";
            $sqlData .= "\n\n--
        -- Wartości tabeli `$sqlTable`
        --\n\n";

            $sqlResultC = $pdo->query("SELECT * FROM $sqlTable");


            while ($queryRecord = $sqlResultC->fetch(PDO::FETCH_ASSOC)) {
                $sqlData .= "INSERT INTO `$sqlTable` VALUES (";
                $sqlRecord = '';
                foreach ($queryRecord as $sqlField => $sqlValue) {
                    $sqlRecord .= "'$sqlValue',";
                }
                $sqlData .= substr($sqlRecord, 0, -1);
                $sqlData .= ");\n";
            }
        }

        $naza_pliku = 'kopia_' . $baza_nazwa . '_' . date('d_m_Y_H_i_s') . '.sql';
        $pelna_sciezka = $backupsDir . '/' . $naza_pliku;
        file_put_contents($pelna_sciezka, $sqlData);
        $zapisz_do_bazy=mysqli_query($polaczenie,"INSERT INTO backup (dataBackupu, nazwaBackupu, ktoUtworzyl) VALUES ('$data_aktualna','$pelna_sciezka','$użytkownik_imie_nazwisko')") or die("blad przy zapisz_do_bazy".mysqli_error($polaczenie));
        echo"<!-- Page Content -->
        <div id='page-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                    <div class='alert alert-success'>";
        echo "Backup został zapisany. Nazwa pliku : $naza_pliku  <a href='kopia_zapasowa.php'>POWRÓT</a>";
        echo"</div>";

    } catch (PDOException $e) {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }
}
elseif($a=='wykonaj_kopie_system') {


    $backupsDir = 'upowaznienia/kopia_zapasowa';
    try {
        $pdo = new PDO("mysql:host=$baza_host;dbname=$baza_nazwa", DBUSER, DBPASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlResult = $pdo->query("SHOW tables FROM $baza_nazwa");


        $sqlData = "-- Data wykonania kopii: " . date('d.m.Y') . " r. o godzinie " . date('H:i') ."
        -- Baza: $dbName
        SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";";

        while ($queryTable = $sqlResult->fetch(PDO::FETCH_ASSOC)) {
            $sqlTable = $queryTable['Tables_in_' . $baza_nazwa];
            $sqlResultB = $pdo->query("SHOW CREATE TABLE $sqlTable");
            $queryTableInfo = $sqlResultB->fetch(PDO::FETCH_ASSOC);


            $sqlData .= "\n\n--
        -- Struktura dla tabeli `$sqlTable`
        --\n\n";
            $sqlData .= $queryTableInfo['Create Table'] . ";\n";
            $sqlData .= "\n\n--
        -- Wartości tabeli `$sqlTable`
        --\n\n";

            $sqlResultC = $pdo->query("SELECT * FROM $sqlTable");


            while ($queryRecord = $sqlResultC->fetch(PDO::FETCH_ASSOC)) {
                $sqlData .= "INSERT INTO `$sqlTable` VALUES (";
                $sqlRecord = '';
                foreach ($queryRecord as $sqlField => $sqlValue) {
                    $sqlRecord .= "'$sqlValue',";
                }
                $sqlData .= substr($sqlRecord, 0, -1);
                $sqlData .= ");\n";
            }
        }

        $naza_pliku = 'kopia_' . $baza_nazwa . '_' . date('d_m_Y_H_i_s') . '.sql';
        $pelna_sciezka =$backupsDir . "/" . $naza_pliku;
        $pelna_sciezka2 =$_SERVER['DOCUMENT_ROOT']."/". $backupsDir . "/" . $naza_pliku;
        file_put_contents($pelna_sciezka2, $sqlData);
        $zapisz_do_bazy=mysqli_query($polaczenie,"INSERT INTO backup (dataBackupu, nazwaBackupu, ktoUtworzyl) VALUES ('$data_aktualna','$pelna_sciezka','$użytkownik_imie_nazwisko')") or die("blad przy zapisz_do_bazy".mysqli_error($polaczenie));
        echo '
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Backup
            <small>Kopia ręczna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Backup</a></li>
            <li class="active">Kopia ręczna</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Utworzenie Kopii zapasowej</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">';
                    echo"<div class='alert alert-success'>";
        echo "Backup został zapisany. Nazwa pliku : $naza_pliku  <a href='kopia_zapasowa.php'>POWRÓT</a>";
        echo"</div>";
        echo '
            </div><!-- /.box-body -->
            
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->';

    } catch (PDOException $e) {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }
}
elseif($a=='usun') {
    if ($uzytkownik_uprawnienia = '1') {
        if (isset($_REQUEST['plik'])) {

            $pelna_sciezka = $_SERVER['DOCUMENT_ROOT'];
            $pelna_sciezka .= "/" . $_REQUEST['plik'];


            if (unlink($pelna_sciezka)) {
                echo"<!-- Page Content -->
        <div id='page-wrapper'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-lg-12'>
                    <div class='alert alert-success'>";
                echo "Usunieto plik $pelna_sciezka ";
                $usun_wpis = mysqli_query($polaczenie, "DELETE FROM backup WHERE id='$nrID'") or die("blad przy usun_wpis");
                echo "i wpis z bazy <a href='kopia_zapasowa.php'>POWRÓT</a>";
                echo"</div>";
            } else {
                echo '
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Backup
            <small>Kopia ręczna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Backup</a></li>
            <li class="active">Kopia ręczna</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Utworzenie Kopi zapasowej</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">';
                echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Blad przy usuwaniu pliku <a href="backup.php" class="btn btn-success">Powrót</a>
                  </div>';
                echo '
            </div><!-- /.box-body -->
            
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->';
            }

        }
    }
}

else
{
    echo'<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Backup
            <small>Lista kopii</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Backup</a></li>
            <li class="active">Lista kopii</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Lista kopii:</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">';

    echo"<p><a href='kopia_zapasowa.php?a=wykonaj_kopie_system' class='btn btn-success'>WYKONAJ KOPIE ZAPASOWĄ BAZY</a></p>";
    echo"<table class='table table-striped table-bordered table-hover'>";
    echo"<tr><th>DATA</th><th>UTWORZYŁ</th><th>ROZMIAR</th><th>AKCJA</th></tr>";
    $pobierzBackup_z_bazy=mysqli_query($polaczenie,"SELECT * FROM backup ORDER by id DESC ") or die("Blad przy pobierzBackup_z_bazy");
    if(mysqli_num_rows($pobierzBackup_z_bazy)>0)
    {

        while($daneBackup=mysqli_fetch_array($pobierzBackup_z_bazy))
        {
            $pelna_sciezka_pliku=$_SERVER['DOCUMENT_ROOT'].'/'.$daneBackup[2];
            //echo "$pelna_sciezka_pliku";
            $wielkosc_pliku=filesize($pelna_sciezka_pliku);
            $wielkosc_pliku=$wielkosc_pliku/1024;
            $wielkosc_pliku=number_format($wielkosc_pliku,0,'.','');
            $sciezka_kopia_bazy="http://".$_SERVER['SERVER_ADDR']."/".$daneBackup[2];
            echo "<tr><td>$daneBackup[1]</td><td>$daneBackup[3]</td><td>$wielkosc_pliku KB</td><td><a href='$sciezka_kopia_bazy' class='btn-sm btn-info'>POBIERZ</a> <a href='kopia_zapasowa.php?a=usun&id=$daneBackup[0]&plik=$daneBackup[2]' class='btn-sm btn-danger'>USUŃ</a></td></tr>";
        }
    }
    echo "</table>";



    echo"</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->";

}?>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'dol.php';?>
