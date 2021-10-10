@extends('admin.admin_master')
@section('admin')


  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">
  

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Attendance</h3>
				  <a href="{{ route('employee.attendance.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Attendance</a>
				</div>

				<div class="box-body">
						
				 <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Date</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $key => $attendance)
							<tr>
								<td>{{$key+1}}</td> 
								<td>{{$attendance->date}}</td>

								@if($attendance->status == 1)

								<td><a title="View Details" href="{{ route('employee.attendance.details', $attendance->date) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>

								@else
								<td>
									<a href="{{ route('employee.attendance.edit', $attendance->date)}}" class="btn btn-info">Edit</a>
									<a href="{{ route('employee.attendance.delete', $attendance->date )}}" class="btn btn-danger" id="delete">Delete</a>
								</td>
								@endif

							</tr>
						@endforeach					

						</tbody>

			  </table>
					  



			  </div><!-- /.box body -->
			  

			</div><!-- /.box -->



			</div>
			<!-- /.col -->

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>






@endsection