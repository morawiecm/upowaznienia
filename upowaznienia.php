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

//print_r($_POST);
?>


<?php
include 'gora.php';
include 'pasek.php';
include 'menu.php';
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Upoważnienia
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Upoważnienia- rejestracja</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <?php
                if($a=='rejestracja')
                {

                    echo"<p>Nadawanie upoważnień dla grupy: $nazwa_grupy</p>";
                if ($uzytkownik_grupa=='1')
                {
                    echo"<table class='table table-striped table-bordered'><form method='post' action='upowaznienia.php?a=zapisz_wniosek'>";
                    echo "<tr>";
                        echo "<th>Typ Osoby:</th>";
                        echo "<td><select name='typ_osoby' class='form-control'>";
                    if($nrID=='1')
                    {
                        echo"<option value='2' selected>Pracownik</option>
                                    <option value='3'>Praktykant, stażysta</option>";
                    }
                    elseif ($nrID=='2')
                    {
                        echo "<option value='2'>Pracownik</option>
                                    <option value='3' selected>Praktykant, stażysta</option>";
                    }
                    else{
                    echo"<option value='1'>Funkcjonariusz</option>";
                    }


                                   // <option value='2'>Pracownik</option>
                                  //  <option value='3'>Praktykant, stażysta</option>
                                    echo"</select>
                              </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nr kadrowy</th>";
                    echo "<td><input type='text' class='form-control' name='nr_kadrowy' placeholder='Tutaj wpisz nadany nr kadrowy'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Imię</th>";
                    echo "<td><input type='text' class='form-control' name='imie' placeholder='Tutaj wpisz imię'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nazwisko</th>";
                    echo "<td><input type='text' class='form-control' name='nazwisko' placeholder='Tutaj wpisz nazwisko'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data nadania</th>";
                    echo "<td><input type='text' class='form-control' name='data_nadania' id='datepicker' value='2016-10-03'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data ustania</th>";
                    echo "<td><input type='text' class='form-control' name='data_ustania' id='datepicker2'></td>";
                    echo "</tr>";
                    echo "<tr><th colspan='2'><input type='submit' value='Zapisz upoważnienie' class='btn btn-primary form-control' name='przycisk_zapisz_wnioske'></th></tr>";
                    echo"</form></table>";
                }
                elseif($uzytkownik_grupa=='2')
                {
                    echo"<table class='table table-striped table-bordered'><form method='post' action='upowaznienia.php?a=zapisz_wniosek'>";
                    echo "<tr>";
                    echo "<th>Typ Osoby:</th>";
                    echo "<td><select name='typ_osoby' class='form-control'>
                                    <option value='1'>Funkcjonariusz</option>
                              </select></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nr kadrowy</th>";
                    echo "<td><input type='text' class='form-control' name='nr_kadrowy' placeholder='Tutaj wpisz nadany nr kadrowy'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Imię</th>";
                    echo "<td><input type='text' class='form-control' name='imie' placeholder='Tutaj wpisz imię'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nazwisko</th>";
                    echo "<td><input type='text' class='form-control' name='nazwisko' placeholder='Tutaj wpisz nazwisko'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data nadania</th>";
                    echo "<td><input type='text' class='form-control' name='data_nadania' id='datepicker' value='2016-10-03'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data ustania</th>";
                    echo "<td><input type='text' class='form-control' name='data_ustania' id='datepicker2'></td>";
                    echo "</tr>";
                    echo "<tr><th colspan='2'><input type='submit' value='Zapisz upoważnienie' class='btn btn-primary form-control' name='przycisk_zapisz_wnioske'></th></tr>";
                    echo"</form></table>";
                }
                elseif($uzytkownik_grupa=='3')
                {

                    echo"<table class='table table-striped table-bordered'><form method='post' action='upowaznienia.php?a=zapisz_wniosek'>";
                    echo "<tr>";
                    echo "<th>Typ Osoby:</th>";

                    echo "<td><select name='typ_osoby' class='form-control'>";
                                if($nrID=='1')
                                {
                                    echo"<option value='2' selected>Pracownik</option>
                                    <option value='3'>Praktykant, stażysta</option>";
                                }
                                elseif ($nrID=='2')
                                {
                                    echo "<option value='2'>Pracownik</option>
                                    <option value='3' selected>Praktykant, stażysta</option>";
                                }

                    echo "</select></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nr kadrowy</th>";
                    echo "<td><input type='text' class='form-control' name='nr_kadrowy' placeholder='Tutaj wpisz nadany nr kadrowy'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Imię</th>";
                    echo "<td><input type='text' class='form-control' name='imie' placeholder='Tutaj wpisz imię'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Nazwisko</th>";
                    echo "<td><input type='text' class='form-control' name='nazwisko' placeholder='Tutaj wpisz nazwisko'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data nadania</th>";
                    echo "<td><input type='text' class='form-control' name='data_nadania' id='datepicker' value='2016-10-03'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Data ustania</th>";
                    echo "<td><input type='text' class='form-control' name='data_ustania' id='datepicker2'></td>";
                    echo "</tr>";
                    echo "<tr><th colspan='2'><input type='submit' value='Zapisz upoważnienie' class='btn btn-primary form-control' name='przycisk_zapisz_wnioske'></th></tr>";
                    echo"</form></table>";
                }
                else
                {
                    echo"Użytkownikowi $użytkownik_imie_nazwisko nie przypisano żadnej grupy!. Zgłoś się do administratora";
                }

                }
                elseif($a=='zapisz_wniosek')
                {
                    if(isset($_POST['przycisk_zapisz_wnioske']))
                    {
                        $wniosek_typ_osoby=$_POST['typ_osoby'];
                        $wniosek_nr_kadrowy=$_POST['nr_kadrowy'];
                        $wniosek_imie = mb_convert_case($_POST['imie'],MB_CASE_TITLE,"UTF-8");
                        $wniosek_nazwisko = mb_convert_case($_POST['nazwisko'], MB_CASE_UPPER, "UTF-8");
                        $wniosek_imie_nazwisko = $wniosek_nazwisko." ".$wniosek_imie;
                        $wniosek_data_nadania = $_POST['data_nadania'];
                        $wniosek_data_ustania = $_POST['data_ustania'];
                        $data_wniosku= date("Y-m-d H:i:s");

                        $wniosek_nr_wniosku=PobierzNrWniosku();
                        $wniosek_nr_caly = $wniosek_nr_wniosku;

                        $zapisz_wniosek=mysqli_query($polaczenie,"INSERT INTO ewidencja_upowaznienia (id_usera_rejestracja, data_rejestracji, nr_kadrowy, imie_nazwisko, nr_upowaznienia, typ_wniosku, data_nadania, data_ustania)
                        VALUES ('$uzytkownik_id','$data_wniosku','$wniosek_nr_kadrowy','$wniosek_imie_nazwisko','$wniosek_nr_caly','$wniosek_typ_osoby','$wniosek_data_nadania','$wniosek_data_ustania')")
                            or die("Bład przy zapisz_wniosek: ".mysqli_error($polacznie));
                        $nr_rekordu_ostaniego=mysqli_insert_id($polaczenie);
                        echo "<p> Zapisano pomyslnie.<a href='upowaznienia.php'>POWRÓT</a> lub 
                        <a href='genreuj_wniosek.php?id=$nr_rekordu_ostaniego'>Generuj wniosek do druku dla $wniosek_imie_nazwisko</a> </p>";
                        ZwiekszNrWniosku($wniosek_nr_wniosku);
                    }
                }
                elseif ($a=='usun')
                {
                    if(isset($nrID))
                    {
                        $usun_upowaznienie=mysqli_query($polaczenie,"DELETE FROM ewidencja_upowaznienia WHERE id ='$nrID'")
                            or die("Bład przy usun_upowaznianie: ".mysqli_error($polaczenie));
                        echo "Usunięto pomyślnie rekord. <a href='upowaznienia.php'>Powrót</a>";
                    }
                }
                elseif ($a=='edycja')
                {
                    if (isset($nrID))
                    {
                        $pobierz_wpis = mysqli_query($polaczenie,"SELECT nr_kadrowy, imie_nazwisko, data_nadania, data_ustania, typ_wniosku, data_szkolenia, nr_upowaznienia, kto_edytowal, data_edycji FROM ewidencja_upowaznienia WHERE id  = '$nrID'")
                            or die("Bład przy pobierz_wpis".mysqli_error($polaczenie));
                        if(mysqli_num_rows($pobierz_wpis)>0)
                        {
                            while ($wpis=mysqli_fetch_array($pobierz_wpis))
                            {
                                $nazwa_grupy_wnioske ='';
                                echo"<table class='table table-striped table-bordered'><form method='post' action='upowaznienia.php?a=aktualizuj_wniosek'>";
                                echo "<tr><th>Nr upowaznienia: </th><td><input type='text' value='$wpis[nr_upowaznienia]'  class='form-control' disabled></td></tr>";
                                echo "<tr>";
                                echo "<th>Typ Osoby:</th>";
                                echo "<td><select name='typ_osoby' class='form-control'>";
                                if($wpis['typ_wniosku']=='1'){
                                    $nazwa_grupy_wnioske ='Funkcjonariusz';
                                }
                                elseif($wpis['typ_wniosku']=='2'){
                                    $nazwa_grupy_wnioske ='Pracownik';
                                }
                                elseif($wpis['typ_wniosku']=='3'){
                                    $nazwa_grupy_wnioske ='Praktykant, stażysta';
                                }
                                echo "<option value='$wpis[typ_wniosku]'>$nazwa_grupy_wnioske</option>";
                                echo"<option value='1'>Funkcjonariusz</option>
                                    <option value='2'>Pracownik</option>
                                    <option value='3'>Praktykant, stażysta</option>
                                    </select>
                                    </td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Nr kadrowy</th>";
                                echo "<td><input type='text' class='form-control' name='nr_kadrowy' value='$wpis[nr_kadrowy]'></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Nazwisko i Imię</th>";
                                echo "<td><input type='text' class='form-control' name='imie_nazwisko' value='$wpis[imie_nazwisko]'></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Data nadania</th>";
                                echo "<td><input type='text' class='form-control' name='data_nadania' id='datepicker' value='$wpis[data_nadania]'></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Data ustania</th>";
                                echo "<td><input type='text' class='form-control' name='data_ustania' id='datepicker2' value='$wpis[data_ustania]'></td>";
                                echo "</tr>";
                                echo "<tr><th>Data szkolenia:</th><td><input type='text' name='data_szkolenia' class='form-control' id='datepicker3' value='$wpis[data_szkolenia]' ";
                                if($uzytkownik_grupa!='1')
                                {
                                    echo " disabled='disabled'>";
                                }
                                else
                                {
                                    echo ">";
                                }
                                echo "</td></tr>";
                                echo "<tr><th colspan='2'><input type='hidden' name='nr_id' value='$nrID'><input type='submit' value='Aktualizuj upoważnienie' class='btn btn-warning form-control' name='przycisk_aktualizuj_wnioske'></th></tr>";
                                if($uzytkownik_grupa=='1')
                                {
                                    echo "<tr><th colspan='2'><a href='upowaznienia.php?a=wyczysc&id=$nrID' class='btn bg-fuchsia form-control'>Usun date szkolenia</a> </th></tr>";

                                }
                                echo"</form></table>";
                                if($wpis['kto_edytowal']!='0')
                                {
                                    $kto_edytowal = PobierzImieNazwisko($wpis['kto_edytowal']);
                                    echo "<p>Edytował ostatnio: $kto_edytowal Data: {$wpis['data_edycji']}</p>";
                                }
                            }
                        }

                    }
                }
                elseif ($a=='wyczysc')
                {
                    UstawDatePoczatkowa($nrID);
                    echo "<p>Ustawiono nowa datę <a href='upowaznienia.php'>Powrót</a> </p>";
                }
                elseif ($a=='aktualizuj_wniosek')
                {
                    if(isset($_POST['przycisk_aktualizuj_wnioske']))
                    {
                        $zapytanie = "";
                        $upo_typ = $_POST['typ_osoby'];
                        $upo_nr_kadrowy = trim($_POST['nr_kadrowy']);
                        $upo_imie_nazwisko = trim($_POST['imie_nazwisko']);
                        $upo_data_nadania = $_POST['data_nadania'];
                        $upo_data_ustania = $_POST['data_ustania'];
                        $upo_nr_id_rek = $_POST['nr_id'];
                        $upo_data_edycji = date("Y-m-d H:i:s");
                        $upo_data_szkolenia = $_POST['data_szkolenia'];
                        $upo_data_szkolenia = strtotime($upo_data_szkolenia);
                        $upo_data_szkolenia = date("Y-m-d",$upo_data_szkolenia);

                        if($upo_data_szkolenia!='' && $upo_data_szkolenia > '2000-00-00')
                        {
                            $zapytanie = "UPDATE ewidencja_upowaznienia SET typ_wniosku = '$upo_typ',nr_kadrowy ='$upo_nr_kadrowy', imie_nazwisko = '$upo_imie_nazwisko', data_nadania = '$upo_data_nadania', data_ustania = '$upo_data_ustania', 
                        data_szkolenia = '$upo_data_szkolenia', kto_edytowal = '$uzytkownik_id', data_edycji = '$upo_data_edycji' WHERE id = '$upo_nr_id_rek'";

                        }
                        else
                        {
                        $zapytanie = "UPDATE ewidencja_upowaznienia SET typ_wniosku = '$upo_typ',nr_kadrowy ='$upo_nr_kadrowy', imie_nazwisko = '$upo_imie_nazwisko', data_nadania = '$upo_data_nadania', data_ustania = '$upo_data_ustania', 
                         kto_edytowal = '$uzytkownik_id', data_edycji = '$upo_data_edycji' WHERE id = '$upo_nr_id_rek'";

                        }

                        $aktualizujUpowaznienie = mysqli_query($polaczenie,$zapytanie)
                            or die("Blad przy aktualizujUpowaznienie: ".mysqli_error($polaczenie));
                        echo "<p>Zaktualizowano pomyslnie upoważnienie <a href='upowaznienia.php'>Powrót</a></p>";
                    }
                }
                else
                {
                    echo "<p>Przegląd wnosków wedle uprawnień dla grupy: $nazwa_grupy</p>";
                    echo "<a href='eksport.php' class='btn btn-success'>Eksportuj do Excela</a>";
                    if($uzytkownik_grupa=='1')
                    {

                        $wyswietl_ewidencje=mysqli_query($polaczenie,"SELECT nr_kadrowy, imie_nazwisko, nr_upowaznienia, data_nadania, data_ustania,id, data_szkolenia FROM ewidencja_upowaznienia ORDER BY data_nadania DESC");
                    }
                    elseif ($uzytkownik_grupa=='2')
                    {
                        $wyswietl_ewidencje=mysqli_query($polaczenie,"SELECT nr_kadrowy, imie_nazwisko, nr_upowaznienia, data_nadania, data_ustania, id FROM ewidencja_upowaznienia WHERE typ_wniosku= '1' ORDER BY data_nadania DESC");

                    }
                    elseif ($uzytkownik_grupa=='3')
                    {
                        $wyswietl_ewidencje=mysqli_query($polaczenie,"SELECT nr_kadrowy, imie_nazwisko, nr_upowaznienia, data_nadania, data_ustania, id FROM ewidencja_upowaznienia WHERE typ_wniosku ='2' OR typ_wniosku ='3' ORDER BY data_nadania DESC");

                    }
                    else
                    {
                        echo "Blad nie przypisano grupy! Zgłoś sie do Administratora Systemu!";
                    }
                    $data_dzis=date("Y-m-d");
                    echo "<table class='table table-striped table-bordered' id='example1'>";
                    echo "<thead><tr><th>Nr Kadrowy</th><th>Nazwisko i Imię</th><th>Nr upowaznienia</th><th>Data nadania</th><th>Data ustania</th>";
                    if($uzytkownik_grupa=='1')
                    {
                        echo "<th>Data Szkolenia</th>";
                    }
                    echo "<th>AKCJA</th></tr></thead>";
                    if(mysqli_num_rows($wyswietl_ewidencje)>0)
                    {
                        while ($ewidencja=mysqli_fetch_array($wyswietl_ewidencje))
                        {
                            echo "<tr><td>$ewidencja[nr_kadrowy]</td><td>$ewidencja[imie_nazwisko]</td><td>$ewidencja[nr_upowaznienia]</td><td>$ewidencja[data_nadania]</td><td>$ewidencja[data_ustania]</td>";
                            if($uzytkownik_grupa=='1')
                            {
                                echo "<td>$ewidencja[data_szkolenia]</td>";
                            }
                            echo "<td>
                            <a href='genreuj_wniosek.php?id=$ewidencja[id]' class='btn-sm btn-primary'>PDF</a>
                            <a href='upowaznienia.php?a=edycja&id=$ewidencja[id]' class='btn-sm btn-info'>EDYCJA</a>";
                            if($uzytkownik_grupa=='1')
                            {
                                if($ewidencja['data_ustania']<$data_dzis && $ewidencja['data_ustania']!='0000-00-00')
                                {
                                    echo"<a href='upowaznienia.php?a=usun&id=$ewidencja[id]' class='btn-sm btn-danger'>USUŃ</a>";
                                }
                            }

                        echo"</td></tr>";
                        }
                    }

                    echo "</table>";
                }
                ?>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include'dol.php'; ?>
