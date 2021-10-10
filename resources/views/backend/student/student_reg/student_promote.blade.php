@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <div class="content-wrapper">
	  <div class="container-full">

	  	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Promote Student</h4>
			  <h1 style="color:white;">{{ $editData['student']['name'] }}</h1>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					 <!-- enctype for inserting image in database to make it file type -->
					<form method="post" action="{{ route('student.registration.update_promote', $editData->student_id )}}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="assign_student_id" value="{{$editData->id}}">
						<div class="row">
						<div class="col-12">

									<div class="row">

										<div class="col-md-4">
										<div class="form-group">
											<h5>Email <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="email" name="email"  class="form-control" value="{{$editData['student']['email']}}">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Mobile Number <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="mobile_number"  class="form-control" value="{{$editData['student']['mobile_number']}}">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Address<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="address"  class="form-control" value="{{$editData['student']['address']}}">
											</div>
										</div>
										</div><!-- end col md 4 -->
									</div><!-- /.1st row -->

								 <div class="row">

										<div class="col-md-4">
										<div class="form-group">
											<h5>Religion<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="religion"  class="form-control" value="{{$editData['student']['religion']}}">
											</div>
										</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
													<div class="form-group">
														<h5>Shift <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="shift"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Shift</option> 
																@foreach($shift as $shifts)
															<option value="{{$shifts->id}}" {{ ($editData->shift_id == $shifts->id)? 'selected': ''}} >{{$shifts->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div>
													</div>
													</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
										<div class="form-group">
											<h5>Discount<span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="discount"  class="form-control" value="{{$editData['discount']['discount']}}">
											</div>
										</div>
										</div><!-- end col md 4 -->
								 </div><!-- /.2ndd row -->




							 <div class="row">

										<div class="col-md-4">
													<div class="form-group">
														<h5>Year <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="year"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Year</option> 
																@foreach($year as $years)
																<option value="{{$years->id}}"{{ ($editData->year_id == $years->id)? 'selected': ''}} >{{$years->name}}</option>
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
																<option value="{{$classes->id}}" {{ ($editData->class_id == $classes->id)? 'selected': ''}} >{{$classes->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4">
													<div class="form-group">
														<h5>Group <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="group"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Group</option> 
																@foreach($group as $groups)
																<option value="{{$groups->id}}" {{ ($editData->group_id == $groups->id)? 'selected': ''}} >{{$groups->name}}</option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->			
								 </div><!-- /.3rd row -->




							 <div class="row">


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
									<!-- condition if the user has uploaded image then show it the image, else use the image of no_image -->
								  <img id="showimage" src="{{ url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px; width: 100px; border:1px solid #000000;">

		 												</div>
		 										</div>
										</div><!-- end col md 4 -->		
			
								 </div><!-- /.4th row -->

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