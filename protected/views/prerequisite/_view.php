<?php
/* @var $this PrerequisiteController */
/* @var $data Prerequisite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('associatedCourse')); ?>:</b>
	<?php echo CHtml::encode($data->associatedCourse0->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prerequisite')); ?>:</b>
	<?php echo CHtml::encode($data->prerequisite0->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>