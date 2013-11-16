<?php
/* @var $this EnrollmentController */

$this->breadcrumbs=array(
    'Enrollment',
);
?>

<h1>Update Section <?php echo $model->associatedSubSection->associatedSection->associatedCourse->courseCode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>