<ol class="list-group list-group-numbered">

    <?php foreach($searched_users as $su) : ?>

    <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        <div class="fw-bold"><?php echo $su->firstname.' '.$su->lastname ?></div>
        <a href="#" class="btn btn-primary btn-sm">Add</a>
    </div>
    </li>
    <?php endforeach; ?>
</ol>