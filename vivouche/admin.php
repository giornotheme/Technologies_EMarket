<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>CBD</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
</head>
<body>
  <?php include("header.php"); ?>
    <h1>Commandes</h1>
    <table>
      <tr>
        <th>ID de l'item</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse email</th>
        <th>Adresse postale</th>
        <th>Numéro de téléphone</th>
      </tr>
    <?php include("connexion_bdd.php");
    $reponse = $bdd->query('SELECT * FROM commande');
    while($donnees = $reponse->fetch()){?>
        <tr>
          <td><?php echo $donnees['idItem'];?></td>
          <td><?php echo $donnees['nom']; ?></td>
          <td><?php echo $donnees['prenom']; ?></td>
          <td><?php echo $donnees['email']; ?></td>
          <td><?php echo $donnees['postale']; ?></td>
          <td><?php echo $donnees['num']; ?></td>
        </tr>


    <?php
    }
    $reponse->closeCursor();
    ?>
      </table>

</body>
</html>
