<?php include_once('./templates/header.php'); ?>

<div class="grid grid-cols-12 h-screen place-items-center mx-80">
    <div class="col-span-12">
        <div class="text-4xl font-medium text-slate-300 text-center">Bienvenue sur QuizzTDD !</div>
        <div class="flex justify-center mt-8">
            <a href="/quizztdd/play/1/" class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5">
                <i class="fas fa-dice-three mr-2"></i>Jouer
            </a>

            <a href="/quizztdd/add-question/" class="flex items-center bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5">
                <i class="fas fa-plus-circle mr-2"></i>Ajouter une question
            </a>
        </div>
    </div>
</div>

<?php include_once('./templates/footer.php'); ?>