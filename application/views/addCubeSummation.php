<!DOCTYPE html>
<html>
<head>
    <link href="<?= base_url(); ?>application/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?= base_url(); ?>application/assets/js/jqueryd.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>application/assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-10">
        <fieldset>
            <legend>CUBE SUMMATION</legend>
            <form class="form-horizontal" role="form" action='<?= base_url(); ?>index.php/cubeSummationController/save' method="post">
                <div class="form-group">
                    <label for="comment">Matriz:</label>
                    <textarea class="form-control" rows="5" name="matriz" id="matriz"></textarea>

                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" class="btn btn-success">Generar</button>
                         <a href="<?= base_url(); ?>controllers/cubeSummationController"</a>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>

