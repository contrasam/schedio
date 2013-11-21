<?php
foreach ($courses as $subSection) {
    echo "<div id=section_".$subSection->SubsectionID." class='view'>";
    echo "<b>" . $subSection->associatedSection->associatedCourse->courseName . "</b> " . $subSection->associatedSection->associatedCourse->courseCode ." <b>".$subSection->associatedSection->associatedCourse->credits. " credits</b> <br/>";
    $first = true;
    foreach (getPrerequisites($subSection->associatedSection->associatedCourse->courseID) as $pCourse) {
        if ($first)
            echo "Prerequisites : ";

        echo $pCourse . ", ";
        $first = false;
    }
    echo "<br/>";
    echo $subSection->associatedSection->semester;
    echo "<br/>";
    echo $subSection->classType . " " . $subSection->sectionCode . " ";
    foreach ($subSection->sectiontimes as $sectionTime) {
        echo $sectionTime->day;
        echo " from :".$sectionTime->fromTime." to :".$sectionTime->toTime." ";
    }
    echo "<br/>";
    echo "<br/>";
    echo "<input type='button' id='button_".$subSection->SubsectionID."' onclick='addSection(".$subSection->SubsectionID.")' value='Add Course'>";
    echo "</div>";
}

function getPrerequisites($courseID)
{
    $prerequisites = Prerequisite::model()->findAllByAttributes(array(
        'associatedCourseID' => $courseID,
    ));
    $courseList = array();
    foreach ($prerequisites as $prerequisite) {
        $course = Course::model()->findByPk($prerequisite->prerequisiteCourseID);
        $courseList[] = $course->courseCode;
    }
    return $courseList;
}

