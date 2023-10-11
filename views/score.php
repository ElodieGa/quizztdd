<?php include_once(ROOT . 'templates/header.php'); ?>

<div class="grid grid-cols-12 h-screen place-items-center mx-80">
    <div class="col-span-12">
        <!-- <div class="text-4xl font-medium text-slate-300 text-center">Score</div> -->
        <div class="text-4xl font-medium text-slate-300 text-center">
            Score : <span class="bg-indigo-600 text-slate-200"> <?= $iScoreFinal ?> / <?= $iNbQuestionsTotal ?> </span>
            <?php if ($iScoreFinal == $iNbQuestionsTotal) { echo "✨"; } ?>
        </div>

        <div class="flex justify-center mt-12">
            <a href="/quizztdd/">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5"><i class="fas fa-home mr-2"></i>Retour à l'accueil</button>
            </a>
            <a href="/quizztdd/play/1/">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5"><i class="fas fa-redo-alt mr-2"></i>Rejouer</button>
            </a>
        </div>
    </div>
</div>

<?php include_once(ROOT . 'templates/footer.php'); ?>