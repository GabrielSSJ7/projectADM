@extends('template.app')

@section('content')

    <div class="card" style="margin: 2% auto; width: 70%;">
        <div class="card-header">
            <strong>Saída</strong>
        </div>
        <div class="card-body ">
            <form role="form">
                <div class="form-group">
                    <label for="name">First name</label>
                    <input type="name" class="form-control" id="fname" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="address">Second name</label>
                    <input type="address" class="form-control" id="sname" placeholder="Enter surname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>

@endsection
