<?php

require "includes/header.php";
require  ROOT_PATH . "/controllers/Document.php";

use controllers\Document;

$document = new Document();

?>


<?php

if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];
    $singleDocument = $document->searchDocument($fullname);
    // $singleDocument = $document->getDocument();
} else {
    header("Location:" . BASE_URL);
    exit();
}

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
                        <div class="bg-primary mb-3 text-center text-white p-2 rounded-sm">Found Document</div>
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
                    <p><a href="document.php?id=<?= $value['id'] ?>" class="btn btn-primary mt-2">See Details</a></p>
                </div>
                </div>


            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">
                    <div class="alert alert-danger text-center"> No results</div>
                </td>
            </tr>
        <?php endif; ?>




    </section>


</main>





<?php require "includes/footer.php" ?>