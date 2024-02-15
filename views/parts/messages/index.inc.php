<?php if (isset($_GET["succes_creation_compte"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            check_circle
        </span>
        Compte créé!
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_absentes"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Toutes les informations sont requises (sauf l'image)
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_requises"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Toutes les informations sont requises
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_invalides"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Les informations entrées sont erronées
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_deconnexion"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Déconnecté!
    </p>
<?php endif; ?>

<?php if (isset($_GET["mdp_incorrect"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le mot de passe n'a pu être confirmé
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_creation_compte"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le compte n'a pu être créé...
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_suppression"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        La suppression a échouée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_suppression"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Publication supprimée!
    </p>
<?php endif; ?>

