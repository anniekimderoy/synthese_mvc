<!-- INCLUSION DU DÉBUT DU HEAD EN HTML -->
<?php include("views/parts/head.inc.php"); ?>
<body>
    <main class="compte">
        <div>
            <div>
                <h1>Créez votre compte </h1>
                
                <!-- INCLUSION DES MESSAGES -->
                <?php include("views/parts/messages/index.inc.php"); ?>

                <section>
                    <form action="compte-enregistrer" method="POST" enctype="multipart/form-data">

                        <input type="text" name="prenom" placeholder="Prénom" autofocus>
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="email" name="courriel" placeholder="Courriel">
                        <input type="password" name="mdp" placeholder="Mot de passe">
                        <input type="password" name="confirmer_mdp" placeholder="Confirmer le mot de passe">
                        <label>Photo: <input type="file" name="image"></label>
                        <input class="btn submit" type="submit" value="Créer!">
                    </form>
                    <a href="index">Connexion</a>
                </section>
            </div>
        </div>
    </main>
</body>