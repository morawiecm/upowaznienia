<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>

    <title>Ewidencja Upowaznieni - Export XLS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=ewidencja_upowaznien.xls");

// Add data table
include 'config.php';

$user_data = get_user_data();
$uzytkownik_grupa = $user_data['grupa'];
echo"<table>";
echo "<tr><td colspan='6' align='right' style='bold'> Załącznik nr 3</td></tr>";
echo "<tr><td colspan='6' align='right'>do Polityki bezpieczeństwa danych osobowych Koemndy Wojewódzkiej Policji w Gorzowie Wlkp.</td></tr>";
echo "<tr></tr>";
echo "<thead><tr><th colspan='6'>EWIDENCJA</th></tr>";
echo "<tr><th colspan='6'>osób upoważnionych do przetwarzania danych osobowych</th></tr>";
echo "<tr><th colspan='6'>w Komendzie Wojewódzkiej Policji w Gorzowie Wlkp.</th></tr>";
echo "<tr><th>Nr ID kadrowy*</th><th>Nazwisko i imię</th><th>Nr upoważnienia</th><th>zakres ** upoważnienia</th><th>Data nadania</th><th>Data ustania</th></tr></thead>";
if($uzytkownik_grupa =='1')
{
    $pobierzDaneDoZestawienia=mysqli_query($polaczenie," SELECT nr_kadrowy,imie_nazwisko,nr_upowaznienia,data_nadania,data_ustania FROM ewidencja_upowaznienia");
}
elseif ($uzytkownik_grupa =='2')
{
    $pobierzDaneDoZestawienia=mysqli_query($polaczenie," SELECT nr_kadrowy,imie_nazwisko,nr_upowaznienia,data_nadania,data_ustania FROM ewidencja_upowaznienia WHERE typ_wniosku = '1'");
}
elseif ($uzytkownik_grupa =='3')
{
    $pobierzDaneDoZestawienia=mysqli_query($polaczenie," SELECT nr_kadrowy,imie_nazwisko,nr_upowaznienia,data_nadania,data_ustania FROM ewidencja_upowaznienia WHERE  typ_wniosku = '2' OR typ_wniosku = '3'");
}
if(mysqli_num_rows($pobierzDaneDoZestawienia)>0)
{
    while ($odwiedziny=mysqli_fetch_array($pobierzDaneDoZestawienia))
    {
        echo "<tr><td>$odwiedziny[nr_kadrowy]</td><td>$odwiedziny[imie_nazwisko]</td><td>$odwiedziny[nr_upowaznienia]</td><td></td>
        <td>$odwiedziny[data_nadania]</td><td>$odwiedziny[data_ustania]</td></tr>";
    }
}
echo"<tr></tr>";
echo "<tr><td colspan='6'>* w przypadku braku ID kadrowego wpisujemy np. staż, praktyka</td></tr>";
echo "<tr><td colspan='6'>** zgodny z kartą opisu stanowska pracy i zakresem obowiązków</td></tr>";
echo"</table>";


?>