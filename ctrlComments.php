<?php
require_once('lib/config.php');
require_once('lib/utils.php');
require_once('lib/Comment.class.php');
//correpsondnace objet avec la requete
$comment=new Commentaires();
$comment->setCommentaire($_POST['commentaire']);
$comment->setArticle($_POST['article_id']);
// si le commentaire est valide
if ($comment->valide()){
    try {
        // enregistre le commentaire
    $connexion->exec($comment->enregister());}
    catch (PDOException $e){
        die('Erreur '.$e->getMessage());
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //traitement si Ajax
        ?>
    <li>
        <h4>Vous <time datetime="<?php $comment->getDateCreation()->format('c'); ?>">Le <?php echo $comment->getDateFrance(); ?> </time></h4>
        <p><?php echo $comment->getCommentaire(); ?></p>
    </li>
    <?php
    } else {
        // sinon renvoi la vue index.php
        header('location: index.php');
    }
} else {
    //renvoi une erreur si pas de javascript et commentaire non rempli
    header('location: index.php?erreur=erreur');
}
?>

