
<table id="listAlternatif" class="table table-bordered table-bordered">
    <thead>
    <td>NIS</td>
    <td>Nama</td>
    <td>Vektor S</td>
    <td>Vektor V</td>
    <td>Rank</td>
</thead>
<tbody>
    <?php
    $no = 1;
    foreach ($vektor as $row) {
        echo "<tr><td>" . $row['nis'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['vektor_s'] . "</td>";
        echo "<td>" . $row['vektor_v'] . "</td>";
        echo "<td>" . $no . "</td></tr>";
        $no++;
    }
    ?>
</tbody>
</table>