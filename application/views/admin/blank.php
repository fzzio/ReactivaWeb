<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-inner">
                    <?php if ( isset($output) ): ?>
                        <div class="box-header well" data-original-title="">
                            <h2>
                                <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<?php echo $PageTitle; ?>
                            </h2>
                        </div>
                        <div class="box-content">
                            <?php echo $output; ?>
                        </div>
                    <?php else: ?>
                        <div class="box-header well" data-original-title="">
                            <h2>
                                <i class="glyphicon glyphicon-warning-sign"></i>&nbsp;&nbsp;Atención
                            </h2>
                        </div>
                        <div class="box-content text-center">
                            <h3>No se encontró contenido</h3>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div><!--/row-->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->