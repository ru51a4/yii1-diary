<?php $this->widget(
    'zii.widgets.grid.CGridView',
    array(
        'id' => 'bus-route-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'name',
            'description',
        ),
    )
); ?>