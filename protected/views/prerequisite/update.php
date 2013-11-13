<?php
/* @var $this PrerequisiteController */
/* @var $model Prerequisite */

$this->breadcrumbs=array(
	'Prerequisites'=>array('index'),
	$model->PrerequisiteID=>array('view','id'=>$model->PrerequisiteID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prerequisite', 'url'=>array('index')),
	array('label'=>'Create Prerequisite', 'url'=>array('create')),
	array('label'=>'View Prerequisite', 'url'=>array('view', 'id'=>$model->PrerequisiteID)),
	array('label'=>'Manage Prerequisite', 'url'=>array('admin')),
);
?>

<h1>Update Prerequisite <?php echo $model->PrerequisiteID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>