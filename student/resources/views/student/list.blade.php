@extends('layout')
@section('title', 'Student List')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <br>
        <h2>Student List</h2>
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Year</th>
                <th>City</th>
                <th>Created Date</th>
                <th>Registered Date</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($students as $student)
            <tr>
                <td>{{$student -> id}}</td>
                <td>{{$student -> name}}</td>
                <td>{{$student -> email}}</td>
                <td>{{$student -> phone}}</td>
                <td>{{$student -> course}}</td>
                <td>{{$student -> year}}</td>
                <td>{{$student -> city}}</td>
                <td>{{$student -> created_at}}</td>
                <td>{{$student -> updated_at}}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='/student/edit/{{$student -> id}}'" >Edit</button></td>
                <form method="POST" action="{{route('delete', $student->id)}}" onsubmit="return checkDelete()">
                    @csrf
                    <td>
                        <button type="submit" class="btn btn-primary" onclick=>Delete</button>
                    </td>
                    </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    function checkDelete(){
        if(window.confirm('Can I delete?')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection