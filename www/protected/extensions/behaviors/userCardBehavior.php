<?php
class UserCardBehavior extends CActiveRecordBehavior
{
    public function getCard()
    {
        ob_start();
        ?>
        <div class="card-avatar d-flex flex-column justify-content-start">
            <div class="nickname">
                <b>demo</b>
                <p class="status">
                    блогер
                </p>
            </div>
            <img class="avatar" src="http://ufland.moy.su/camera_a.gif">
        </div>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}