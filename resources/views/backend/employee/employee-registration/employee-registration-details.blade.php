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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <td>
        <h2>
            @php
                $image_path = '/upload/school.jpg';
            @endphp
            <img src="{{ public_path() . $image_path }}" alt="" width="200" height="100">
        </h2>
    </td>

    <td>
        <h2>Easy School ERP</h2>
        <p>School Address</p>
        <p>Phone: 123456789</p>
        <p>Email: support@easylearning.com</p>
        <p><b style="color: #04AA6D">Employee Details</b></p>
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
            <td>Employee Name</td>
            <td>{{ $employee->name }}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>employee ID Number</td>
            <td>{{ $employee->id_number }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Father's Name</td>
            <td>{{ $employee->father_name }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Mother's Name</td>
            <td>{{ $employee->mother_name }}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Mobile Number</td>
            <td>{{ $employee->mobile }}</td>
        </tr>

        <tr>
            <td>6</td>
            <td>Employee Address</td>
            <td>{{ $employee->address }}</td>
        </tr>

        <tr>
            <td>7</td>
            <td>Employee Gender</td>
            <td>{{ $employee->gender }}</td>
        </tr>

        <tr>
            <td>8</td>
            <td>Employee Birthday</td>
            <td>{{ $employee->date_of_birth }}</td>
        </tr>

        <tr>
            <td>9</td>
            <td>employee Religion</td>
            <td>{{ $employee->religion }}</td>
        </tr>

        <tr>
            <td>10</td>
            <td>Employee Designation</td>
            <td>{{ $employee->designation->name }}</td>
        </tr>

        <tr>
            <td>11</td>
            <td>Employee Salary</td>
            <td>{{ $employee->salary }}</td>
        </tr>

        <tr>
            <td>12</td>
            <td>Employee Joined Date</td>
            <td>{{ $employee->join_date }}</td>
        </tr>

</table>
<br><br>
<i style="font-size: 10px; float:right;">Print Data {{ date("d M Y") }}</i>

</body>
</html>
