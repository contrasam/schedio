<?php
/* @var $this SubsectionController */
/* @var $model Subsection */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SubsectionID'); ?>
		<?php echo $form->textField($model,'SubsectionID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'associatedSection'); ?>
		<?php echo $form->textField($model,'associatedSection'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sectionCode'); ?>
		<?php echo $form->textField($model,'sectionCode',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classType'); ?>
		<?php echo $form->textField($model,'classType',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roomNumber'); ?>
		<?php echo $form->textField($model,'roomNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buildingCode'); ?>
		<?php echo $form->textField($model,'buildingCode',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sectionSize'); ?>
		<?php echo $form->textField($model,'sectionSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currentSectionSize'); ?>
		<?php echo $form->textField($model,'currentSectionSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->