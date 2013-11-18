<script src="http://localhost/schedio/assets/59a60276/jquery.min.js"></script>
<script type="text/javascript">

    function send() {
        var data = $("#yw0").serialize();
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

<div id="user-courses">
    <h3>Select Courses</h3>
    <?php
    $this->renderPartial('_ajaxCourses', array(
        'courses' => $courses,
    ));
    ?>
</div>


