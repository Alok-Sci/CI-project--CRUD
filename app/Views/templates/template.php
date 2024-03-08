<?php /*include header.php that is in the 'Views/template' directory */ ?>
<?= view('templates/header') ?>


<?php /*pass and display dynamic content to the view from the controller */ ?>

<main class="container">
<section class="row justify-content-center align-items-center">
<?= view($main_content) ?>
</section>
</main>

<?php /*include footer.php that is in the 'Views/template' directory */ ?>
<?= view('templates/footer') ?>

<?php

/* alternate way to display multiple views */

// echo view('template/header');
// echo view($main_content);
// echo view('template/footer');

?>