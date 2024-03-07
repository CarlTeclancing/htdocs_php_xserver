<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Example</title>
</head>
<body>
    <h1>Items</h1>
    <?php include 'function.php'; ?>
    <?php $items = getItems(); ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <?php echo $item['name']; ?> - <?php echo $item['description']; ?>
                <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="add.php">Add Item</a>
</body>
</html>