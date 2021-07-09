<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Détail</title>
        <link rel="stylesheet" href="style.css"/>
        <script src="script.js"></script>
</head>


<body>

  <?php include("header.php");?>


  <div class="conteneur_details">
    <img class="image" src = "<?php echo $_POST['image'];?>" alt="image">
    <div class="conteneur_texte">
      <h1><?php echo $_POST['name'];?></h1>
      <p class="text_center"><?php echo $_POST['description'];?></p>
      <p class="text_center">Prix : <?php echo $_POST['price'];?>€</p>
        <form id="form" method="POST" action="">
          <fieldset class="conteneur_information">
            <legend> Vos coordonnées </legend>
            <button onclick="hideCoordonnees()" style="position: absolute;right:10px;top:-1em;outline:5px solid #fff">
              <img src="http://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/16/Close-2-icon.png"/>
            </button>
            <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"/>
            <input type="hidden" name ="name" value="<?php echo $_POST['name'];?>" readonly/>
            <input type="hidden" name ="image" value="<?php echo $_POST['image'];?>" readonly/>
            <input type="hidden" name ="description" value="<?php echo $_POST['description'];?>" readonly/>

            <label> Nom : </label> <input type="text" name="nom" required/>
            <label> Prénom : </label> <input type="text" name="prenom" required/>
            <label> Adresse e-mail : </label> <input type="email" name="email" required/>
            <label> Adresse postale : </label> <input type="text" name="postale" required/>
            <label> Numéro de téléphone : </label> <input type="number" name="num" required/>
            <input class="button" type="submit" name="submit" value = "Acheter" style="margin-top:1em;"/>
          </fieldset>

        </form>

        <?php
          if(isset($_POST["submit"]))
          {
            if(!empty($_POST["nom"]) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['postale']) AND !empty($_POST['num']) )
            {
              $nom = htmlspecialchars($_POST['nom']);
              $prenom = htmlspecialchars($_POST['prenom']);
              $email = htmlspecialchars($_POST['email']);
              $postale = htmlspecialchars($_POST['postale']);
              $num = htmlspecialchars($_POST['num']);
              $id = htmlspecialchars($_POST['id']);

              include("connexion_bdd.php");
              $req = $bdd->prepare('INSERT INTO commande ( idItem, nom, prenom, email, postale, num) VALUES(:idItem, :nom, :prenom, :email, :postale, :num)');
              $req->bindValue(':idItem', $id, PDO::PARAM_STR);
              $req->bindValue(':nom', $nom, PDO::PARAM_STR);
              $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
              $req->bindValue(':email', $email, PDO::PARAM_STR);
              $req->bindValue(':postale', $postale, PDO::PARAM_STR);
              $req->bindValue(':num', $num, PDO::PARAM_STR);
              $req->execute();

              echo '<script>alert("Votre commande a bien été pris en compte !")</script>';
            }
            else {
              echo '<script>alert("Veuillez compléter les champs")</script>';
            }
          }

        ?>

      <button id="button" class="button" type="button" onclick="showCoordonnees()"> Acheter </button>
    </div>
  </div>

  <div class="display_column">
    <h1> Test de <?php echo($_POST['name']);?></h1>
    <div class="conteneur_test">
      <div class="plus">
        <h1>Les points forts</h1>
          <?php
          $id=$_POST['id'];
          include("connexion_bdd.php");
          $reponse = $bdd->query("SELECT strength
                                  FROM test t INNER JOIN article a
                                  ON t.id_article = '$id'");

          $donnees = $reponse->fetch();
          echo nl2br($donnees['strength']);
          ?>
      </div>
      <div class="moins">
        <h1>Les points faibles</h1>
          <?php
          $id=$_POST['id'];
          include("connexion_bdd.php");
          $reponse = $bdd->query("SELECT weakness, price
                                  FROM test t INNER JOIN article a
                                  ON t.id_article = '$id'");

          $donnees = $reponse->fetch();
          echo nl2br($donnees['weakness']);
          ?>
      </div>
    </div>
  </div>

  <div class="display_row">
    <div class="display_column comment">
      <h2 style="margin-left:1em;">Commentaires</h2>
        <?php
          include("connexion_bdd.php");
          $reponse = $bdd->query("SELECT c.name, c.note, c.comment
                                  FROM comment c
                                  WHERE c.id_article = '$id'");?>
          <div class="display_column">
          <?php while($donnees = $reponse->fetch()){?>

              <p class="info_comment">
              <?php echo $donnees['name'];?><br>
              <?php echo $donnees['note'];?>/5<br>
              <?php echo $donnees['comment']; ?>
              </p>

          <?php
          }
          $reponse->closeCursor();
         ?>
         </div>
    </div>
    <div class="form">
      <form id="form" method="POST" action="">
        <fieldset class="conteneur_information">
          <legend> Vos informations </legend>
          <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"/>
          <input type="hidden" name ="name" value="<?php echo $_POST['name'];?>" readonly>
          <input type="hidden" name ="description" value="<?php echo $_POST['description'];?>" readonly>
          <input type="hidden" name ="image" value="<?php echo $_POST['image'];?>" readonly>

          <input type="hidden" name ="idArticle" value="<?php echo $id;?>" readonly>
          <label> Prénom et Nom : </label> <input type="text" name="nom" required/>
          <label> Note : </label> <input type="number" name="note" min="1" max="5" placeholder="min 1 / max 5" required/>
          <label> Commentaire : </label> <textarea name="comment" rows="7" cols="40"></textarea>
          <input class="button" type="submit" name="submitComment" value = "Commenter" style="margin-top:1em;"/>
        </fieldset>
      </form>
      <?php
        if(isset($_POST["submitComment"]))
        {
          if(!empty($_POST["nom"]) AND !empty($_POST['note']) AND !empty($_POST['comment']) )
          {
            $nom = htmlspecialchars($_POST['nom']);
            $comment = htmlspecialchars($_POST['comment']);
            $note = htmlspecialchars($_POST['note']);
            $idArticle = htmlspecialchars($_POST['idArticle']);

            include("connexion_bdd.php");
            $req = $bdd->prepare('INSERT INTO comment ( name, note, comment, id_article) VALUES(:name, :note, :comment, :id_article)');
            $req->bindValue(':name', $nom, PDO::PARAM_STR);
            $req->bindValue(':note', $note, PDO::PARAM_STR);
            $req->bindValue(':comment', $comment, PDO::PARAM_STR);
            $req->bindValue(':id_article', $idArticle, PDO::PARAM_STR);
            $req->execute();

            echo '<script>alert("Votre commentaire a bien été posté !")</script>';
          }
          else {
            echo '<script>alert("Veuillez compléter les champs")</script>';
          }
        }

      ?>
    </div>
  </div>

</body>
</html>

<script>
hideCoordonnees();
</script>
