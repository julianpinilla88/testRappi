<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?= base_url(); ?>application/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?= base_url(); ?>application/assets/js/jqueryd.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>application/assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php if(isset($message)){?>
        <div class="row">
            <div class="col-lg-12"><div class="alert alert-success"><?=$message?></div></div>
        </div>
    <?php }?>
    <div class="row">
        <fieldset>
            <legend>Resultado Errores</legend>
            <div class="col-lg-12">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td class="text-center"><strong>Error</strong></td>
                    </tr>

                            <tr>
                                <td><?=$this->respError?></td>
                            </tr>

                </table>
                <a href="<?= base_url();?>index.php/cubeSummationController/addCubeSummation" class="btn btn-success">Regresar</a> 
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>