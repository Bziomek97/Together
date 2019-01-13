<!DOCTYPE HTML>
<html>

    <?php include(dirname(__DIR__).'/head.html'); ?>

<body>

    <?php include(dirname(__DIR__) . '/navbar.php');
    include(dirname(__DIR__) . '/sidebar.php');?>

    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
            <label class="mt-2" style="font-size: 25px;">Edit account information</label>
        </div>
        <div class="container col">
            <label class="mt-1" style="font-size: 20px;">Basic information</label>
        </div>
        <div class="container col">
            <label class="mt-1">Change E-mail</label>
        </div>
        <div class="container col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="container col">
            <label class="mt-1">Change Password</label>
        </div>
        <div class="container col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon12"><img src="https://img.icons8.com/ios/50/000000/key.png" width="15px" height="15px"></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon12">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><img src="https://img.icons8.com/ios/50/000000/key.png" width="15px" height="15px"></span>
                </div>
                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="container col d-flex ">
            <button type="button" class="btn btn-primary mb-3 ml-auto">Save</button>
        </div>

    </div>

</body>
</html>
