<?php
/* @var $this SectiontimeController */
/* @var $model Sectiontime */

$this->breadcrumbs=array(
	'Sectiontimes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sectiontime', 'url'=>array('index')),
	array('label'=>'Manage Sectiontime', 'url'=>array('admin')),
);
?>

<h1>Create Sectiontime</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>