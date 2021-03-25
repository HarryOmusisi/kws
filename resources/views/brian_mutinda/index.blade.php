<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/06/2018
 * Time: 10:59 AM
 */
?>
<!DOCTYPE html>
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
                    <!--Check for any available errors-->
                    @if(session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{session()->get('error_message')}}
                        </div>
                    @endif
                    
                    <center>
                        <h1>Homepage</h1>
                        <form method="get" action="/student/search_student" class="form-inline">
                            {{csrf_field()}}
                            <!--Search for a student -->
                            <input type="text" placeholder="Enter student number" name="student_number" class="form-control" required>
                            <input type="submit" value="Search" class="btn btn-primary">
                        </form><br>
                    </center>
                    
                    <div class="list-group">
                        <a href="/student" class="list-group-item list-group-item-info">Register Student</a>
                        <a href="/fees" class="list-group-item">New Fees Payment</a>
                        <a href="/all_students" class="list-group-item list-group-item-info">All students</a>
                    </div>            
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
</body>
</html>

