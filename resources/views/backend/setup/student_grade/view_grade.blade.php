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
				  <h3 class="box-title">Student Grade List</h3>
				  <a href="{{route('student.grade.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Student Grade </a>	
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Name</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alldata as $key => $year)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $year->name }}</td>
								<td>
									<a href="" class="btn btn-info">Edit</a>
									<a href="" class="btn btn-danger" id="delete">Delete</a>
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