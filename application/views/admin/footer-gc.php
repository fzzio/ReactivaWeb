        </div><!-- fin #wrapper -->

  		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  		
		
        <?php if (isset($js_files)): ?> 
	        <!-- grocerycrud -->
	        <?php foreach($js_files as $file): ?>
	            <script type="text/javascript" src="<?php echo $file; ?>"></script>
	        <?php endforeach; ?>
	        <!-- grocerycrud -->
	        <?php if (isset($js_files_dd)): ?>
	            <!-- Dependent Dropdown -->
	            <?php echo $js_files_dd; ?>
	            <!-- Dependent Dropdown -->            
	        <?php endif ?>
	    <?php else: ?>
	        <!-- jQuery -->
	       
	        
	    <?php endif ?>

	    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	    <script type="text/javascript" src="<?php echo base_url('assets/js/metisMenu.js'); ?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/sb-admin-2.js'); ?>"></script>
        </body>
</html>