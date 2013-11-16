<?php
/* @var $this SectiontimeController */
/* @var $data Sectiontime */
?>

<div class="view">

    <b><?php echo CHtml::encode("Course Name = ".$data->associatedSubSection0->associatedSection->associatedCourse->courseName." | Professor Net Name = ".$data->associatedSubSection0->associatedSection->assignedProfessor->netName." | Section Code = ".$data->associatedSubSection0->sectionCode); ?></b><br/>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
	<?php echo CHtml::encode($data->day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fromTime')); ?>:</b>
	<?php echo CHtml::encode($data->fromTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('toTime')); ?>:</b>
	<?php echo CHtml::encode($data->toTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>