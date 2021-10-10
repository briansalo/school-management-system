@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

  <div class="content-wrapper">
	  <div class="container-full">

	  	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Monthly Salary </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">


			  <div class="row">
				<div class="col">

					 <div class="row">

							<div class="col-md-6">
							<div class="form-group">
								<h5>Month <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="month" name="month_id" id="month_id" class="form-control">
									 <div class="help-block"></div></div>

							</div>
							</div><!-- end col md 6 -->

							<div class="col-md-6">
										 			<div class="col-md-3" style="padding-top: 25px;">
															<a id="search" class="btn btn-primary" name="search"> Search</a>
													</div>		
							</div><!-- end col md 6 -->

					 </div><!-- /.row -->



						 					<!--  ////////////////////////////////////////////  this is the table //////////////////////////////////////////  -->
						 

								<div class="row d-none " id="roll-generate">


									<div class="col-12">

							 		<div class="col-md-4">
											<div class="form-group">
												<br>
												<h5>Search <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="search_name" id="search_name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
											</div>
							 		</div><!-- end col md 4 -->	
												
															
											  <table class="table table-bordered table-striped" style="width: 100%">
												<thead>
													<tr>
														<th width="10%">ID NO.</th>
														<th width="20%">Name</th>
														<th width="10%">Salary</th>
														<th width="10%">No. of Days</th>
														<th width="10%">Total Salary</th>
														<th width="10%">Action</th>
													</tr>
												</thead>
												<tbody id="roll-generate-tr">

													

												</tbody>

											  </table>

											  <div class="text-center">	
											
											  </div>	


									</div>
									<!-- /.col -->



								</div><!--d-none -->



					          <!-- ///// ///////////////////////////////////////// END table//////////////////////////////////////  -->
				

 
			

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->


			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	  </div>
  </div>



<script type="text/javascript">
	
  $(document).on('click','#search',function(){


	  	    var month_id = $('#month_id').val();

				   	 $.ajax({
	  							url: "{{ route('employee.monthly.salary.date.search')}}",
	   								method:'GET',
	   								data:{'month_id':month_id},
	  								 dataType:'json',
	  								 success:function(data){
		
				if($.trim(data)== "higher_month"){   
    				alert("This Month is not ready ");
				}
				else{   
	  								 $('#roll-generate').removeClass('d-none');
	   							
	    								$('#roll-generate-tr').html(data);
	  					}
					
						}

	  								})// end of ajax

  }); // close of document on click
</script>

<script type="text/javascript">
	
  $(document).on('click','#search1',function(){

	  	    var from = $('#from').val();
	  	    var to = $('#to').val();

	  	    var start = new Date(from);
	  	    var end = new Date(to);

	  	    var between = end.getTime() - start.getTime();

	  	    var total = between / (1000 * 3600 * 24);

	  	  //  alert(Math.round(total));

					   	 $.ajax({
	  							url: "{{ route('employee.salary.date.from.to.search')}}",
	   								method:'GET',
	   								data:{'from':from,'to':to},
	  								 dataType:'json',
	  								 success:function(data){

	  								 $('#roll-generate').removeClass('d-none');
	   							
	    								$('#roll-generate-tr').html(data.table_data);
	  								 }
	  								})// end of ajax


  }); // close of document on click


</script>



@endsection