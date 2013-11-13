<?php
/* @var $this PrerequisiteController */
/* @var $model Prerequisite */

$this->breadcrumbs=array(
	'Prerequisites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prerequisite', 'url'=>array('index')),
	array('label'=>'Manage Prerequisite', 'url'=>array('admin')),
);
?>

<h1>Create Prerequisite</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>