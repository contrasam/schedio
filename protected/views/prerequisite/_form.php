<?php
/* @var $this PrerequisiteController */
/* @var $model Prerequisite */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prerequisite-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'associatedCourseID'); ?>
        <?php $courses = Course::model()->findAll();
        $list = CHtml::listData($courses,
            'courseID', 'courseCode');
        echo $form->dropDownList($model, 'associatedCourseID',
            $list,
            array('empty' => 'Select a course'));
        ?>
		<?php echo $form->error($model,'associatedCourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prerequisiteCourseID'); ?>
        <?php $courses = Course::model()->findAll();
        $list = CHtml::listData($courses,
            'courseID', 'courseCode');
        echo $form->dropDownList($model, 'prerequisiteCourseID',
            $list,
            array('empty' => 'Select a course'));
        ?>
		<?php echo $form->error($model,'prerequisiteCourseID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->