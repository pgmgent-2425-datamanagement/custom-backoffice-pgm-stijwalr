<h1>Dashboard</h1>
<p>Manage all books</p>

<h2>Authors</h2>
<?php foreach($authors as $item) { 
    include 'authors/list-item.php';
 } ?>

<h2>Books</h2>
<?php foreach($books as $item) { ?>
    <div>
        <h3> <?php echo $item->title; ?> </h3>
        <p> <?php echo $item->description; ?> </p>
    </div>
<?php } ?>