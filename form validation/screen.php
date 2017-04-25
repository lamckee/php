<html>
<head>
<style>
@font-face {
    font-family: Perogies;
    src: url(Tallys_15.otf);
    font-weight:400;
}
body {
 
    font-family: Perogies;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 10px;
}

tr:nth-child(even){background-color: #f2f2f2}
}
</style>
</head>
<body>
<h1> Information from Forms </h1>
<table>
<tr>
     <td> <b>Name</b> </td> 
     <td> <b>Email</b> </td>
     <td> <b>Website</b> </td>
     <td> <b>Comment</b> </td>
     <td> <b>Gender</b> </td>
     <td> <b>Telephone</b> </td>
     
</tr>

<?php
$row = 1;
if (($handle = fopen("testFile.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<td>" .$data[$c] . "</td>";
        }
        echo "</tr>";
    }
    fclose($handle);
}
?>
</table>
</body>

</html>
