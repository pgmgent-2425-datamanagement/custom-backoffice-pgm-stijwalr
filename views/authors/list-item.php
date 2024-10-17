<div class="item">
    <div class="firstname"><?= $item->firstname?></div>
    <div class="surname"><?= $item->surname?></div>
    <div class="buttons">
        <a href="/author/edit/<?= $item->id;?>">Edit</a>
        <a href="#">Delete</a>
    </div>
</div>