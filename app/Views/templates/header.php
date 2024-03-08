<!DOCTYPE html>

<html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- dynamically get title for the page from controller  -->
            <title><?= $title ?> | First CI project </title>

            <!-- link reference to google fonts  -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
                  rel="stylesheet">

            <!-- link references to bootstrap stylesheet and script -->
            <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
            <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

            <!-- fontawesome cdn  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                  crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
                    integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- link stylesheet references  -->
            <!-- <link rel="stylesheet" href="css/style.css"> -->
            <link rel="stylesheet" href="<?= base_url() . '/css/style.css'; ?>">
            <link rel="stylesheet" href="<?= base_url('/fonts/__font.css'); ?>">

      </head>

      <body>

            <header>

                  <?= view('templates/navbar') ?>

            </header>