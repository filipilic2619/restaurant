<?php
include ("includes/functions.php");
echo "
    <table id='tabela1'>
    <th></th>
    <th>&nbsp;&nbsp;00-01</th>
    <th>&nbsp;&nbsp;01-02</th>
    <th>&nbsp;&nbsp;02-03</th>
    <th>&nbsp;&nbsp;03-04</th>
    <th>&nbsp;&nbsp;04-05</th>
    <th>&nbsp;&nbsp;05-06</th>
    <th>&nbsp;&nbsp;06-07</th>
    <th>&nbsp;&nbsp;07-08</th>
    <th>&nbsp;&nbsp;08-09</th>
    <th>&nbsp;&nbsp;09-10</th>
    <th>&nbsp;&nbsp;10-11</th>
    <th>&nbsp;&nbsp;11-12</th>
    <th>&nbsp;&nbsp;12-13</th>
    <th>&nbsp;&nbsp;13-14</th>
    <th>&nbsp;&nbsp;14-15</th>
    <th>&nbsp;&nbsp;15-16</th>
    <th>&nbsp;&nbsp;16-17</th>
    <th>&nbsp;&nbsp;17-18</th>
    <th>&nbsp;&nbsp;18-19</th>
    <th>&nbsp;&nbsp;19-20</th>
    <th>&nbsp;&nbsp;20-21</th>
    <th>&nbsp;&nbsp;21-22</th>
    <th>&nbsp;&nbsp;22-23</th>
    <th>&nbsp;&nbsp;23-24</th>

";

$stolovi= svistolovi();

foreach ($stolovi as $sto)
{
    echo "<tr>";
    echo "<td>$sto</td>";

    $rezervacije = rezervisanizadatum($_POST["datum"], $sto);
    for ($i=0; $i<24; $i++)
    {
        $v=strval($i);
        if (strlen($v)==1)
        {
            $v="0" . $v;
        }

        if (in_array($v, $rezervacije))
        {
            echo "<td class='crveno'></td>";
        } else
        {
            echo "<td class='zeleno'></td>";
        }



    }
    echo "</tr>";
}

echo "</table>";





?>