@extends('admin.admin_master')
@section('admin')


  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">

		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">

				  	<!-- I use get method because i just want to retrieve data in student year and student class -->
				  	<form method="GET" action="{{ route('student.year.class.search') }}">
				  		<div class="row">

										<div class="col-md-4">
													<div class="form-group">
														<h5>Year <span class="text-danger">*</span></h5>
														<div class="controls">
															<select name="year"  required="" class="form-control" aria-invalid="false">
																<option value="">Select Year</option> 
																@foreach($year as $years)
																													<!-- the @$year_id came from studentRegistrationController -->
																<option value="{{$years->id}}" {{ (@$year_id == $years->id)? "selected": "" }} > {{$years->name}} </option>
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
																																	<!-- the @$class_id came from studentRegistrationController -->
																<option value="{{$classes->id}}" {{ (@$class_id == $classes->id)? "selected": "" }} > {{$classes->name}} </option>
																@endforeach
															</select>
														<div class="help-block"></div></div>
													</div>
										</div><!-- end col md 4 -->

										<div class="col-md-4" style="padding-top: 25px;">
												<input type="submit" id="search" name="search" value="search" class="btn btn-rounded btn-dark mb-5">
										</div><!-- end col md 4 -->

								</div><!-- /row -->
						</form>
				</div><!-- /.col 12 -->
		  </div>
		</div><!-- /.class box bb-3 border-warning -->
			  

			<div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student List</h3>d
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">

						
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Name</th>
								<th width="5%">ID NO.</th>
								<th width="5%">Year</th>
								<th width="5%">Class</th>
								<th>Image</th>
								@if(Auth::user()->usertype == "Admin")
								<th width="5%">Code</th>
								@endif
								<th width="28%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alldata as $key => $student)
							<tr>
								<td>{{ $key+1 }}</td> 
								<td>{{ $student['student']['name'] }}</td> <!-- THE [student] methhod came from the model -->
								<td>{{ $student['student']['id_no'] }}</td>
								<td>{{ $student['student_year']['name'] }}</td>
								<td>{{ $student['student_class']['name'] }}</td> 
								<td>
									<!-- condition if the user has uploaded image then show it the image, else use the image of no_image -->
								  <img id="showimage" src="{{ (!empty($student['student']['image']))? url('upload/student_images/'.$student['student']['image']): url('upload/no_image.jpg')}}" alt="User Avatar" style="width:80px; width: 80px;">
								</td>
								@if(Auth::user()->usertype == "Admin")
								<td>{{ $student['student']['code'] }}</td>
								@endif
								<td>

	<a href="{{ route('student.registration.edit', $student->student_id)}}" class="btn btn-info ">Edit</i></a>
	<a href="{{ route('student.registration.promote', $student->student_id)}}" class="btn btn-primary	">Promote</i></a>
	<a href="{{ route('student.registration.details', $student->student_id)}}" class="btn btn-warning">Download</i></a>
								</td>

							</tr>
							@endforeach

						</tbody>

					  </table>
					  



					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>






@endsection