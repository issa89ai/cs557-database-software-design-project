 <!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Our Reviews / Feedbacks</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="menu">
        <div class="container">
        	<div class="row">
        	<div class="col-lg-7">
			<h3>Recent Reviews</h3>
			<hr/>
        		<div class="sticky">
				
				<?php 
        	
				$getreview = $conn->query("SELECT * FROM review ");
				while($row= $getreview->fetch_assoc()){
        		?>
	        		<div>
	        			<div class="card-body">
	        				<div class="row">
		        				<p><b><?php echo $row['user_email'] ?></b></p><br/>
			        			<p> <b>Comment :</b><?php echo $row['message'] ?></p>
								<p> <b>Posted on :</b><?php echo $row['time_sent'] ?></p>
	        				</div>
	        			</div>
	        		</div>
					<hr/>
					<?php
				}
				?>
	        	</div>
        		
        		

        	</div>
        	<div class="col-md-5">
<h3>Drop your Review</h3>
<hr/>
        		<div class="container-fluid">
	<form action="" id="signup-frm">
		
		<div class="form-group">
			<label for="" class="control-label">Email Address</label>
			<input type="text" name="user-email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Enter your Comment</label>
			<textarea cols="100%" rows="7" name="message" required="" class="form-control"></textarea>
		</div>
		
		<button class="button btn btn-info btn-sm">Submit Review</button>
	</form>
</div>
        	</div>
        	</div>
        </div>
    </section>
   
    </style>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.qty-minus').click(function(){
		var qty = $(this).parent().siblings('input[name="qty"]').val();
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		if(qty == 1){
			return false;
		}else{
			 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		}
		})
		$('.qty-plus').click(function(){
			var qty =  $(this).parent().siblings('input[name="qty"]').val();
				 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					if(resp == 1){
						load_cart()
						end_load()
					}
				}
			})

		}
		
    </script>
	
