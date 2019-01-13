<!DOCTYPE HTML>
<html>

    <?php include(dirname(__DIR__).'/head.html'); ?>

<body>
    <?php include(dirname(__DIR__) . '/navbar.php');
    include(dirname(__DIR__) . '/sidebar.php');?>

    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
            <label class="mt-3" style="font-size: 25px;">List of events</label>
        </div>

        <div class="container col pb-1">
            <table class="table">
                <thead>
                    <th scope="col" class="col-sm-1">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Place</th>
                    <th scope="col" class="col-2">Options</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>NiceEvent</td>
                        <td>Somewhere</td>
                        <td>DELETE?</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Event</td>
                        <td>Somewhere</td>
                        <td>DELETE?</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
