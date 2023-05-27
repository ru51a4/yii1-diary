<div class="row d-flex justify-content-center">
    <div class="d-flex flex-column col-9 m-4 bg-light">
        <h1 class="display-5 fw-bold">
            <?= $p[0]->diaries->name ?>
        </h1>
        <p class="col-md-8 fs-4">
            <?= $p[0]->diaries->description ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="d-flex flex-column justify-content-start">
        <?php foreach ($p as $post): ?>
            <div class="col-12 card d-flex flex-row">
                <?= $post->userCard->getCard() ?>
                <div class="card-body diary">
                    <div class="card--header">

                    </div>
                    <p class="card-text">
                        <?= $post->message ?>
                    </p>
                    <div class="card-bottom">
                    </div>
                    <div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>
<div class="row add-post">
    <div class="mt-3">
        <form action="/site/addpost" method="post" class="col-12">
            <div>
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                <input type="hidden" value="<?= $p[0]->diaries->id ?>" name="diary_id">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-2">Добавить</button>
            </div>
        </form>
    </div>
</div>