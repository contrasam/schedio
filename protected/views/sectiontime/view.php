<?php
/* @var $this SectiontimeController */
/* @var $model Sectiontime */

$this->breadcrumbs=array(
	'Sectiontimes'=>array('index'),
	$model->SectionTimeID,
);

$this->menu=array(
	array('label'=>'List Sectiontime', 'url'=>array('index')),
	array('label'=>'Create Sectiontime', 'url'=>array('create')),
	array('label'=>'Update Sectiontime', 'url'=>array('update', 'id'=>$model->SectionTimeID)),
	array('label'=>'Delete Sectiontime', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SectionTimeID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sectiontime', 'url'=>array('admin')),
);
?>

<h1>View Sectiontime #<?php echo $model->SectionTimeID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SectionTimeID',
		'associatedSubSection',
		'day',
		'fromTime',
		'toTime',
		'created',
		'modified',
	),
)); ?>
