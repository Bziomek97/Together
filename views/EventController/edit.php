<!DOCTYPE HTML>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__) . '/navbar.php');
include(dirname(__DIR__) . '/sidebar.php');?>

<script type="text/javascript" src="../../public/js/inputDateCheck.js"></script>

<div id="alertDate"> </div>

<form method="POST" action="?page=eventEdit">
    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
            <label class="mt-3" style="font-size: 25px;"><img src="https://img.icons8.com/ios/50/000000/settings.png" width="22px" height="22px"> Edit event</label>
        </div>
        <div class="container col">
            <label class="mt-1" style="font-size: 18px">Basic Information</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" id="name" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['name']);?>" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <textarea class="form-control" name="description" aria-label="With textarea"><?php echo($event['description']);?></textarea>
            </div>

            <div class="container row ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Begin Date</span>
                    </div>
                    <input type="date" name="bdate" id="bdate" class="form-control col-sm-2" onblur="checkStartDate()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['begindate']['date']);?>" required>
                    <input type="time" name="btime" id="btime" class="form-control col-sm-2" onblur="checkStartDate()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['begindate']['time']);?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    </div>
                    <input type="date" name="edate" id="edate" onblur="checkEndDate()" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['enddate']['date']);?>" required>
                    <input type="time" name="etime" id="etime" onblur="checkEndDate()" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['enddate']['time']);?>" required>
                </div>
            </div>
        </div>

        <input type="hidden" name="oldevent" value="<?= $event['name'];?>" />
        <div class="container col d-flex ">
            <button type="submit" class="btn btn-primary mb-3 ml-auto">Edit event</button>
        </div>
    </div>
</form>
</body>
</html>
