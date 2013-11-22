<?php
foreach ($courses as $subSection) {
    if($subSection->classType == 'LECT'){
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
        $relatedSections = Subsection::model()->findAllByAttributes(array(
            'associatedSectionID' => $subSection->associatedSectionID,
        ));
        echo "<div id='SUBSEC_".$subSection->SubsectionID."'>";
        foreach($relatedSections as $relatedSection){

            if(($relatedSection->classType == 'TUTO') && startsWith($relatedSection->sectionCode,$subSection->sectionCode)){
                echo "<input type='radio' name='TUTO_".$relatedSection->associatedSectionID."' id=TUTO_".$relatedSection->SubsectionID." value='".$relatedSection->classType."_".$relatedSection->sectionCode."_".$relatedSection->SubsectionID."'>".$relatedSection->classType." ".$relatedSection->sectionCode."  ";
                foreach ($relatedSection->sectiontimes as $relatedSectionTime) {
                    echo $relatedSectionTime->day;
                    echo " from :".$relatedSectionTime->fromTime." to :".$relatedSectionTime->toTime." ";
                }
                echo "<br/>";
                echo "<br/>";
            }else if(($relatedSection->classType == 'LAB') && startsWith($relatedSection->sectionCode,$subSection->sectionCode)){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;"."<input type='radio' name='LAB_".$relatedSection->associatedSectionID."' id=LAB_".$relatedSection->SubsectionID.">".$relatedSection->classType." ".$relatedSection->sectionCode."  ";
                foreach ($relatedSection->sectiontimes as $relatedSectionTime) {
                    echo $relatedSectionTime->day;
                    echo " from :".$relatedSectionTime->fromTime." to :".$relatedSectionTime->toTime." ";
                }
                echo "<br/>";
                echo "<br/>";
            }
        }
        echo "</div>";
        echo "<br/>";
        echo "<input type='button' id='button_".$subSection->SubsectionID."' onclick='addSection(".$subSection->SubsectionID.")' value='Add Course'>";
        echo "</div>";
    }
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

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}

