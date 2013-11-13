<?php
/* @var $this SectiontimeController */
/* @var $model Sectiontime */

$this->breadcrumbs=array(
	'Sectiontimes'=>array('index'),
	$model->SectionTimeID=>array('view','id'=>$model->SectionTimeID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sectiontime', 'url'=>array('index')),
	array('label'=>'Create Sectiontime', 'url'=>array('create')),
	array('label'=>'View Sectiontime', 'url'=>array('view', 'id'=>$model->SectionTimeID)),
	array('label'=>'Manage Sectiontime', 'url'=>array('admin')),
);
?>

<h1>Update Sectiontime <?php echo $model->SectionTimeID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>