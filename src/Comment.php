<?php

/**
 * @class Comment
 */
   class Comment{

    protected $content;
    protected $state;
    protected $note;
    protected $date;
    protected $id;

   /**
    * Constructeur de commentaire
    * @param [type]  $content [description]
    * @param [type]  $note    [description]
    * @param integer $state   [description]
    */
    public function __construct($content, $note, $state = 1,PDO $bdd){
       $this->content = $content;
       $this->state = $state;
       $this->note = $note;
       $this->date = new DateTime(); // classe DateTime
       $this->bdd = $bdd;
     }


   /**
    * [insertLotComments insérer un commentaire]
    * @return [type] [description]
    */
   public static function insertLotComments($comment = [])
   {
     foreach ($comment as $value) {
       $value->insertComment();
     }

     return true;
   }


   public function insertComment($userId = null){

     var_dump($userId);
     var_dump($this);
     $sql = $this->bdd->prepare("INSERT INTO comment(user_id, content, note, created, state, article_id) VALUES (:userId, :content, :note, :date_creation, :state, 2)");

     $resultat = $sql->execute(array(
       'userId' => $userId,
       'content' => $this->content,
       'state' => $this->state,
       'note' => $this->note,
       'date_creation' => $this->date->format("Y-m-d H:i:s"),
       )
     );

     var_dump($resulat);
    return $resultat;

   }


   /**
    * [modifyContent Modification de contenu ou de la note d'un commentaire via son id]
    * @param  PDO    $pdo       [description]
    * @param  INT    $CommentID [description]
    * @param  [type] $content   [description]
    * @param  [type] $note      [description]
    * @return [type]            [description]
    */
   public static function modifyContentNote(PDO $pdo, Comment $comment, $id)
   {
     //Si uniquement le contenu est non nul
     if ($comment->content && !$comment->note) {
       $sql = $pdo->prepare("UPDATE comment SET content = :content WHERE id = :id");
       $requete = $sql->execute(array(
         'id' => $id,
         'content' => $comment->content,
         )
       );
     }
     else if ($comment->note && !$comment->content) {
       $sql = $pdo->prepare("UPDATE comment SET note = :note WHERE comment.id = :id");
       $sql->execute(array(
         'id' => $id,
         'note' => $comment->note
         )
       );
     }
     else if ($comment->note && $comment->content) {
       $sql = $pdo->prepare("UPDATE comment SET note = :note, content = :content WHERE id = :id");
       $sql->execute(array(
         'id' => $id,
         'content' => $comment->content,
         'note' => $comment->note
         )
       );
     }

     else {
       return false;
     }

     return true;
   }


public static function supprimerComment($pdo, $id) {
  if ($id !== NULL) {
    $sql = $pdo->prepare("DELETE FROM `comment` WHERE id= :id");
    return $sql->execute(array('id' => $id));
  }

  return false;
}


public function getComment() {

  $sql =  'SELECT content FROM comment WHERE user_id= {this->id}';
  return $this->bdd->query($sql);

}


    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param mixed content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of State
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of State
     *
     * @param mixed state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of Note
     *
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of Note
     *
     * @param mixed note
     *
     * @return self
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}















?>
