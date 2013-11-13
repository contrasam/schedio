<?php
/* @var $this SectionController */
/* @var $data Section */
?>

<div class="view">
    <?php $course = Course::model()->findByPk($data->associatedCourseID)?>
    <?php $user = User::model()->findByPk($data->assignedProfessorID)?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('associatedCourseID')); ?>:</b>
	<?php echo CHtml::encode($course->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assignedProfessorID')); ?>:</b>
	<?php echo CHtml::encode($user->netName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>