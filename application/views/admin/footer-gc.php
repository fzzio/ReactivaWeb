        </div><!-- fin #wrapper -->

        </div>
  
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

	    
        </body>
</html>