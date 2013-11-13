<?php
/* @var $this SectiontimeController */
/* @var $model Sectiontime */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sectiontime-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'associatedSubSection'); ?>
        <?php $subSections = Subsection::model()->findAll();
        $list = CHtml::listData($subSections,
            'SubsectionID', 'SubsectionID');
        echo $form->dropDownList($model, 'associatedSubSection',
            $list,
            array('empty' => 'Select a sub-section'));
        ?>
		<?php echo $form->error($model,'associatedSubSection'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
        <?php echo $form->dropDownList($model,'day',array('' => 'Select Day','MON' => 'Monday','TUE' => 'Tuesday','WED' => 'Wednesday','THR' => 'Thursday','FRI' => 'Friday','SAT' => 'Saturday','SUN' => 'Sunday'))?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fromTime'); ?>
        <?php echo $form->dropDownList($model,'fromTime',array('' => 'Select Time','10:15:00' => '10:15:00', '10:30:00' => '10:30:00', '10:45:00' => '10:45:00','11:00:00' => '11:00:00','11:15:00' => '11:15:00','11:30:00' => '11:30:00','11:45:00' => '11:45:00','12:00:00' => '12:00:00','12:15:00' => '12:15:00','12:30:00' => '12:30:00','12:45:00' => '12:45:00','13:00:00' => '13:00:00','13:15:00' => '13:15:00','13:30:00' => '13:30:00','13:45:00' => '13:45:00','14:00:00' => '14:00:00','14:15:00' => '14:15:00','14:30:00' => '14:30:00','14:45:00' => '14:45:00','15:00:00' => '15:00:00','15:15:00' => '15:15:00','15:30:00' => '15:30:00','15:45:00' => '15:45:00','16:00:00' => '16:00:00','16:15:00' => '16:15:00','16:30:00' => '16:30:00','16:45:00' => '16:45:00','17:00:00' => '17:00:00','17:15:00' => '17:15:00','17:30:00' => '17:30:00','17:45:00' => '17:45:00','18:00:00' => '18:00:00','18:15:00' => '18:15:00','18:30:00' => '18:30:00','18:45:00' => '18:45:00','19:00:00' => '19:00:00','19:15:00' => '19:15:00','19:30:00' => '19:30:00','19:45:00' => '19:45:00','20:00:00' => '20:00:00','20:15:00' => '20:15:00')); ?>
		<?php echo $form->error($model,'fromTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'toTime'); ?>
        <?php echo $form->dropDownList($model,'toTime',array('' => 'Select Time','10:15:00' => '10:15:00', '10:30:00' => '10:30:00', '10:45:00' => '10:45:00','11:00:00' => '11:00:00','11:15:00' => '11:15:00','11:30:00' => '11:30:00','11:45:00' => '11:45:00','12:00:00' => '12:00:00','12:15:00' => '12:15:00','12:30:00' => '12:30:00','12:45:00' => '12:45:00','13:00:00' => '13:00:00','13:15:00' => '13:15:00','13:30:00' => '13:30:00','13:45:00' => '13:45:00','14:00:00' => '14:00:00','14:15:00' => '14:15:00','14:30:00' => '14:30:00','14:45:00' => '14:45:00','15:00:00' => '15:00:00','15:15:00' => '15:15:00','15:30:00' => '15:30:00','15:45:00' => '15:45:00','16:00:00' => '16:00:00','16:15:00' => '16:15:00','16:30:00' => '16:30:00','16:45:00' => '16:45:00','17:00:00' => '17:00:00','17:15:00' => '17:15:00','17:30:00' => '17:30:00','17:45:00' => '17:45:00','18:00:00' => '18:00:00','18:15:00' => '18:15:00','18:30:00' => '18:30:00','18:45:00' => '18:45:00','19:00:00' => '19:00:00','19:15:00' => '19:15:00','19:30:00' => '19:30:00','19:45:00' => '19:45:00','20:00:00' => '20:00:00','20:15:00' => '20:15:00')); ?>
		<?php echo $form->error($model,'toTime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->