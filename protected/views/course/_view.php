<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseCode')); ?>:</b>
	<?php echo CHtml::encode($data->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseName')); ?>:</b>
	<?php echo CHtml::encode($data->courseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credits')); ?>:</b>
	<?php echo CHtml::encode($data->credits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>