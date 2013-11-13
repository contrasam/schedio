<?php
/* @var $this PrerequisiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prerequisites',
);

$this->menu=array(
	array('label'=>'Create Prerequisite', 'url'=>array('create')),
	array('label'=>'Manage Prerequisite', 'url'=>array('admin')),
);
?>

<h1>Prerequisites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
