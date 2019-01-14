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
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Place</th>
                    <th scope="col" class="col-2">Options</th>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <?php $i=1;
                    foreach ($event as $val):  ?>
                        <tr>
                            <th scope="row"> <?= $i;$i++;?></th>
                            <td class="col-6"> <?= $val['eventName']?></td>
                            <td class="col-5"> <?= $val['namePlace']?></td>
                            <td class="col-1"> Delete?</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
