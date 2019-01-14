<!DOCTYPE HTML>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__) . '/navbar.php');
include(dirname(__DIR__) . '/sidebar.php');?>

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
                    <input type="date" name="bdate" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['begindate']['date']);?>" required>
                    <input type="time" name="btime" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['begindate']['time']);?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    </div>
                    <input type="date" name="edate" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['enddate']['date']);?>" required>
                    <input type="time" name="etime" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['enddate']['time']);?>" required>
                </div>
            </div>
        </div>
        <div class="container col">
            <label class="mt-4" style="font-size: 18px">Localization</label>
        </div>
        <div class="container col ">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Place</span>
                </div>
                <input type="text" name="place" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['place']['name']);?>" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Street and Number</span>
                </div>
                <input type="text" name="street" class="form-control col" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['place']['street']);?>">
                <input type="text" name="number" class="form-control col-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['place']['number']);?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                </div>
                <input type="text" name="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo($event['place']['city']);?>">
            </div>
        </div>

        <input type="hidden" name="oldevent" value="<?php echo($event['name']);?>" >
        <div class="container col d-flex ">
            <button type="submit" class="btn btn-primary mb-3 ml-auto">Add event</button>
        </div>
    </div>
</form>
</body>
</html>
