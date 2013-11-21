<script src="http://localhost/schedio/assets/59a60276/jquery.min.js"></script>
<script type="text/javascript">

    function addSection(id) {
        var srcId = "#section_" + id;
        var dscId = "addedSection_" + id;
        var dscDiv = "<div id=" + dscId + " class='view'></div>";
        var removeButton = "<input type='button' id='removeButton_" + id + "' value='Remove Course' onclick='removeSection(" + id + ")'>";
        var sectionIds = idsLike("addedSection");
        if(sectionIds.length <= 4){
            $("#added-courses").append(dscDiv);
            $("#" + dscId).append($(srcId).html() + removeButton);
            $(srcId).remove();
            $("#button_" + id).remove();
        }else{
            alert("Only 5 courses can be added for schedule generation");
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
        var sectionIds = idsLike("addedSection")
        for (var i in sectionIds) {
            if (!(sectionIds[i] === null || sectionIds[i] === undefined || sectionIds[i] === '')) {
                courseSelected = true;
                ids.push(sectionIds[i].split("_").pop());
            }
        }
        var data = ("SectionIDs="+ids);
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
    <input type="button" onclick="generateSchedule();" value="Generate Schedule">
</div>
<div id="generate-status">
    <?php
    $this->renderPartial('_ajaxStatus', array(
        'sectionIDs' => $sectionIDs,
    ));
    ?>
</div>
<div id="generate-error">

</div>




