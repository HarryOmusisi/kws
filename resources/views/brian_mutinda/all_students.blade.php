<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/06/2018
 * Time: 07:22 PM
 */
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>

        <ul class="nav navbar-nav">
            <li><a href="/fees">Fees</a></li>
            <li><a href="/student">Register Student</a></li>
            <li><a href="/all_students">All students</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <form method="get" action="/student/search_student" class="form-inline">
            {{csrf_field()}}
            <!--Search for a student -->
                <input type="text" placeholder="Enter student number" name="student_number" class="form-control" required>
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </ul>
    </div>
</nav>

    <!--Get all students records-->
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
                
            <div class="col-lg-8">
                <h1>All students</h1>
                <table class="table table-hover">
                    <tr class="success">
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Total Fees</th>
                        <th>View</th>
                    </tr>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->total}}</td>
                            <td><a href="/student/student_detail/{{$student->id}}">View payment info</a></td>
                        </tr>
                    @endforeach

                        <tr class="info">
                            <td></td>
                            <td></td>
                            <td><b>TOTAL FEES</b></td>
                            <td><b>{{$all_fees}}</b></td>
                            <td></td>
                        </tr>
                </table>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
   
</body>
</html>
