<?php

class Commentaires{
    private $article_id;
    private $dateCreation;
    private $commentaire;
    
    public function getArticle(){
        return $this->article_id;        
    }
    
    public function setArticle($article_id){
        $this->article_id=$article_id;        
    }
    
    public function getCommentaire(){
        return $this->commentaire;        
    }
    
    public function setCommentaire($commentaire){
        $this->commentaire=htmlspecialchars($commentaire);
    }
    
    public function getDateCreation(){
        return $this->dateCreation;        
    }
    
    public function setDateCreation($dateCreation){
        $this->dateCreation=$dateCreation;        
    }
   
    
    public function enregister(){
        $this->dateCreation= date_create('now');
        $date=$this->dateCreation->format('Y-m-d H:i:s');
        return "insert into commentaires(commentaires ,dateCreation,pages_id) values ('$this->commentaire','$date','$this->article_id')";
    }
    
    public function actualiserFromSql($row){
        $this->commentaire=$row['commentaires'];
        $this->article_id=$row['pages_id'];
        $this->dateCreation=new DateTime($row['dateCreation']);
    }
    
    public function getDateFrance(){
        return franciseMaDate($this->dateCreation->format('d M Y à G:i'));
    }
    
    public function valide(){
     return ($this->commentaire=="")? false : true;
    }
    
}
?>