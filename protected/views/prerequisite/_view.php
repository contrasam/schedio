<?php
/* @var $this PrerequisiteController */
/* @var $data Prerequisite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('associatedCourseID')); ?>:</b>
	<?php echo CHtml::encode($data->associatedCourse->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prerequisiteCourseID')); ?>:</b>
	<?php echo CHtml::encode($data->prerequisiteCourse->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>