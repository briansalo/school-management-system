@extends('admin.admin_master')
@section('admin')


  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-12">


			  

			<div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee List</h3>d
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">

						
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Name</th>
								<th >ID NO.</th>
								<th>Gender</th>
								<th>Join Date</th>
								<th >Designation</th>
								@if(Auth::user()->usertype == "Admin")
								<th width="5%">Code</th>
								@endif
								<th width="28%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alldata as $key => $employee)
							<tr>
								<td>{{ $key+1 }}</td> 
								<td>{{ $employee->name }}</td>
								<td>{{ $employee->id_no }}</td>
								<td>{{ $employee->gender }}</td>
								<td>{{ date('m-d-Y', strtotime($employee->created_at))  }}</td>
								<td>{{ $employee['designation']['name'] }}</td>
								@if(Auth::user()->usertype == "Admin")
								<td>{{ $employee->code }}</td>
								@endif
								<td>

<a href="{{ route('employee.registration.edit', $employee->id)}}" class="btn btn-info">Edit</a>
<a target="_blank" href="{{ route('employee.registration.pdf', $employee->id)}}" class="btn btn-primary">Details</a>
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