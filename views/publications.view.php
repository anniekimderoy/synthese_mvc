<?php include("views/parts/head.inc.php"); ?>
    
<!-- INCLUSION DES MESSAGES -->
<?php include("views/parts/messages/index.inc.php"); ?>

<main class="publications">
    <header>
        <?php if (isset($utilisateur)): ?>
            <h1><?= $utilisateur->prenom ?> <?= $utilisateur->nom ?></h1>
            <?php if ($utilisateur->image != null): ?>
                <img src="<?= $utilisateur->image ?>" alt="Photo de profil de <?= $utilisateur->prenom ?> <?= $utilisateur->nom ?>" width="250">
            <?php else: ?>
                <img src="public/img/profil.png" alt="Photo de profil par défaut" width="200">
            <?php endif; ?>
            <a href="deconnecter" class="btn deconnexion">Déconnexion</a>
        <?php endif; ?>
    </header>

    <section class="contenu">
        <h2>Publications</h2>
        <a href="publications-creer" class="ajouter-activite">Ajouter une activité</a>
        <hr>
        <?php foreach($publications as $publication) : ?>
            <div class="publication">
                <h3><?= $publication->titre ?></h3>

                <?php if($publication->image != null) : ?>
                    <div>
                        <img class="image" src="<?= $publication->image ?>" alt="Image" width="500">
                    </div>
                <?php endif; ?>

                <p class="categorie">Catégorie: <?= $publication->categorie_nom ?></p>

                <p class="date_publication">
                    Publié le <?= date("Y-m-d", strtotime($publication->date_creation)) ?>
                </p>

                <form action="supprimer-publication" method="POST">
                    <input type="hidden" name="publication_id" value="<?= $publication->id ?>">
                    <input type="submit" value="Supprimer">
                </form>

                <hr>
            </div>
        <?php endforeach; ?>

    </section>
</main>
</body>
</html>
