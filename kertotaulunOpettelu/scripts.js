// Tämä tiedosto sisältää JavaScript-koodin, joka liittyy kertotaulun opetteluun ja quiz-toimintoihin.
document.addEventListener('DOMContentLoaded', function () {

    const outputDiv = document.getElementById('outputArea');
    // Tarkistetaan onko result-div olemassa ja onko siinä sisältöä ja vieritetään kohdalleen
    if (outputDiv && outputDiv.innerHTML.trim().length > 0) {
        outputDiv.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    // Lisää checkAnswersBtn nappiin tapahtumakuuntelija vain jos quiz tilassa
    const checkBtn = document.getElementById('checkAnswersBtn');
    if (checkBtn) {
        const scoreDiv = document.getElementById('score');
        const quizItems = document.querySelectorAll('#quizForm .multiplication-item'); // Haetaan quizin sisältä

        checkBtn.addEventListener('click', function () {
            let correctCount = 0;
            let allAnswered = true;

            quizItems.forEach(item => {
                const input = item.querySelector('.answer-input');
                const iconSpan = item.querySelector('.result-icon');
                const correctAnswer = parseInt(item.dataset.correctAnswer);
                const userAnswer = parseInt(input.value);

                item.classList.remove('correct', 'incorrect');
                input.classList.remove('is-valid', 'is-invalid');
                if (iconSpan) iconSpan.innerHTML = '';

                if (input.value === '') {
                    allAnswered = false;
                    input.classList.add('is-invalid');
                } else if (userAnswer === correctAnswer) {
                    item.classList.add('correct');
                    input.classList.add('is-valid');
                    if (iconSpan) iconSpan.innerHTML = '<i class="fas fa-check text-success"></i>';
                    correctCount++;
                } else {
                    item.classList.add('incorrect');
                    input.classList.add('is-invalid');
                    if (iconSpan) iconSpan.innerHTML = '<i class="fas fa-times text-danger"></i>';
                }
            });

            // Näytä tulos
            if (!allAnswered) {
                scoreDiv.textContent = 'Vastaa kaikkiin kysymyksiin ensin!';
                scoreDiv.className = 'mt-3 fw-bold text-warning';
            } else {
                scoreDiv.textContent = 'Sait ' + correctCount + ' / ' + quizItems.length + ' oikein!';
                scoreDiv.className = 'mt-3 fw-bold ' + (correctCount === quizItems.length ? 'text-success' : 'text-info');
            }
        });
    } // End if(checkBtn)
});
