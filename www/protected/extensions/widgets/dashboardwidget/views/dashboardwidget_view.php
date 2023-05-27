<?php foreach ($d as $diary): ?>
    <a href="/site/diary?id=<?= $diary->id ?>">
        <div class="col-12 card d-flex flex-row">
            <?= $diary->userCard->getCard(); ?>
            <div class="card-body">
                <h5 class="card-title">
                    <?= $diary->name ?>
                </h5>
                <p class="card-text">
                    <?= $diary->description ?>
                </p>
            </div>
        </div>
    </a>
<?php endforeach; ?>