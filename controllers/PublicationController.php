<?php

namespace Controller;

use Base\Controller;
use Model\Publication;
use Model\Utilisateur;
use Util\Upload;

class PublicationController extends Controller {

    /**
    * Affiche la page des publications de l'utilisateur connecté
    */
    public function index() {
        // Protection de la route /publications
        if (empty($_SESSION["utilisateur_id"])) {
            header("location: index");
            exit();
        }

        // Récupération de l'utilisateur connecté
        $utilisateur_id = $_SESSION["utilisateur_id"];
        $modeleUtilisateur = new Utilisateur();
        $utilisateur = $modeleUtilisateur->parId($utilisateur_id);

        // Récupération des publications de l'utilisateur connecté
        $modelePublication = new Publication();
        $publications = $modelePublication->parUtilisateur($utilisateur_id);
        $categories = $modelePublication->tousLesCategories();

        include("views/publications.view.php");
    }

    /**
    * Affiche le formulaire de création de publication
    */
    public function creer() {
        // Protection de la route /publications-creer
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }
        
        // Récupération des catégories
        $modele = new Publication();
        $categories = $modele->tousLesCategories();
    
        include("views/publications-creer.view.php");
    }

    /**
     * Traite les informations d'une nouvelle publication
     */
    public function enregistrer() {
        // Protection de la route /publications
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }

        // Validation des paramètres
        if (empty($_POST["titre"]) || empty($_POST["categorie_id"])) {
            header("location: publications-creer?infos_requises=1");
            exit();
        }

        // Traitement de l'image s'il y a lieu
        $image = null;
        $upload = new Upload("image", ["jpeg", "jpg", "png"]);
        if($upload->estValide()){
            $image = $upload->placerDans("uploads");
        }

        // Récupération de l'id de l'utilisateur
        $utilisateur_id = $_SESSION["utilisateur_id"];

        // Ajouter la publication
        $modele = new Publication;
        $succes = $modele->ajouter($_POST["titre"],
                                    $_POST["categorie_id"],
                                   $utilisateur_id,
                                   $image);
        
        // Redirection si échec
        if(!$succes){
            header("location: publications-creer?echec_ajout=1");
            exit();
        }

        // Redirection si succès
        header("location: publications?succes_ajout=1");
        exit();
    }
    /**
     * Supprime une publication
     */
    public function supprimer() {
        // Protection de la route /supprimer-publication
        if(empty($_SESSION["utilisateur_id"])) {
            header("location: index");
            exit();
        }
    
        // Vérifiez si l'ID de la publication à supprimer est présent
        if(empty($_POST["publication_id"])) {
            header("location: publications");
            exit();
        }
    
        // Récupérer l'ID de l'utilisateur
        $utilisateur_id = $_SESSION["utilisateur_id"];
    
        // Récupérer l'ID de la publication à supprimer
        $publication_id = $_POST["publication_id"];
    
        // Supprimer la publication
        $modele = new Publication();
        $succes = $modele->supprimer($publication_id, $utilisateur_id);
    
        // Redirection en cas d'échec
        if(!$succes) {
            header("location: publications?echec_suppression=1");
            exit();
        }
    
        // Redirection en cas de succès
        header("location: publications?succes_suppression=1");
        exit();
    }
}