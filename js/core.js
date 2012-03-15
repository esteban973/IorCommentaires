$(document).ready(function(){
    
    $('#form > form').submit(function(event){
    //évite l'envoi du formulaire
    event.preventDefault();
    //validation commentaires
    if($('#commentaire').val()==""){
        alert('Veuillez entre un commentaire');
        return false;
    }
    //envoi la requete
    $.ajax({
        url:'ctrlComments.php',
        type:"POST",
        data:$('#form > form').serialize(),
        success:function(data){
            //ajoute le contenu envoyé
            $('#form').before(data);
            //réinitialise le contenu du textarea
            $('textarea').val('');
        }
    })
})
    
})
