<?php
/**
 * Created by PhpStorm.
 * User: PradeepSamuel
 * Date: 19/11/13
 * Time: 6:39 PM
 */
$userId = Yii::app()->user->id;
$enrollments = Enrollment::model()->findAllByAttributes(array('associatedStudentID' => $userId));
echo "<h5>Your Current Schedule</h5>";
if (empty($enrollments)) {
    echo "<b>(Your are not registered for any course currently)</b><br/><br/>";
} else {
    $course = "";
    foreach ($enrollments as $enrollment) {
        echo "<div class='view'>";
        if (!($course == Section::model()->findByPk($enrollment->associatedSubSection->associatedSectionID)->associatedCourse->courseCode)) {
            $course = Section::model()->findByPk($enrollment->associatedSubSection->associatedSectionID)->associatedCourse->courseCode;
            echo "<h4>" . $course . "</h4>";
        }
        if ($enrollment->associatedSubSection->classType == 'LECT') {
            echo "Section : <b>" . $enrollment->associatedSubSection->sectionCode . "</b> Type: LEC<br/>";
        } else if ($enrollment->associatedSubSection->classType == 'TUTO') {
            echo "Section : <b>" . $enrollment->associatedSubSection->sectionCode . "</b> Type: TUT <br/>";
        } else if ($enrollment->associatedSubSection->classType == 'LAB') {
            echo "Section : <b>" . $enrollment->associatedSubSection->sectionCode . "</b> Type: LAB <br/>";
        }
        foreach ($enrollment->associatedSubSection->sectiontimes as $sectionTime) {
            echo $sectionTime->day . " | from " . $sectionTime->fromTime . " | to " . $sectionTime->toTime;
            echo "<br/>";
        }
        echo "</div>";
    }
}
echo "<h5>Your Selected Schedule</h5>";
echo "<p><b>(Hover over the colored courses and their section(s) to know the status)</b></p>";
if (!($sectionIDs == '')) {
    if (!($subSectionIDs == '')) {
        if (!($eligible == '') && !empty($eligible)) {
            $eligibleSections = Subsection::model()->findAllByPk($eligible);
            $selectedSubSections = Subsection::model()->findAllByPk(explode(",", $sectionIDs));
            $relatedSubsections = Subsection::model()->findAllByPk(explode(",", $subSectionIDs));

            if (!empty($eligibleSections)) {
                echo "You are allowed to register for the following sections: ";
                echo "<ul id='eligible-sections'>";
                foreach ($eligibleSections as $eligibleSection) {
                    echo "<li>" . $eligibleSection->sectionCode . " " . $eligibleSection->classType . " " . $eligibleSection->associatedSection->associatedCourse->courseCode . "</li>";
                }
                echo "</ul>";
            } else {
                echo "You are not allowed to register for the sections due to several reasons, listed as follows";
                echo "<br/>";
                echo "<ol id='possible-reasons'>";
                echo "<li>Your current courses registered for are overlapping with the selected courses</li>";
                echo "<li>The courses chosen for registration may have time overlaps between them.</li>";
                echo "<li>You are blocked from registering for ny course.</li>";
                echo "</ol>";
            }
            echo "<div class='view'>";
            echo "<table>";
            foreach ($selectedSubSections as $selectedSubSection) {
                $sectionInfo = "";
                $overlapStatus = isTimeOverlapped($selectedSubSection, $comparedRecords);
                if (!empty($overlapStatus['OverlappedWith'])) {
                    foreach ($overlapStatus['OverlappedWith'] as $overlappedSection) {
                        if ($overlappedSection != $selectedSubSection->SubsectionID)
                            $sectionInfo [] = Subsection::model()->findByPk($overlappedSection)->sectionCode . " " . Subsection::model()->findByPk($overlappedSection)->classType . " " . Subsection::model()->findByPk($overlappedSection)->associatedSection->associatedCourse->courseCode;
                        $sectionInfo = array_diff($sectionInfo, array(
                            $selectedSubSection->sectionCode . " " . $selectedSubSection->classType . " " . $selectedSubSection->associatedSection->associatedCourse->courseCode,
                        ));
                    }
                    $sectionInfo = implode(",", $sectionInfo);
                }
                if ($selectedSubSection->classType == 'LECT') {
                    if (!empty($overlapStatus) && $overlapStatus['count'] > 0) {
                        if (!empty($sectionInfo))
                            echo "<tr id='sel_" . $selectedSubSection->associatedSectionID . "' class='hint--bottom' style='background-color:#F08080;' data-hint='Time overlap with section(s) " . $sectionInfo . "'>";
                    } else {
                        echo "<tr id='sel_" . $selectedSubSection->associatedSectionID . "' class='hint--bottom' style='background-color:#90EE90;' data-hint='No Time Overlap(s)'>";
                    }
                    echo "<td>Semester : " . $selectedSubSection->associatedSection->semester . "  Course : " . $selectedSubSection->associatedSection->associatedCourse->courseName . " " . $selectedSubSection->associatedSection->associatedCourse->courseCode . "</td>";
                    echo "<td>" . $selectedSubSection->classType . " " . $selectedSubSection->sectionCode . "</td>";
                    foreach ($selectedSubSection->sectiontimes as $selectedTime) {
                        echo "<td>" . $selectedTime->day . " from: " . $selectedTime->fromTime . " to: " . $selectedTime->toTime . "</td>";
                    }
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td></td>";
                    echo "</tr>";
                    foreach ($relatedSubsections as $relatedSubsection) {
                        $Info = "";
                        $relatedOverlapStatus = isTimeOverlapped($relatedSubsection, $comparedRecords);
                        if (!empty($relatedOverlapStatus['OverlappedWith'])) {
                            foreach ($relatedOverlapStatus['OverlappedWith'] as $overlappedSection) {
                                if ($relatedSubsection->SubsectionID != $overlappedSection) {
                                    if ($overlappedSection != $relatedSubsection->SubsectionID)
                                        $relSectionInfo [] = Subsection::model()->findByPk($overlappedSection)->sectionCode . " " . Subsection::model()->findByPk($overlappedSection)->classType . " " . Subsection::model()->findByPk($overlappedSection)->associatedSection->associatedCourse->courseCode;
                                    $relSectionInfo = array_diff($relSectionInfo, array(
                                        $relatedSubsection->sectionCode . " " . $relatedSubsection->classType . " " . $relatedSubsection->associatedSection->associatedCourse->courseCode,
                                        $selectedSubSection->sectionCode . " " . $selectedSubSection->classType . " " . $selectedSubSection->associatedSection->associatedCourse->courseCode,
                                    ));
                                }
                            }
                            $Info = implode(",", array_unique($relSectionInfo));
                        }

                        if ($selectedSubSection->associatedSectionID == $relatedSubsection->associatedSectionID) {
                            if ($relatedOverlapStatus['count'] > 0) {
                                if (!empty($Info))
                                    echo "<tr id='rel_" . $relatedSubsection->associatedSectionID . "' class='hint--bottom' style='background-color:#F08080;' data-hint='Time overlap with section(s) " . $Info . "'>";
                            } else {
                                echo "<tr id='rel_" . $relatedSubsection->associatedSectionID . "' class='hint--bottom' style='background-color:#90EE90;' data-hint='No Time Overlap(s)' >";
                            }
                            echo "<td>" . $relatedSubsection->classType . " " . $relatedSubsection->sectionCode . " ";
                            foreach ($relatedSubsection->sectiontimes as $relatedTime) {
                                echo $relatedTime->day . " from: " . $relatedTime->fromTime . " to: " . $relatedTime->toTime . "</td>";
                            }
                            echo "</tr>";
                        }
                    }
                    echo "<tr>";
                    echo "<td>=======================================================================================================================================================================================</td>";
                    echo "</tr>";

                }
            }
            echo "</table>";
            if (sizeof(array_diff(array_merge(explode(",", $sectionIDs), explode(",", $subSectionIDs)), $eligible)) == 0) {
                $eligibleJsString = "[" . implode(",", $eligible) . "]";
                echo "<input type='button' value='Register Schedule' onclick='registerSchedule(" . $eligibleJsString . ")'>";
            } else {
                echo "Change you choice of sections above to overcome time overlap(s)";
            }
            echo "</div>";
        } else {
            echo "You are not allowed to register for the section(s) due to several reasons, listed as follows <br/>";
            echo "<br/>";
            echo "<ol id='possible-reasons'>";
            echo "<li>Your current courses registered for are overlapping with the selected courses</li>";
            echo "<li>The courses chosen for registration may have time overlaps between them.</li>";
            echo "<li>You are blocked from registering for ny course.</li>";
            echo "</ol>";
        }

        var_dump(Yii::app()->user);
    }
}

function isTimeOverlapped($sectionObj, $recordsArray)
{
    $count = 0;
    $OverlappedWith = array();

    foreach ($recordsArray as $record) {
        if (($record['subSectionID'] == $sectionObj->SubsectionID)) {
            If ($record['overlapStatus']) {
                $count += 1;
                $OverlappedWith[] = $record['ComparedSectionID'];
            }
        }
    }

    return array(
        'count' => $count,
        'OverlappedWith' => array_unique($OverlappedWith, SORT_REGULAR),
    );
}
