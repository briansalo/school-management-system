@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <div class="content-wrapper">
	  <div class="container-full">

	  	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Student</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					 <!-- enctype for inserting image in database to make it file type -->
					<form method="post" action="{{ route('student.registration.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
						<div class="col-12">


								 <div class="row">

										<div class="col-md-3">
										<div class="form-group">
											<h5>Student Name <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="name"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-3">
										<div class="form-group">
											<h5>Email <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="email" name="email"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-3">
										<div class="form-group">
											<h5>Mother's Name <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="mothers_name"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-3">
										<div class="form-group">
											<h5>Father's Name <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="fathers_name"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

								 </div><!-- /.1st row -->





								 <div class="row">

										<div class="col-md-4">
										<div class="form-group">
											<h5>Mobile Number <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="mobile_number"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Address<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="address"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
													<div class="form-group">
														<h5>Gender <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="gender"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Gender</option> 
																<option value="Male" >Male</option>
																<option value="Female">Female</option>
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->

								 </div><!-- /.2nd row -->




								 <div class="row">

										<div class="col-md-4">
										<div class="form-group">
											<h5>Religion<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="religion"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Date of Birth<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="date" name="dob"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Discount<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="discount"  class="form-control">
											</div>
										</div>
										</div><!-- end col md 4 -->
								 </div><!-- /.3rd row -->




							 <div class="row">

										<div class="col-md-4">
													<div class="form-group">
														<h5>Year <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="year"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Year</option> 
																@foreach($year as $years)
																<option value="{{$years->id}}" >{{$years->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
													<div class="form-group">
														<h5>class <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="class"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Class</option>
																@foreach($class as $classes)
																<option value="{{$classes->id}}" >{{$classes->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->
										<!--
										<div class="col-md-4">
													<div class="form-group">
														<h5>Group <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="group"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Group</option> 
																@foreach($group as $groups)
																<option value="{{$groups->id}}" >{{$groups->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>

										</div>		
								 </div>
								  -->	

										<div class="col-md-4">
													<div class="form-group">
														<h5>Grade <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="grade"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Grade</option> 
																@foreach($grades as $grade)
																<option value="{{$grade->id}}" >{{$grade->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->			
								 </div><!-- /.4th row -->


							 <div class="row">

										<div class="col-md-4">
													<div class="form-group">
														<h5>Shift <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="shift"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Shift</option> 
																@foreach($shift as $shifts)
																<option value="{{$shifts->id}}" >{{$shifts->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div>
													</div>
													</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
							<div class="form-group">
								<h5>Profile Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" id="image" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div>
								</div>
							</div>										
										</div><!-- end col md 4 -->

										<div class="col-md-4">
	 											<div class="form-group">
													<div class="controls">
		<img id="showimage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

		 												</div>
		 										</div>
										</div><!-- end col md 4 -->			
								 </div><!-- /.5th row -->

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="submit">
						</div>
					</form>

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
		$(document).ready(function(){
			$('#image').change(function(e){
				var reader = new FileReader();
				reader.onload = function(e){
					$('#showimage').attr('src',e.target.result);
				}
				reader.readAsDataURL(e.target.files['0']);
				
			});
		});
</script>

@endsection