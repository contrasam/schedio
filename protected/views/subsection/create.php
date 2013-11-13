<?php
/* @var $this SubsectionController */
/* @var $model Subsection */

$this->breadcrumbs=array(
	'Subsections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subsection', 'url'=>array('index')),
	array('label'=>'Manage Subsection', 'url'=>array('admin')),
);
?>

<h1>Create Subsection</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>