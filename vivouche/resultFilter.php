<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Résultat du filtre</title>
        <link rel="stylesheet" href="style.css"/>
        <script src="script.js"></script>
</head>
  <?php include("header.php")?>
  <?php include("connexion_bdd.php");?>
<body>
  <?php
    $resultPriceMin = $_POST['priceMin'];
    $resultPriceMax = $_POST['priceMax'];
    $resultCategory = $_POST['category'];
    $resultColor = $_POST['color'];
    $reponse = $bdd->query("SELECT a.name, c.note, a.image, a.price, a.id, a.description, a.price, a.category, a.color, a.note
                            FROM article a
                            LEFT JOIN comment c ON a.id = c.id_article
                            WHERE a.category = '$resultCategory' OR a.color = '$resultColor' OR a.price BETWEEN '$resultPriceMin' AND '$resultPriceMax'
                            GROUP BY a.id");
    while($donnees = $reponse->fetch()){?>

      <div class="display_column">
        <form class="display_row" action="details.php" method="post">
          <img src="<?php echo $donnees['image']; ?>" alt="image" class="image_articles">
          <input type="hidden" name="id" value="<?php echo $donnees['id'];?>"/>
          <input type="hidden" name ="name" value="<?php echo $donnees['name'];?>" readonly>
          <input type="hidden" name ="description" value="<?php echo $donnees['description'];?>" readonly>
          <input type="hidden" name ="image" value="<?php echo $donnees['image'];?>" readonly>
          <input type="hidden" name ="price" value="<?php echo $donnees['price'];?>" readonly>
          <div class="display_column details_articles">
            <h3 class="text_center"><?php echo $donnees['name']; ?></h3>
            <p class="text_center">Note : <?php echo $donnees['note']; ?></p>
            <p class="text_center">Prix : <?php echo $donnees['price']; ?>€</p>
            <input class="button" type="submit" value = "En savoir plus..." style="margin-top:1em;"/>
          </div>
        </form>

      </div>

    <?php
    }
    $reponse->closeCursor();
    ?>


</body>
</html>
