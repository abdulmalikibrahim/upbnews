<!DOCTYPE html>
<html lang="en">

    <head>
        <?= $this->include('templates/head'); ?>

        <?= $this->renderSection("addCss"); ?>
    </head>

    <body>

        <?= $this->include("templates/spinner"); ?>


        <?= $this->include("templates/navbar"); ?>


        <?= $this->renderSection('content'); ?>


        <?= $this->include("templates/footer"); ?>


        <?= $this->include("templates/copyright"); ?> 

        
        <?= $this->include("templates/footer_js"); ?>

        <?= $this->renderSection("addJS"); ?>
    </body>

</html>