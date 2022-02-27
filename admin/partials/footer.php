    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
	    $(document).ready(function(){
	        $('#selectAllBoxes').click(function(event){
	            event.preventDefault();

	            if (this.checked) {
	            	$('.checkBoxes').each(function(){
	            		this.checked = true;
		            })	
	            }
	            else
	            {
	            	$('.checkBoxes').each(function(){
	            		this.checked = false;
		            })	
	            }

	            
	        })

	        var divBox = "<div id='load-screen'><div id='loading'>Loading...</div></div>";
	        $('#page-wrapper').prepend(divBox);
	        $('#load-screen').delay(700).fadeOut(600,function(){
	        	$this.remove();
	        })
	    });
	</script>

	<script>
	        CKEDITOR.replace( 'post_content' );
	</script>

</body>

</html>