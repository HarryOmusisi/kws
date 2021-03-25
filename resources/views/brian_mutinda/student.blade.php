<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 08/06/2018
 * Time: 10:57 AM
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

    <div class="container" style="margin-top:10px;">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!--Check if there are errors-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <!--if errors exist print all of them-->
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--Check for sucess message-->
           @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
        
            <h1>Student Registration</h1>

            <!--Go to route to process our form-->
            <form method="post" action="/student/save" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Full name">Full Name:</label>
                    <input type="text" placeholder="Full name" name="full_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth: </label>
                    <input type="date" placeholder="Date of birth" name="date_of_birth" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" placeholder="Address" name="address" class="form-control">
                </div>
                
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

        </div>
        <div class="col-lg-3"></div>
    </div>
    
</body>
</html>
