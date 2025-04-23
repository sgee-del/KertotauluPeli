<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kertotaulut - Opettele matematiikkaa hauskasti</title>
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

<!-- TODO

 - lisää header ja navbar
 - lisää kirjautumismahdollisuus ja käyttäjätiedot sekä pisteet kertotaulu harjoituksista
 - lisää tulokset ja pisteet
 - lisää plus.miinus yms muitakin laskuja
 - lisää pelit ja kilpailut
 - lisää kuvat ja animaatiot
 - siirrä tiesitkö osio samalle tasolle kertotaulun kanssa ja palaa nappi sen yläpuolelle tai jonnekkin muualle
 - lisää tulokset ja pisteet näkymään ylhäällä käyttäjän kuvan viereen
 - Lisää tyhjennys nappi quiz modelle ja peitä kertotaulu kuva kun quiz modessa
 - vaihda vastaus tekstin väriä riippuen montako oikein ja väärin
-->

<body>
    <div class="app-container">
        <div class="header-section">
            <h1 class="header-title">Kertotaulujen Maailma</h1>
            <p class="header-description">Opettele kertotaulut hauskasti ja helposti! Valitse kertotaulu alla ja opi leikin kautta.</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="content-card">
                    <h2 class="card-title">
                        <i class="fas fa-calculator icon-accent"></i>
                        Valitse kertotaulu
                    </h2>

                    <div class="selection-container">
                        <!-- Lomake valinnalle ja toiminnolle -->
                        <form id="kertotauluForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <p>Valitse kertotaulu, jonka haluat nähdä tai testata:</p>

                            <div class="radio-buttons mb-3"> <!-- Lisätty marginaali -->
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <input type="radio" id="kertotaulu<?php echo $i; ?>" name="kertotaulu" value="<?php echo $i; ?>" class="radio-button" <?php
                                        // Pidetään valinta muistissa sivun latauduttua uudelleen
                                        if (isset($_POST['kertotaulu']) && $_POST['kertotaulu'] == $i) echo 'checked';
                                    ?> required> 
                                    <label for="kertotaulu<?php echo $i; ?>" class="radio-label"><?php echo $i; ?></label>
                                <?php endfor; ?>
                            </div>

                            <!-- Toimintonapit -->
                            <div class="d-flex gap-2"> 
                                <button type="submit" name="action" value="test" class="btn btn-custom">
                                    <i class="fas fa-play"></i> Testaa taitosi
                                </button>
                                <button type="submit" name="action" value="show" class="btn btn-secondary">
                                    <i class="fas fa-eye"></i> Näytä vastaukset
                                </button>
                            </div>
                        </form>
                    </div>
                </div> <!-- content-card end -->

                 <!-- TULOSTUSALUE (Quiz tai Vastaukset) -->
                 <div id="outputArea" class="mt-4">
                    <?php
                    // Tarkistetaan onko lomake lähetetty ja kertotaulu valittu
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kertotaulu']) && isset($_POST['action'])) {
                        $valittu = intval($_POST['kertotaulu']);
                        $action = $_POST['action']; // 'test' tai 'show'

                        if ($valittu >= 1 && $valittu <= 10) {

                            // Jos valittiin "Testaa taitosi"
                            if ($action === 'test') {
                                echo '<div class="content-card results-container">'; // Käytetään samaa korttityyliä
                                echo '<h3 class="result-title">Testaa ' . $valittu . '. kertotaulun osaamisesi</h3>';
                                echo '<form id="quizForm">'; // Lomake vain quizin sisällä
                                echo '<div class="multiplication-list">';
                                for ($i = 1; $i <= 10; $i++) {
                                    $tulos = $i * $valittu;
                                    echo '<div class="multiplication-item mb-2 d-flex align-items-center" data-correct-answer="' . $tulos . '">';
                                    echo '  <span class="me-2">' . $i . ' × ' . $valittu . ' = </span>';
                                    echo '  <input type="number" class="form-control answer-input me-2" required>';
                                    echo '  <span class="result-icon"></span>';
                                    echo '</div>';
                                }
                                echo '</div>'; // multiplication-list end
                                echo '<button type="button" id="checkAnswersBtn" class="btn btn-success mt-3">Tarkista vastaukset</button>';
                                echo '<div id="score" class="mt-3 fw-bold"></div>';
                                echo '</form>'; // quizForm end
                                echo '</div>'; // results-container end

                            // Jos valittiin "Näytä vastaukset"
                            } elseif ($action === 'show') {
                                echo '<div class="content-card results-container">'; // Käytetään samaa korttityyliä
                                echo '<h3 class="result-title">' . $valittu . '. kertotaulu</h3>';
                                echo '<div class="multiplication-list">';
                                for ($i = 1; $i <= 10; $i++) {
                                    $tulos = $i * $valittu;
                                    // Näytetään suoraan rivit vastauksineen
                                    echo '<div class="multiplication-item mb-2">';
                                    echo '  <span>' . $i . ' × ' . $valittu . ' = ' . $tulos . '</span>';
                                    echo '</div>';
                                }
                                echo '</div>'; // multiplication-list end
                                echo '</div>'; // results-container end
                            }
                        } else {
                             // Jos valittu numero ei ole välillä 1-10 (ei pitäisi tapahtua normaalisti)
                             echo '<div class="alert alert-warning">Virheellinen kertotaulun numero valittu.</div>';
                        }
                    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['kertotaulu'])) {
                        // Jos lomake lähetettiin ilman radio-napin valintaa
                        echo '<div class="alert alert-warning">Valitse ensin kertotaulu.</div>';
                    }
                    ?>
                 </div> <!-- outputArea end -->

            </div> <!-- col-lg-6 end (left column) -->


            <div class="col-lg-6">
                 <!-- Oikea palsta vinkkeineen pysyy samana -->
                <div class="content-card">
                    <h2 class="card-title">
                        <i class="fas fa-lightbulb icon-accent"></i>
                        Kertotaulun opiskelutekniikka
                    </h2>
                    <div class="illustration">
                        <img src="multiplication_table.jpg" alt="Havainnekuva kertotaulun opettelusta">
                    </div>
                    <h3>Vinkkejä kertotaulujen oppimiseen:</h3>
                    <ul>
                        <li>Harjoittele säännöllisesti, mieluiten päivittäin</li>
                        <li>Visualisoi kertolaskun merkitys esimerkiksi ryhmittelemällä esineitä</li>
                        <li>Etsi kaavoja ja yhteyksiä eri kertotaulujen välillä</li>
                        <li>Kertaa takaperin - se haastaa aivoja ja parantaa muistia</li>
                        <li>Käytä pelejä ja leikkejä oppimisen tukena</li>
                        <li>Aseta pieniä tavoitteita ja palkitse itsesi kun saavutat ne</li>
                        <li>Tee oma kertotaulukartta ja seuraa, mitkä kohdat hallitset</li>
                    </ul>
                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle"></i>
                        <strong>Tiesitkö?</strong> Kertotaulut eivät ole pelkästään koulua varten – niitä tarvitaan arjessa esimerkiksi rahankäytössä ja ajanlaskussa!
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Takaisin
                    </a>
                </div>
            </div> <!-- col-lg-6 end (right column) -->
        </div> <!-- row end -->
    </div> <!-- app-container end -->

    <?php
    include 'footer.php'; ?> <!-- Footer -->

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="scripts.js" defer></script>
    
</body>
</html>
