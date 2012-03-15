<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IOR Web - PHP5 Web Developer Test</title>
        <meta name="description" content="Code is magic." />
        <link rel="stylesheet" href="css/core.css" type="text/css" media="screen" />
    </head>
    <body>       
        <section role="main">   
            <header><h2>Commentaires</h2></header>
            <ul>
            <?php
require_once('lib/config.php');
require_once('lib/utils.php');
require_once('lib/Comment.class.php');
$i=1;
// charge tous les commentaires
$sql="SELECT * FROM commentaires  WHERE pages_id=1 ORDER BY dateCreation";
$query=$connexion->query($sql);
$result=$query->fetchAll();

foreach($result as $row)
{   
    // pour chaque ligne de résultats crée l'objet
    $comment=new Commentaires();
    $comment->actualiserFromSql($row)
?>

<li>
    <h4>Utilisateur <?php echo $i++; ?> <time datetime="<?php $comment->getDateCreation()->format('c'); ?>">Le <?php echo $comment->getDateFrance(); ?> </time></h4>
    <p><?php echo $comment->getCommentaire(); ?></p>
</li>
<?php
}
?>
<!-- begin formulaire-->
                <li id="form">
                    <h4>Vous</h4>
                     <?php 
                    //si pas de traitement en ajax et retour erreur du ctrlComments
                    if (isset($_GET['erreur'])) : ?>
                            <div id="erreur">
                                Pas de commentaires
                            </div>
                    <?php endif; ?>     
                    
                    <form method="post" action="ctrlComments.php" >
                    <input id="article_id" type="hidden" name="article_id" value="1"/>
                    <p><textarea id="commentaire" name="commentaire" placeholder="Votre commentaire..." data-page="php5-web-developer-test"></textarea></p>
                    <button type="submit" id="submit">Envoyer</button>
                    </form>
                </li>
            </ul>
        </section>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
        <script src="js/core.js"></script>
        
       
        
    </body>
</html>
