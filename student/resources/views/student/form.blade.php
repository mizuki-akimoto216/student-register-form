@extends('layout')
@section('title', 'Student Register')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <br>
        <h2>Student Register</h2>
        <form method="POST" action="{{ route('store')}}" onsubmit="return checkSubmit()">
        @csrf
            <div class="col-lg-6">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control">
                @if ($errors->has('phone'))
                    <div class="text-danger">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="course">Course</label>
                <input type="text" name="course" id="course" class="form-control">
                @if ($errors->has('course'))
                    <div class="text-danger">
                        {{ $errors->first('course') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control">
                @if ($errors->has('year'))
                    <div class="text-danger">
                        {{ $errors->first('year') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control">
                @if ($errors->has('city'))
                    <div class="text-danger">
                        {{ $errors->first('city') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit(){
        if(window.confirm('Can I register it?')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection