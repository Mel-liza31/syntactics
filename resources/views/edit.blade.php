@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="exam_form">
            <h2>Add New Info</h2>
            <p>Please fill up the following. Leave no blank</p>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('update',$student->id) }}" method="post">
            {{ csrf_field() }}
                <div class="row100">
                    <div class="input50">
                        <input type="text" name="firstname" value="{{ $student->first_name }}" placeholder="Enter Your First Name">
                    </div>
                    <div class="input50">
                        <input type="text" name="lastname" value="{{ $student->last_name }}" placeholder="Enter Your Last Name">
                    </div>
                </div>
                <div class="row100">
                    <div class="input100">
                        <input type="text" name="address" value="{{ $student->address }}" placeholder="Enter Your Address">
                    </div>
                </div>
                <div class="row100">
                    <div class="input100">
                        <input type="text" name="phone" value="{{ $student->phone }}" placeholder="Enter Your Phone">
                    </div>
                </div>
                <div class="row100">
                    <div class="input100">
                        <input type="text" name="email" value="{{ $student->email }}" placeholder="Enter Your Email">
                    </div>
                </div>
                <div class="row100">
                    <div class="input100">
                        <input type="submit" name="" value="ADD NEW">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection