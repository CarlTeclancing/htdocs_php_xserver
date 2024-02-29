<?php 

    require "includes/header.php";
    require ROOT_PATH."/controllers/Missing.php";

    use controllers\Missing;

    $document = new Missing();
   
?>


<?php

    if(isset($_GET['id'])){
        $documentId = $_GET['id'];
        $singleDocument = $document->getDocumentId($documentId);
        // $singleDocument = $document->getDocument();
    }

    else{
        header("Location:".BASE_URL);
        exit();
    }

?>



<main class="container-fluid bg-primary p-5 mb-5" style="height: 100vh;">

<div class="container d-flex justify-content-center flex-column p-4">
        
        <?php require ROOT_PATH."/includes/navigation.php"; ?>

    </div>


    <section class="containter archive_container pb-5">

    <?php if($singleDocument):?>
        <?php foreach ($singleDocument as $key => $value) : ?>

            <div class="archive_box_detail">
                <div class="document_image_detail shadow-lg">
                    <img class="shadow-lg d-block m-auto" src="<?= $value['image']?>" alt="" srcset="">
                </div>

                <div class="document_information m-0 text-center">
                    <p class="m-0 text-bold"><?= $value['type'] ?></p>
                    <p class="m-0 text-bold">Owner: <?= $value['fullname'] ?></p>
                    <p class="m-0"><i class="fa fa-location"></i> <?= $value['location'] ?></p>
                    <p class="text-medium m-0"> Contact to get document</p>
                    <p class="m-0"><i class="fa fa-phone"></i> <?= $value['phoneNumber'] ?></p>
                    <p class="m-0"><i class="fa fa-envelope"></i> <?= $value['email'] ?></p>

                    <div class="row  mt-5">
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-lg btn-block" onclick="goBack();">Go Back</button>
                        </div>
                        <div class="col-md-6">
                             <p><a href="search.php" class="btn btn-danger btn-lg btn-block">Search for a Document</a></p>
                        </div>
                    </div>
                   
                    
                </div>
            </div>


            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3"> <div class="alert alert-danger text-center"> No results</div></td>
            </tr>
        <?php endif; ?>

            
            

    </section>


</main>





<?php require "includes/footer.php" ?>