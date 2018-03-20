<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>
<?php 
    $etat = array_key_exists('pseudo',$_SESSION);

?>

<?php if ($etat == true) { ?> 
    <p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p>
    <form method="POST" action="index.php?action=deconnexion">
        <input type ="submit" name="deconnexion" value="Se déconnecter"/>
    </form>


<h3> Nouvel Article </h3>
<form method="post" action="index.php?action=addArticle">
    <table>
      <tr>
        <td>
          <p>
            <label for ="author"> Votre pseudo </label> :<input type="text" name="author" id="author" required />
          </p>

          <p>

          <label for ="title"> Titre </label> :<input type="titre" name="title" id="title" required /></br>
          <label for ="content">Contenu </label>
          <textarea name="content" id="content" required></textarea>
          </p>
        </td> 
      </tr>
    </table>  

    <input type="submit" value="Envoyer"/>

  </form>

  <h3> Commentaires à Approuver </h3>

<?php while ($data = $posts->fetch()) { ?>
   
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                le <?= $data['creation_date_fr'] ?>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a>
            </p>
        </div>
    <?php } ?>
    // afficher un formulaire avec les commentaires , et bouton destroy 