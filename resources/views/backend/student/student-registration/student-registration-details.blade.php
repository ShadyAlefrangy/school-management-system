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
    <td><h2>Easy Learning</h2></td>
    <td>
        <h2>Easy School ERP</h2>
        <p>School Address</p>
        <p>Phone: 123456789</p>
        <p>Email: support@easylearning.com</p>
    </td>
  </tr>
</table>

<table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    
        <tr>
            <td>1</td>
            <td>Student Name</td>
            <td>{{ $student->student->name }}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Student ID Number</td>
            <td>{{ $student->student->id_number }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Student Roll</td>
            <td>{{ $student->student->role }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Father's Name</td>
            <td>{{ $student->student->father_name }}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Mother's Name</td>
            <td>{{ $student->student->mother_name }}</td>
        </tr>

        <tr>
            <td>6</td>
            <td>Mobile Number</td>
            <td>{{ $student->student->mobile }}</td>
        </tr>

        <tr>
            <td>7</td>
            <td>Student Address</td>
            <td>{{ $student->student->address }}</td>
        </tr>

        <tr>
            <td>8</td>
            <td>Student Gender</td>
            <td>{{ $student->student->gender }}</td>
        </tr>

        <tr>
            <td>9</td>
            <td>Student Birthday</td>
            <td>{{ $student->student->date_of_birth }}</td>
        </tr>

        <tr>
            <td>10</td>
            <td>Student Religion</td>
            <td>{{ $student->student->religion }}</td>
        </tr>

        <tr>
            <td>11</td>
            <td>Student Class</td>
            <td>{{ $student->student_class->name }}</td>
        </tr>

        <tr>
            <td>12</td>
            <td>Student Year</td>
            <td>{{ $student->student_year->name }}</td>Discount amount
        </tr>

        <tr>
            <td>13</td>
            <td>Student Discount Amount</td>
            <td>{{ $student->discount->discount }}</td>
        </tr>

        <tr>
            <td>14</td>
            <td>Student Shift</td>
            <td>{{ $student->student_shift->name }}</td>
        </tr>

        <tr>
            <td>15</td>
            <td>Student Group</td>
            <td>{{ $student->student_group->name }}</td>
        </tr>

</table>
<br><br>
<i style="font-size: 10px; float:right;">Print Data {{ date("d M Y") }}</i>

</body>
</html>
