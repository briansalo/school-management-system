
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

</head>
<body>

<table id="customers">
  <tr>
    <td><h2>
      
  <img src="{{url('upload/school_logo.jpg')}}" width="200" height="100">

    </h2></td>
    <td><h2>Easy School ERP</h2>
<p>Address: Butuan City </p>
<p>Phone : 343434343434</p>
<p>Email : support@easylerningbd.com</p>

    </td> 
  </tr>
  
   
</table>



<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student Name</b></td>
    <td>{{ $details->name }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details->id_no }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details->fathers_name }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mother's Name</b></td>
    <td>{{ $details->mothers_name }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Mobile Number </b></td>
    <td>{{ $details->mobile_number }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Address</b></td>
    <td>{{ $details->address }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Gender</b></td>
    <td>{{ $details->gender }}</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Religion</b></td>
    <td>{{ $details->religion }}</td>
  </tr>


    <tr>
    <td>10</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details->dob }}</td>
  </tr>

    <tr>
    <td>10</td>
    <td><b>Date of Join</b></td>
    <td>{{ date('d-m-Y', strtotime($details->created_at))  }}</td>
  </tr>

    <tr>
    <td>11</td>
    <td><b>Designation </b></td>
    <td>{{ $details['designation']['name'] }} </td>
  </tr>


   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
