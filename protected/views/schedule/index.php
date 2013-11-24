<?php

$this->breadcrumbs = array(
    'Schedule Planner',
);
?>
<script src="http://localhost/schedio/assets/59a60276/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost/schedio/assets/9e19b393/css/hint.css">

<style>
    table {
        table-layout: fixed
    }

    td {
        overflow: hidden;
        white-space: nowrap;
        cursor: default
    }

</style>
<script type="text/javascript">

    function addSection(id) {

        var srcId = "#section_" + id;
        var dscId = "addedSection_" + id;
        var dscDiv = "<div id=" + dscId + " class='view'></div>";
        var removeButton = "<input type='button' id='removeButton_" + id + "' value='Remove Course' onclick='removeSection(" + id + ")'>";
        var subSectionIds = idsLike("SUBSEC");
        var subSections = new Array();

        for (var i in subSectionIds) {
            if (subSectionIds[i].slice(-2) == id) {
                $("#" + subSectionIds[i] + " input:radio:checked").each(function () {
                    subSections.push($(this).attr('id'));
                });
            }
        }


        var sectionIds = idsLike("addedSection");
        if (sectionIds.length <= 4) {
            $("#added-courses").append(dscDiv);
            $("#" + dscId).append($(srcId).html() + removeButton);
            $(srcId).remove();
            $("#button_" + id).remove();
        } else {
            alert("Only 5 courses can be added for schedule generation");
        }

        retainChecked(subSections);

    }

    function retainChecked(ids) {
        for (var k in ids) {
            $("#" + ids[k]).attr('checked', true);
        }
    }

    function removeSection(id) {
        var srcId = "#addedSection_" + id;
        var dscId = "section_" + id;
        var dscDiv = "<div id=" + dscId + " class='view'></div>";
        var addButton = "<input type='button' id='button_" + id + "' value='Add Course' onclick='addSection(" + id + ")'>";
        $("#user-courses").append(dscDiv);
        $("#" + dscId).append($(srcId).html() + addButton);
        $(srcId).remove();
        $("#removeButton_" + id).remove();
    }

    function idsLike(str) {
        var nodes = document.body.getElementsByTagName('*'),
            L = nodes.length, A = [], temp;
        while (L) {
            temp = nodes[--L].id || '';
            if (temp.indexOf(str) == 0) A.push(temp);
        }
        return A;
    }

    function send() {
        var data = $("#yw0").serialize();
        $("#added-courses").html("");
        if (!($("#PreferenceForm_semester").val() === '' || $("#PreferenceForm_semester").val() === null)) {
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("schedule/updateAjax"); ?>',
                dataType: 'html',
                data: data,
                success: function (data) {
                    $("#user-courses").html(data);
                },
                error: function () {
                    $("#user-courses").html("Error occurred, please try again");
                }
            });
        } else {
            alert("Select a semester value");
        }
    }

    function generateSchedule() {
        var courseSelected = false;
        var ids = new Array();
        var sectionIds = idsLike("addedSection");
        var subSectionIds = idsLike("SUBSEC");
        var sIds = new Array();


        for (var i in sectionIds) {
            if (!(sectionIds[i] === null || sectionIds[i] === undefined || sectionIds[i] === '')) {
                courseSelected = true;
                ids.push(sectionIds[i].split("_").pop());
                for (var l in subSectionIds) {
                    if (subSectionIds[l].slice(-2) == sectionIds[i].split("_").pop()) {
                        $("#" + subSectionIds[l] + " input:radio:checked").each(function () {
                            sIds.push($(this).attr('id').slice(-2));
                        });
                    }
                }
            }
        }
        var data = ("SectionIDs=" + ids + "&SubSectionIDs=" + sIds);
        console.log(data);

        if (courseSelected) {
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("schedule/generateSchedule"); ?>',
                dataType: 'html',
                data: data,
                success: function (data) {
                    $("#generate-status").html(data);
                },
                error: function () {
                    $("#generate-error").html("Error occurred, please try again");
                }
            });
        }
    }

    function registerSchedule(idsArray) {

        var data = ("regSectionIDs=" + idsArray);

        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("schedule/registerSchedule"); ?>',
            dataType: 'html',
            data: data,
            success: function (data) {
                window.location.replace("http://localhost/schedio/index.php/enrollment/index");
            },
            error: function (data) {
                $("#register-error").html(data);
            }
        });
    }

</script>
<div id="user-preferences">
    <h3>Select Preferences</h3>
    <?php
    $this->renderPartial('_preference', array(
        'model' => $model,
    ));
    ?>
</div>
<br/>
<h3>Select Courses</h3>
<div id="user-courses">
    <?php
    $this->renderPartial('_ajaxCourses', array(
        'courses' => $courses,
    ));
    ?>
</div>
<br/>
<h3>Courses Added For Registration</h3>
<div id="added-courses">

</div>
<div id="generate-button">
    <input type="button" onclick="generateSchedule();" value="Check Schedule">
</div>
<br/>
<div id="generate-status">
    <?php
    $this->renderPartial('_ajaxStatus', array(
        'sectionIDs' => $sectionIDs,
        'subSectionIDs' => $subSectionIDs,
        'eligible' => $eligible,
        'comparedRecords' => $comparedRecords,
    ));
    ?>
</div>
<div id="generate-error">

</div>
<div id="register-error">
    <?php
    $this->renderPartial('_ajaxRegister', array(
        'status' => $status,
    ));
    ?>
</div>





