<?php
class dashboardWidget extends CWidget
{
    public $d;
    public function init()
    {
    }

    public function run()
    {
        $this->render('dashboardwidget_view', ["d" => $this->d]);
    }
}