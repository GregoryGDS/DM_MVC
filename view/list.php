<table border="1" cellpadding="15" class="position_table">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
    </tr>

    <?php
     foreach  ($listeS as $unS) {
            echo "<tr>";
            echo "<td>".$unS['nom']."</td>";
            echo "<td>".$unS['prenom']."</td>";
            echo "</tr>";
      }
    ?>
</table>
