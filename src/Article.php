<?php

class Article extends Contenu{

  protected $categorie_id;
  protected $user_id;
  protected $resume;
  protected $description;
  protected $image;
  protected $note;
  protected $visibilite;
  protected $annee_publication;
  protected $date_creation;
  protected $date_modification;
  protected $bdd;

  function __construct(PDO $pdo, $datas)
  {
    $this->bdd = $pdo;
    $this->categorie_id = $datas['categorie'];
    $this->user_id = $_SESSION['user']['id'];
    $this->titre = $datas['titre'];
    $this->resume = $datas['resume'];
    $this->description = $datas['description'];
    $this->image = $datas['image'];
    $this->note = $datas['note'];
    $this->visibilite = 1;
    $this->annee_publication = $datas['annee_publication'];
    $this->date_modification = new Datetime();
    $this->date_creation = new Datetime();

  }

  /**
   * Creation de l'article en base de données
   * @return [type] [description]
   */
  public function save() {
    $sql = $this->bdd->prepare("INSERT INTO `article` (`categorie_id`, `user_id`, `titre`, `resume`,
       `description`, `image`, `note`, `visible`, `annee`, `created`, `updated`)
        VALUES (:categorie_id, :user_id, :titre, :resume, :description, :image, :note, :visibilite, :annee_publication, :date_creation, :date_modification)");


    $sql->execute(array(
      "categorie_id" => $this->categorie_id,
      "user_id" => $this->user_id, //il recupere l'id du user connecté
      "titre" => $this->titre,
      "resume" => $this->resume,
      "description" => $this->description,
      "image" => $this->image,
      "note" => $this->note,
      "visibilite" => $this->visibilite,
      "annee_publication" => $this->annee_publication,
      "date_creation" => $this->date_creation->format("Y-m-d H:i:s"),
      "date_modification"=> $this->date_modification->format('Y-m-d H:i:s')
    ));
  }





// End of class

    /**
     * Get the value of Categorie Id
     *
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of Categorie Id
     *
     * @param mixed categorie_id
     *
     * @return self
     */
    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    /**
     * Get the value of User Id
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of User Id
     *
     * @param mixed user_id
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of Titre
     *
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of Titre
     *
     * @param mixed titre
     *
     * @return self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of Resume
     *
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of Resume
     *
     * @param mixed resume
     *
     * @return self
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Image
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of Image
     *
     * @param mixed image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

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
     * Get the value of Visibilite
     *
     * @return mixed
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set the value of Visibilite
     *
     * @param mixed visibilite
     *
     * @return self
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get the value of Annee Publication
     *
     * @return mixed
     */
    public function getAnneePublication()
    {
        return $this->annee_publication;
    }

    /**
     * Set the value of Annee Publication
     *
     * @param mixed annee_publication
     *
     * @return self
     */
    public function setAnneePublication($annee_publication)
    {
        $this->annee_publication = $annee_publication;

        return $this;
    }

    /**
     * Get the value of Date Creation
     *
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of Date Creation
     *
     * @param mixed date_creation
     *
     * @return self
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of Date Modification
     *
     * @return mixed
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set the value of Date Modification
     *
     * @param mixed date_modification
     *
     * @return self
     */
    public function setDateModification($date_modification)
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    /**
     * Get the value of Bdd
     *
     * @return mixed
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * Set the value of Bdd
     *
     * @param mixed bdd
     *
     * @return self
     */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;

        return $this;
    }

}



 ?>
