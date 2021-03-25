<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 10/12/2018
 * Time: 02:15 PM
 */
?>
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3" >
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="center-block text-center">Register New Mammal Info</h1>
                    </div>

                    <div class="panel-body">
                        <!--Check for an error message-->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <!--Check for a sucess / error message-->
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        @endif

                        <form method="post" action="#" role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Mammal Name</label>
                                <select name="mammal_name" class="form-control">
                                    @foreach($animals as $mammal)
                                        <option value="{{$mammal->animal_id}}">{{$mammal->animal_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Location</label>
                                <select name="locations" class="form-control">
                                   @foreach($locations as $location)
                                        <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Year From</label>
                                        <select name="year_from" class="form-control">
                                            <option>2010</option>
                                            <option>2011</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Year To</label>
                                        <select name="year_from" class="form-control">
                                            <option>2010</option>
                                            <option>2011</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Population</label>
                                <input type="text" class="form-control" name="population">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status">
                            </div>

                            <div class="form-group">
                                <label>Area(sq.km)</label>
                                <input type="text" class="form-control" name="area">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-lg btn-primary center-block" type="submit" >Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!--Display The data-->
        <div class="col-md-6 col-md-offset-3">
            <h1 class="center-block text-center">All Mammals Info</h1>
            <table class="table table-hover table-responsive">
                <tr class="success">
                    <th>Species_Id</th>
                    <th>Animal Name</th>
                    <th>Scientific Name</th>
                    <th>Category</th>
                    <th>Options</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
