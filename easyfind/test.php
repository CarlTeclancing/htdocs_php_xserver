<?php require "includes/header.php" ?>
<?php


require "Controllers\Document.php";

use Controllers\Document;

$document = new Document();
$singleDocument = $document->getDocument();


//delete document
if(isset($_GET['action']) && $_GET['action'] == 'delete'){

        $id = $_GET['id'];
        $deleteDocument = $document->deleteDocument($id);
        header("Location: test.php");
}

//activate document
if(isset($_GET['action']) && $_GET['action'] == 'activate'){

    $status = $_GET['status'];
    $id = $_GET['id'];

    $updateDocument = $document->updateDocument($id, $status);
    header("Location: test.php");
}

//deactivate document
if(isset($_GET['action']) && $_GET['action'] == 'deactivate'){

    $status = $_GET['status'];
    $id = $_GET['id'];

    $updateDocument = $document->updateDocument($id, $status);
    header("Location: test.php");
}

?>

<div class="container p-3 w-50">
    <h2 class="text-center">Existing Documents</h2>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>
                <a href="#" class="btn btn-primary btn-block">Filter A-Z</a>
            </th>
        </tr>
        <?php if($singleDocument):?>
        <?php foreach ($singleDocument as $key => $value) : ?>
           
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td class="text-center"> 
                    <?php if($value['status'] == 0): ?>
                        <a href="<?= BASE_URL?>/test.php?action=activate&id=<?= $value['id']?>&status=1" class="btn btn-primary"> Activate</a> 
                    <?php else: ?>
                        <a href="<?= BASE_URL?>/test.php?action=deactivate&id=<?= $value['id']?>&status=0" class="btn btn-warning"> Deactivate</a> 
                    <?php endif;?>
                <a href="<?= BASE_URL?>/test.php?action=delete&id=<?= $value['id']?>" class="btn btn-danger"> Delete</a>
                <a href="<?= BASE_URL?>/test.php?action=edit&id=<?= $value['id']?>" class="btn btn-info"> Edit</a>
            
            </td>
                
            </tr>

        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3"> <div class="alert alert-danger text-center"> No results</div></td>
            </tr>
        <?php endif; ?>
    </table>
</div>


<div class="container p3 w-50">
    <form action="create.php" method="post">
        <input type="text" class="form-control" placeholder="Type the document name" name="documentTitle">
        <input type="submit" value="Send" class="btn btn-primary btn-block mt-1">
    </form>
</div>