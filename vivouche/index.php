<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="carousel_style.css"/>
        <script src="script.js"></script>
</head>
  <!-- Slideshow container -->
    <?php include("header.php")?>
  <body>

   <div class="slideshow-container">

       <?php
       include("connexion_bdd.php");
       $reponse = $bdd->query('SELECT * FROM article LIMIT 5');

       while($donnees = $reponse->fetch()){?>

     <!-- Full-width images with number and caption text -->
     <div class="mySlides fade">
       <form method="post" action="details.php">
        <input type="hidden" name ="id" value="<?php echo $donnees['id'];?>" readonly>
        <input type="hidden" name ="name" value="<?php echo $donnees['name'];?>" readonly>
        <input type="hidden" name ="description" value="<?php echo $donnees['description'];?>" readonly>
        <input type="hidden" name ="image" value="<?php echo $donnees['image'];?>" readonly>
        <input type="hidden" name ="price" value="<?php echo $donnees['price'];?>" readonly>
        <input type="image" src="<?php echo $donnees['image'];?>" alt = "image" style="display: block; width:480px; height:480px; object-fit: cover; margin-left:auto; margin-right:auto;" >
       </form>
       <div class="text">
         <p><?php echo $donnees['name'];?></p>
         <p><?php echo $donnees['description'];?></p>
       </div>
     </div>

    <?php
      }
      $reponse->closeCursor();
    ?>
  <!-- Arrows button -->
     <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
     <a class="next" onclick="plusSlides(1)">&#10095;</a>
   </div>
   <br>



   <!-- The dots/circles -->
   <div style="text-align:center">
     <span class="dot" onclick="currentSlide(1)"></span>
     <span class="dot" onclick="currentSlide(2)"></span>
     <span class="dot" onclick="currentSlide(3)"></span>
     <span class="dot" onclick="currentSlide(4)"></span>
     <span class="dot" onclick="currentSlide(5)"></span>
   </div>

   <?php
   include("connexion_bdd.php");
   $reponse = $bdd->query('SELECT ROUND(AVG(note),1) AS avg, id_article
                           FROM comment
                           GROUP BY id_article
                          ');
   while($donnees = $reponse->fetch()){
     $req = $bdd->prepare('UPDATE article a, comment c SET a.note = :newNote WHERE a.id = :id_article');
     $req->execute(array(
       'newNote' => $donnees['avg'],
       'id_article' => $donnees['id_article']
     ));
   }?>

  </body>
</html>

 <script> currentSlide(1); </script>
