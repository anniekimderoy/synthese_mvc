<?php

namespace Model;

use Base\Model;

class Publication extends Model {
    protected $table = "publications";

    /**
     * Ajoute une publication
     *
     * @param string $titre
     * @param int $categorie_id
     * @param int $utilisateur_id
     * @param string|null $image
     * @return bool
     */
    public function ajouter($titre, $categorie_id, $utilisateur_id, $image) {
        $sql = "INSERT INTO $this->table (titre, image, categorie_id, utilisateur_id) VALUES (:titre, :image, :categorie_id, :utilisateur_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":categorie_id" => $categorie_id,
            ":utilisateur_id" => $utilisateur_id
        ]);
    }

    /**
    * Récupère tous les catégories
    *
    * @return array|false
    */
    public function tousLesCategories() {
        $sql = "SELECT * 
                FROM categories";
        
        $requete = $this->pdo()->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Récupère les publications d'un utilisateur spécifié par son ID
     *
     * @param int $utilisateur_id
     * @return array|false
     */
    public function parUtilisateur($utilisateur_id) {
        $sql = "SELECT publications.*,
                       utilisateurs.prenom,
                       utilisateurs.nom,
                       categories.id AS categorie_id,
                       categories.nom AS categorie_nom
                FROM publications
                JOIN utilisateurs ON publications.utilisateur_id = utilisateurs.id
                JOIN categories ON publications.categorie_id = categories.id
                WHERE publications.utilisateur_id = :utilisateur_id";

        $requete = $this->pdo()->prepare($sql);
        $requete->execute([
            ":utilisateur_id" => $utilisateur_id
        ]);

        return $requete->fetchAll();
    }

    /**
    * Supprime une publication de la base de données
    *
    * @param int $publication_id
    * @param int $utilisateur_id
    * @return bool
    */
    public function supprimer($publication_id, $utilisateur_id) {
        $sql = "DELETE FROM $this->table 
                WHERE id = :publication_id 
                AND utilisateur_id = :utilisateur_id";
    
        $requete = $this->pdo()->prepare($sql);
    
        return $requete->execute([
            ":publication_id" => $publication_id,
            ":utilisateur_id" => $utilisateur_id
        ]);
    }
}