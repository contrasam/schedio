<?php
/* @var $this PrerequisiteController */
/* @var $model Prerequisite */

$this->breadcrumbs=array(
	'Prerequisites'=>array('index'),
	$model->PrerequisiteID,
);

$this->menu=array(
	array('label'=>'List Prerequisite', 'url'=>array('index')),
	array('label'=>'Create Prerequisite', 'url'=>array('create')),
	array('label'=>'Update Prerequisite', 'url'=>array('update', 'id'=>$model->PrerequisiteID)),
	array('label'=>'Delete Prerequisite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PrerequisiteID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prerequisite', 'url'=>array('admin')),
);
?>

<h1>View Prerequisite #<?php echo $model->PrerequisiteID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'associatedCourseID',
		'prerequisiteCourseID',
		'created',
		'modified',
	),
)); ?>
