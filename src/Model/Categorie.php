<?php
namespace src\Model;

class Categorie {
    private $Id;
    private $Libelle;
    private $Icone;

    public function SqlAdd(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO categorie (Libelle, Icone) VALUES(:Libelle, :Icone)");

            $requete->execute([
                "Libelle" => $this->getLibelle(),
                "Icone" => $this->getIcone(),
            ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function SqlUpdate(\PDO $bdd){
        try {
            $requete = $bdd->prepare("UPDATE categorie set Libelle= :Libelle, Icone = :Icone WHERE Id = :Id");

            $requete->execute([
                "Libelle" => $this->getLibelle(),
                "Icone" => $this->getIcone(),
            ]);
            return "OK";
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
    /**
     * Récupère toutes les catégories
     * @param \PDO $bdd
     * @return array
     */
    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM categorie");
        $requete->execute();
        //$datas =  $requete->fetchAll(\PDO::FETCH_ASSOC);
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\Categorie');
        return $datas;

    }

    public function SqlGetById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT * FROM categorie WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\Categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }

    public function SqlDeleteById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("DELETE FROM categorie WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        return true;
    }
    public function SqlTruncate(\PDO $bdd){
        $requete = $bdd->prepare("TRUNCATE TABLE categorie");
        $requete->execute();
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     * @return Catégorie
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * @param mixed $Libelle
     * @return Categorie
     */
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->Icone;
    }

    /**
     * @param mixed $Icone
     * @return Categorie
     */
    public function setIcone($Icone)
    {
        $this->Icone = $Icone;
        return $this;
    }

    /**
     * @return mixed
     */

}