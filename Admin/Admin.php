<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="section__container nav__container">
            <div class="nav__logo">Healthy<span>Farm</span></div>
        </nav>
        <div class="section__container header__container">
            <div class="header__content">
                <h1>Bienvenue à Healty Farm</h1>
                <p>
                    Une plateforme électronique dédiée à la clinique vétérinaire, visant à faciliter la demande de services de vaccination pour les agriculteurs de manière simple et pratique.
                    Le site offre un système moderne de gestion des rendez-vous et des demandes, avec une interface conviviale adaptée aux besoins des agriculteurs,
                    ce qui améliore la communication entre la clinique et les clients et contribue à améliorer la qualité des soins vétérinaires.
                </p>
            </div>
        </div>
    </header>
    <section class="section__container service__container" id="service">
        <div class="service__grid">
            <div class="service__card">
                <span><i class="ri-nurse-fill"></i></span>
                <h4>Informations sur les vétérinaires</h4>
                <a href="list_veterinaire.php">Cliquez</a>
            </div>
            <div class="service__card">
                <span><i class="ri-stethoscope-line"></i></span>
                <h4>Voir les demandes</h4>
                <a href="vue_les demande_con.php">Cliquez</a>
            </div>
            <div class="service__card">
                <span><i class="ri-medicine-bottle-fill"></i></span>
                <h4>Ajouter un vétérinaire</h4>
                <a href="ajoute_veterinaire.php">Cliquez</a>
            </div>
        </div>
        <br><br>
        <div class="service__grid1">
            <div class="service__card1">
                <span><i class="ri-nurse-fill"></i></span>
                <h4>Voir les réponses des vétérinaires</h4>
                <a href="vue_les_reponce_con.php">Cliquez</a>
            </div>
          
        </div>
    </section>
</body>
</html>
