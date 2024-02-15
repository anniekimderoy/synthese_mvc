<!-- INCLUSION DU HEAD HTML -->
<?php include("views/parts/head.inc.php"); ?>
<body>

    <!-- INCLUSION DES MESSAGES -->
    <?php include("views/parts/messages/index.inc.php"); ?>
    
    <h1>Ajouter une activité</h1>

    <form action="publications-enregistrer" method="POST" enctype="multipart/form-data">
        <label>
            <p>Titre</p>
            <input type="text" name="titre" class="titre" value="">
        </label>
        <div>
            <label>
                <p>Image</p>
                <input type="file" name="image">
            </label>

            <label class="form-label">Catégorie:
                <select class="form-select" name="categorie_id">
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie["id"] ?>">
                            <?= ucfirst($categorie["nom"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            
            <div>
                <input type="submit" value="Créer la publication" class="btn submit">
            </div>
        </div>
    </form>

    <a href="publications">Retourner à la liste d'activités</a>

</body>
