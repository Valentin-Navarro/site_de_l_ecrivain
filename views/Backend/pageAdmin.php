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
          <textarea class="tinymce" name="content" id="content" required></textarea>
          </p>
        </td> 
      </tr>
    </table>  

    <input type="submit" value="Envoyer"/>

  </form>

  <h3> Commentaires à Approuver </h3>
  <ul>
    <?php while ($comment=commentaires->fetch()){ ?>
    <li><?=$comment['id']?> : <?=$comment['author']?> : <?=$comment['comment']?><?php if ($comment['approuve'] == 0) { ?> - <a href="index.php?type=commentaire&approuve=<?= $c['id'] ?>">Approuver</a><?php } ?> - <a href="index.php?type=commentaire&supprime=<?= $c['id'] ?>">Supprimer</a></li>
    <?php } ?>  
  </ul>
  <br /><br />
  <ul>
    <?php while($membre = $membres->fetch()){ ?>
    <li><?=$membre['id']?> : <?=$membre['pseudo']?><?php if($membre['confirme'] == 0) {?> -  <a href="index.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>

    // afficher un formulaire avec les commentaires , et bouton destroy 