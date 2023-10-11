<?php include_once(ROOT . 'templates/header.php'); ?>

<div class="grid grid-cols-12 h-screen place-items-center mx-80">
    <div class="col-span-12">
        <h1 class="w-screen text-4xl font-medium text-slate-300 text-center">Ajouter une nouvelle question</h1>

        <?php if (!empty($sSuccess)) { ?>
            <div class="w-screen text-xl text-emerald-500 text-center mt-5"><?= $sSuccess ?></div>
        <?php } ?>

        <?php if (!empty($sError)) { ?>
            <div class="w-screen text-xl text-red-500 text-center mt-5"><?= $sError ?></div>
        <?php } ?>

        <form action="/quizztdd/add-question/" method="post">
            <div class="w-full flex justify-center mt-12">
                <div class="w-2/5">
                    <div class="w-full text-2xl font-medium text-slate-300 mb-2">Question</div>
                    <input name="nouvelle_question" type="text" class="w-full bg-slate-900 border-b-2 border-slate-300 focus:border-cyan-300 outline-0 placeholder-slate-500 text-slate-50 px-2.5 py-2" placeholder="Quel prénom porte la mère biologique d'Harry Potter ?" />
                </div>
            </div>

            <div class="w-full flex justify-center mt-12">
                <div class="w-2/5">
                    <div class="w-full text-2xl font-medium text-slate-300 mb-2">Réponse</div>
                    <input name="vraie_reponse" type="text" class="w-full bg-slate-900 border-b-2 border-slate-300 focus:border-cyan-300 outline-0 placeholder-slate-500 text-slate-50 px-2.5 py-2" placeholder="Lily" />
                </div>
            </div>

            <div class="w-full flex justify-center mt-12">
                <div class="w-2/5">
                    <div class="w-full text-2xl font-medium text-slate-300 mb-2">Fausses réponses</div>

                    <div class="grid grid-cols-12 gap-x-8 gap-y-5">
                        <input name="fausse_reponse_1" type="text" class="col-span-6 bg-slate-900 border-b-2 border-slate-300 focus:border-cyan-300 outline-0 placeholder-slate-500 text-slate-50 px-2.5 py-2" placeholder="Violet" />
                        <input name="fausse_reponse_2" type="text" class="col-span-6 bg-slate-900 border-b-2 border-slate-300 focus:border-cyan-300 outline-0 placeholder-slate-500 text-slate-50 px-2.5 py-2" placeholder="Rose" />
                        <input name="fausse_reponse_3" type="text" class="col-span-6 bg-slate-900 border-b-2 border-slate-300 focus:border-cyan-300 outline-0 placeholder-slate-500 text-slate-50 px-2.5 py-2" placeholder="Hyacinth" />
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-12">
                <a href="/quizztdd/">
                    <div class="bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5"><i class="fas fa-home mr-2"></i>Retour à l'accueil</div>
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5 mx-1.5">Valider</button>
            </div>
        </form>
    </div>
</div>

<?php include_once(ROOT . 'templates/footer.php'); ?>