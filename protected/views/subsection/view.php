<?php
/* @var $this SubsectionController */
/* @var $model Subsection */

$this->breadcrumbs=array(
	'Subsections'=>array('index'),
	$model->SubsectionID,
);

$this->menu=array(
	array('label'=>'List Subsection', 'url'=>array('index')),
	array('label'=>'Create Subsection', 'url'=>array('create')),
	array('label'=>'Update Subsection', 'url'=>array('update', 'id'=>$model->SubsectionID)),
	array('label'=>'Delete Subsection', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SubsectionID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subsection', 'url'=>array('admin')),
);
?>

<h1>View Subsection #<?php echo $model->SubsectionID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'associatedSection',
		'sectionCode',
		'classType',
		'roomNumber',
		'buildingCode',
		'sectionSize',
		'currentSectionSize',
		'created',
		'modified',
	),
)); ?>
