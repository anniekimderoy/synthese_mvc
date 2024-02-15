<?php

$routes = [
    // route => [controller, méthode]
    "index" => ["UtilisateurController", "index"],

    // Traitement de la connexion
    "connecter" => ["UtilisateurController", "connecter"],

    // Formulaire de création de compte
    "compte-creer" => ["UtilisateurController", "creer"],

    // Traitement de la création d'un compte
    "compte-enregistrer" => ["UtilisateurController", "enregistrer"],

    // Traitement de la déconnexion
    "deconnecter" => ["UtilisateurController", "deconnecter"],

    // Page des publications
    "publications" => ["PublicationController", "index"],

    // Formulaire de création de publication
    "publications-creer" => ["PublicationController", "creer"],

    // Traitement de la création d'une publication
    "publications-enregistrer" => ["PublicationController", "enregistrer"],

    // Supprimer une publication
    "supprimer-publication" => ["PublicationController", "supprimer"]
];