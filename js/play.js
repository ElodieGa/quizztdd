$(document).ready(function() {
    $('input[name="reponse"]').change(function() {
        let button_question_suivante = $('input[type="submit"]');
        button_question_suivante.removeClass('invisible');
    });
});