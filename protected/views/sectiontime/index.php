<?php
/* @var $this SectiontimeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sectiontimes',
);

$this->menu=array(
	array('label'=>'Create Sectiontime', 'url'=>array('create')),
	array('label'=>'Manage Sectiontime', 'url'=>array('admin')),
);
?>

<h1>Sectiontimes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
