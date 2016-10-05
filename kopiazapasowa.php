<?php

//System automatycznego backupu dodany do crona
include 'config.php';


$uprawienia= '1';
$imie_nazwisko='System backupu';
$data_backupu=date("Y-m-d H:i:s");


$a='';
if(isset($_REQUEST['a']))
{
    $a = trim($_REQUEST['a']);
}
if (isset($_REQUEST['id']))
{
    $nrID=trim($_REQUEST['id']);
}


$baza_nazwa='upowaznienia';
$baza_host='localhost';

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
    $zapisz_do_bazy=mysqli_query($polaczenie,"INSERT INTO backup (dataBackupu, nazwaBackupu, ktoUtworzyl) VALUES ('$data_backupu','$pelna_sciezka','$imie_nazwisko')") or die("blad przy zapisz_do_bazy".mysqli_error($polaczenie));

    } catch (PDOException $e) {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }

?>
