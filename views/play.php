<?php include_once(ROOT . 'templates/header.php'); ?>

<div class="grid grid-cols-12 h-screen place-items-center mx-80">
    <div class="col-span-12">
        <?php if (!empty($aQuestion)) { ?>
            <form action="<?= $sNextURL ?>" method="POST">
                <div class="text-4xl font-medium bg-indigo-600 text-slate-200 text-center"><?= $aQuestion['nom'] ?></div>
                <div class="grid grid-cols-12 text-2xl text-slate-300 mt-12">
                    <?php foreach ($aReponses as $aReponse) { ?>
                        <div class="col-span-6 mb-4">
                            <input id="reponse_<?= $aReponse['id'] ?>" type="radio" value="<?= $aReponse['id'] ?>" name="reponse" class="w-4 h-4 cursor-pointer focus:ring-transparent" style="accent-color: #6366f1;">
                            <label for="reponse_<?= $aReponse['id'] ?>" class="cursor-pointer ml-2"><?= $aReponse['nom'] ?></label>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($iNextIdQuestion) { ?>
                    <div class="flex justify-center mt-12" id="next_question">
                        <input type="submit" class="invisible bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5" value="Question suivante" />
                    </div>
                <?php } else { ?>
                    <div class="flex justify-center mt-12">
                        <input type="submit" class="invisible bg-indigo-600 hover:bg-indigo-700 text-slate-50 text-center rounded-md cursor-pointer px-3 py-1.5" value="Finished" />
                    </div>
                <?php } ?>
            </form>
        <?php } else { ?>
            <div class="text-4xl font-medium text-slate-300 text-center">404 - Cette page n'existe pas</div>
        <?php } ?>
    </div>
</div>

<script><?php include_once(ROOT . 'js/play.js'); ?></script>
<?php include_once(ROOT . 'templates/footer.php'); ?>