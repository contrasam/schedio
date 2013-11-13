<?php
/* @var $this SubsectionController */
/* @var $model Subsection */

$this->breadcrumbs=array(
	'Subsections'=>array('index'),
	$model->SubsectionID=>array('view','id'=>$model->SubsectionID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subsection', 'url'=>array('index')),
	array('label'=>'Create Subsection', 'url'=>array('create')),
	array('label'=>'View Subsection', 'url'=>array('view', 'id'=>$model->SubsectionID)),
	array('label'=>'Manage Subsection', 'url'=>array('admin')),
);
?>

<h1>Update Subsection <?php echo $model->SubsectionID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>