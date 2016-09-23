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



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
<?php

/**
 * @author mariusz morawiec
 * @copyright 2012
 */
 







// wyświetlamy początek prostej tabelki
 
// filtrujemy id oraz rzutujemy je na int
$_GET['id'] = (int)clear($_GET['id']);
 
// pobieramy dane usera z podanego id
$user_data = get_user_data($_GET['id']);
 
 
// sprawdzamy czy znalazło użytkownika
// jeśli nie to wyświetlamy komunikat
// a jeśli tak to wyświetlamy wszystkie jego dane
// jeśli user nie ma podanej strony www lub skąd jest to wyświetlamy "brak"
if($user_data === false) {
    echo '<p>Niestety, taki użytkownik nie istnieje.</p>
        <p>[<a href="index.php">Powrót</a>]</p>';
} else {
    echo '<h2>Profil użytkownika</h2>
        <p>Login: <b>'.$user_data['user_name'].'</b></p>
        <P>Typ konta:';
    if($user_data['specialne']!='1')
    {
        echo(' użytkownik');
    }
    else{
        echo(' administrator');
    }
    echo'</p>
        <p>Imię i nazwsko:'.$user_data['imie'].' '.$user_data['nazwisko'].'</p>
        <p>Email: '.$user_data['user_email'].'</p>
        <p>Data rejestracji: '.date("d.m.Y, H:i", $user_data['user_regdate']).'</p>
        <p>Data ostatniego logowania: '.(empty($user_data['logowanie_data']) ? 'brak' : $user_data['logowanie_data']).' IP: '.$user_data['logowanie_ip'].'</p>
        <p>Wydział: '.(empty($user_data['wydzial']) ? 'brak' : $user_data['wydzial']).'</p>
        <p><a href="uzytkownicy.php?a=zmien_haslo" class="btn btn-success">Zmiana hasła</a></p>';
        //<p>Sekcja: '.(empty($user_data['sekcja']) ? 'brak' : $user_data['sekcja']).'</p>
       // <p><a href="uzytkownicy.php?a=edytuj_dane" class="btn btn-success">Zmiana danych</a></p>


        
}

?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include 'dol.php'; ?>
