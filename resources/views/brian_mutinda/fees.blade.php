<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/06/2018
 * Time: 10:58 AM
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
    <div class="container" style="margin-top:10px; ">

        <div class="row">
            <div class="col-lg-3"></div>

            <div class="col-lg-6">
                <!--Check for a sucess / error message-->
                @if(session()->has('message'))
                    <div class="alert alert-info">
                        {{session()->get('message')}}
                    </div>
                @endif

                <!-- The form -->
                <form method="post" action="/fees/save" role=form>
                    {{csrf_field()}}
                    <h1>Fees Payment</h1>

                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" placeholder="Student ID" name="student_id" class="form-control">
                    </div>

                    <div class="form-group">
                         <label for="date">Date of Payment</label>
                         <input type="date" name="date_of_payment" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <label for="Payment">Amount Paid</label>
                        <input type="text" placeholder="Amount Paid" name="amount_paid" class="form-control">
                    </div>
                    
                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            </div>
            
            <div class="col-lg-3"></div>
        </div>
        
    </div>
    
</body>
</html>
