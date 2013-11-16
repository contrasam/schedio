<?php
/* @var $this EnrollmentController */

$this->breadcrumbs=array(
	'Enrollment',
);
?>
<h1><?php echo "My Schedule" ?></h1>

<p>

    <?php

    if(empty($enrollments)){
        echo "<b>No Schedules available</b>";
    }else{
         $course = "";
        foreach($enrollments as $enrollment){
                if(!($course == Section::model()->findByPk($enrollment->associatedSubSection->associatedSectionID)->associatedCourse->courseCode)){
                    $course = Section::model()->findByPk($enrollment->associatedSubSection->associatedSectionID)->associatedCourse->courseCode;
                    echo "<h4>".$course."</h4>";
                }
                if($enrollment->associatedSubSection->classType == 'LECT'){
                    echo "Section : <b>".$enrollment->associatedSubSection->sectionCode."</b> Type: LEC<br/>";
                }else if($enrollment->associatedSubSection->classType == 'TUTO'){
                    echo "Section : <b>".$enrollment->associatedSubSection->sectionCode."</b> Type: TUT <a href='/schedio/index.php/enrollment/update/".$enrollment->EnrollmentID."'>Change Section</a><br/>";

                }
                foreach($enrollment->associatedSubSection->sectiontimes as $sectionTime){
                    echo $sectionTime->day." | from ".$sectionTime->fromTime." | to ".$sectionTime->toTime;
                    echo "<br/>";
                }
                echo CHtml::link(
                    'Drop Section',
                    array('/enrollment/delete/','id'=>$enrollment->EnrollmentID),
                    array('confirm' => 'Confirm by pressing OK to drop section (This will remove you also from all related courses)')
                );
                echo "<br/>";
                echo "<br/>";

        }
    }
    ?>
</p>
