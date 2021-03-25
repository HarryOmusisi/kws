<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/06/2018
 * Time: 07:26 PM
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

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>

            <div class="col-lg-6">
                <h1>Student Details</h1>
                <h4>Student_id: {{$student_id}}<br></h4>
                <h4>Full_name:  {{$student_name}}<br></h4>

                <h1>Fees Transaction</h1>
                    <table class="table table-hover">
                        <tr class="success">
                            <th>Student Id</th>
                            <th>Transaction Id</th>
                            <th>Date of Payment</th>
                            <th>Amount</th>
                        </tr>

                        @foreach ($student as $students)
                            <tr>
                                <td>{{$students->student_id}}</td>
                                <td>{{$students->transaction_id}}</td>
                                <td>{{$students->date_of_payment}}</td>
                                <td>{{$students->amount_paid}}</td>
                            </tr>
                        @endforeach
                    </table>
            </div>

            <div class="col-lg-3"></div>
        </div>
    </div>

    
</body>
</html>
