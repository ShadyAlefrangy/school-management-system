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
@php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$student->class_id)->first();
    $originalfee = $registrationfee->amount;
    $discount = $student['discount']['discount'];
    $discounttablefee = $discount/100*$originalfee;
    $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp
<table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    
        <tr>
            <td>1</td>
            <td>Student ID Number</td>
            <td>{{ $student->student->id_number }}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Student Roll</td>
            <td>{{ $student->roll }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Student Name</td>
            <td>{{ $student->student->name }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Father's Name</td>
            <td>{{ $student->student->father_name }}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Session</td>
            <td>{{ $student->student_year->name }}</td>
        </tr>

        <tr>
            <td>6</td>
            <td>Student Class</td>
            <td>{{ $student->student_class->name }}</td>
        </tr>

        <tr>
            <td>7</td>
            <td>Registration Fee</td>
            <td>{{ $originalfee }} $</td>
        </tr>

        <tr>
            <td>8</td>
            <td>Discount Fee</td>
            <td>{{ $discount }} %</td>
        </tr>

        <tr>
            <td>9</td>
            <td>Fee for This Student</td>
            <td>{{ $finalfee }} $</td>
        </tr>
</table>
<br><br>
<i style="font-size: 10px; float:right;">Print Data {{ date("d M Y") }}</i>
<hr style="border: dashed 2px; width: 95%; color: black; margin-bottom: 50px;">
<table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    
        <tr>
            <td>1</td>
            <td>Student ID Number</td>
            <td>{{ $student->student->id_number }}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Student Roll</td>
            <td>{{ $student->roll }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Student Name</td>
            <td>{{ $student->student->name }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Father's Name</td>
            <td>{{ $student->student->father_name }}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Session</td>
            <td>{{ $student->student_year->name }}</td>
        </tr>

        <tr>
            <td>6</td>
            <td>Student Class</td>
            <td>{{ $student->student_class->name }}</td>
        </tr>

        <tr>
            <td>7</td>
            <td>Registration Fee</td>
            <td>{{ $originalfee }} $</td>
        </tr>

        <tr>
            <td>8</td>
            <td>Discount Fee</td>
            <td>{{ $discount }} %</td>
        </tr>

        <tr>
            <td>9</td>
            <td>Fee for This Student</td>
            <td>{{ $finalfee }} $</td>
        </tr>
</table>
</body>
</html>
