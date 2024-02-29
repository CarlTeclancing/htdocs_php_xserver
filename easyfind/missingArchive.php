<?php

require "includes/header.php";
require  ROOT_PATH . "/controllers/Missing.php";

use controllers\Missing;



?>


<?php
$document = new Missing();
$singleDocument = $document->getDocument();

?>



<main class="container-fluid bg-primary p-5 mb-5" style="height: 100vh;">

    <div class="container d-flex justify-content-center flex-column p-4">
        <?php require ROOT_PATH . "/includes/navigation.php"; ?>

    </div>


    <section class="containter archive_container pb-5">


        <?php if ($singleDocument) : ?>
            <?php foreach ($singleDocument as $key => $value) : ?>

                <div class="archive_box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-danger mb-3 text-center text-white p-2 rounded-sm">Missing Document</div>
                        </div>
                    </div>
                    <div class="document_image">
                        <img src="<?= $value['image'] ?>" alt="" srcset="">
                    </div>

                    <div class="document_information m-0 text-center">
                        <p class="m-0 text-bold"><?= $value['type'] ?></p>
                        <p class="m-0 text-bold">Owner: <?= $value['fullname'] ?></p>
                        <p class="text-small m-0"> Contact to get document</p>
                        <p class="m-0"><i class="fa fa-phone"></i> <?= $value['phoneNumber'] ?></p>
                        <p class="m-0"><i class="fa fa-envelope"></i> <?= $value['email'] ?></p>
                        <p><a href="missingDetail.php?id=<?= $value['id'] ?>" class="btn btn-primary mt-2">See Details</a></p>
                    </div>
                </div>


            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">
                    <div class="alert alert-danger text-center"> No Missing Document Available for now</div>
                </td>
            </tr>
        <?php endif; ?>




    </section>


</main>





<?php require "includes/footer.php" ?>