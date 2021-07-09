<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Articles</title>
        <link rel="stylesheet" href="style.css"/>
        <script src="script.js"></script>
</head>

<?php
include("header.php");
?>
  <body>
    <form class="display_row input_no_border" action="resultFilter.php" method="POST">
      <select class="" name="category">
        <option value="">Choisissez une catégorie</option>
        <option value="ordinateur fixe">Ordinateur fixe</option>
        <option value="MAC">Mac</option>
        <option value="android">Android</option>
        <option value="ios">iOS</option>
        <option value="souris">Souris</option>
        <option value="clavier">Clavier</option>
      </select>
      <select class="" name="color">
        <option value="">Choisissez une couleur</option>
        <option value="noir">Noir</option>
        <option value="blanc">Blanc</option>
        <option value="jaune">Jaune</option>
        <option value="gris">Gris</option>
        <option value="violet">Violet</option>
        <option value="vert">Vert</option>
      </select>
      <div class="inline">
        <label> Choisissez une fourchette de prix: </label>
        <input type="number" name="priceMin" placeholder="minimum"/>
        <input type="number" name="priceMax" placeholder="maximum"/>
      </div>
      <input type="submit" value="Rechercher"/>
    </form>
    <?php
    include("connexion_bdd.php");
    $reponse = $bdd->query('SELECT a.name, a.image, a.price, a.id, a.description, a.note
                            FROM article a
                            LEFT JOIN comment c ON a.id = c.id_article
                            GROUP BY a.id');

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
