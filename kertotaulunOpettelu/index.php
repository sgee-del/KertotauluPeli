<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matikkapeli - Opettele kertotaulut hauskalla tavalla</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Matikkapeli</h1>
            <p class="hero-description">Opi matematiikan perustaitoja hauskalla tavalla. Aloita kertotaulujen opettelu jo tänään!</p>
            <a href="kertotaulu.php" class="btn hero-btn">Aloita oppiminen <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Main Section -->
    <section class="features-section">
        <div class="container">
            <p class="section-subtitle">Miksi valita meidät?</p>
            <h2 class="section-title">Matematiikan oppiminen ei ole koskaan ollut näin hauskaa</h2>

            <div class="row features-row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="feature-title">Interaktiivinen oppiminen</h3>
                        <p class="feature-description">Oppiminen voi olla hauskaa! Ei enää kerotaulujen pänttäämistä perinteisestä kirjasta.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Seuraa edistymistäsi</h3>
                        <p class="feature-description">Näe oma kehityksesi ja motivoidu tuloksistasi. Selvät tavoitteet auttavat sinua etenemään matematiikan opinnoissasi.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h3 class="feature-title">Pelimäinen kokemus</h3>
                        <p class="feature-description">Matematiikka muuttuu hauskaksi kun opit pelin kautta. Kerää pisteitä ja saavutuksia oppimisen ohessa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Section End -->
    <!-- TODO 
      Lisää käyttäjä ja saa pisteitä oikeista valinnoista
       tee myös dashbaord mikä seuraa oppimista jne -->

    <!-- CTA Section -->
    <section>
        <div class="container">
            <div class="cta-section">
                <h2 class="cta-title">Aloita kertotaulujen oppiminen nyt!</h2>
                <p class="mb-4">Kertotaulujen hallitseminen on tärkeä perusta matematiikan opiskelussa.</p>
                <a href="kertotaulu.php" class="btn cta-btn">Siirry kertotaulusovellukseen <i class="fas fa-calculator ms-2"></i></a>
            </div>
        </div>
    </section>

    <?php
    include "footer.php"; ?>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>