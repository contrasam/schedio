<?php
/* @var $this SectiontimeController */
/* @var $model Sectiontime */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SectionTimeID'); ?>
		<?php echo $form->textField($model,'SectionTimeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'associatedSubSection'); ?>
		<?php echo $form->textField($model,'associatedSubSection'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fromTime'); ?>
		<?php echo $form->textField($model,'fromTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'toTime'); ?>
		<?php echo $form->textField($model,'toTime'); ?>
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