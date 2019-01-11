<!DOCTYPE HTML>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__).'/navbar.html');
include(dirname(__DIR__).'/sidebar.html');?>

    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
        <label class="mt-3" style="font-size: 25px;"><img src="https://img.icons8.com/ios-glyphs/30/000000/plus-math.png" width="22px" height="22px"> Add event</label>
        </div>
        <div class="container col">
            <label class="mt-1" style="font-size: 18px">Basic Information</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>

            <div class="container row ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Begin Date</span>
                    </div>
                    <input type="date" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <input type="time" class="form-control col-sm-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    </div>
                    <input type="date" class="form-control col-sm-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <input type="time" class="form-control col-sm-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Street and Number</span>
                </div>
                <input type="text" class="form-control col" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <input type="text" class="form-control col-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>

        <div class="container col d-flex ">
            <button type="button" class="btn btn-primary mb-3 ml-auto">Add event</button>
        </div>
    </div>

</body>
</html>
