<?php
/* @var $this SubsectionController */
/* @var $data Subsection */
?>

<div class="view">

	<?php
    $section = Section::model()->findByPk($data->associatedSectionID);
    ?>

	<b><?php echo CHtml::encode("Course Name = ".$section->associatedCourse->courseName." | Professor Net Name = ".$section->assignedProfessor->netName); ?></b><br/>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionCode')); ?>:</b>
	<?php echo CHtml::encode($data->sectionCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classType')); ?>:</b>
	<?php echo CHtml::encode($data->classType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomNumber')); ?>:</b>
	<?php echo CHtml::encode($data->roomNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buildingCode')); ?>:</b>
	<?php echo CHtml::encode($data->buildingCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionSize')); ?>:</b>
	<?php echo CHtml::encode($data->sectionSize); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('currentSectionSize')); ?>:</b>
	<?php echo CHtml::encode($data->currentSectionSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>