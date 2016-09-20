<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 2016-09-20
 * Time: 10:35
 */

function PobierzNrWniosku()
{
    $polaczenie= polaczenie_z_baza();
    $nr_wniosku='';
    $pobierzNrWniosku=mysqli_query($polaczenie,"SELECT tresc FROM ustawienia WHERE id = '2'")
        or die("Blad przy pobierzNrWniosku: ".mysqli_error($polaczenie));
    if(mysqli_num_rows($pobierzNrWniosku)>0)
    {
        while ($NrWniosku=mysqli_fetch_array($pobierzNrWniosku))
        {
            $nr_wniosku=$NrWniosku['tresc'];
            $nr_wniosku++;
        }
    }
    return $nr_wniosku;
}
function ZwiekszNrWniosku($nr_wniosku)
{
    $polacznie = polaczenie_z_baza();
    $zwiekszNrWniosku=mysqli_query($polacznie,"UPDATE ustawienia SET tresc = '$nr_wniosku' WHERE id = '2'")
        or die("Bład przy zwiekszNrWniosku: ".mysqli_error($polacznie));
}