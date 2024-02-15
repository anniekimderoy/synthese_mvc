<!-- INCLUSION DU HEAD HTML -->
<?php include("views/parts/head.inc.php"); ?>
<body>
    <main class="accueil">
        <div>
            <div>
                <!-- INCLUSION DES MESSAGESL -->
                <?php include("views/parts/messages/index.inc.php"); ?>

                <h1 class="logo">Se connecter</h1>
                <section class="login">
                    <form action="connecter" method="POST">
                        <input type="email" name="courriel" placeholder="Courriel" autofocus>
                        <input type="password" name="mdp" placeholder="Mot de passe">
                        <input class="btn submit" type="submit" value="Envoyer">
                    </form>
                    <a href="compte-creer">Pas de compte?</a>
                </section>
            </div>
        </div>
    </main>
</body>

</html>