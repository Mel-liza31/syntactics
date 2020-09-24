@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Home Page</h1>
    <form action="{{ route('search') }}" method="POST" role="search">
        {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="search">enter
            </button>
        </span>
    </div>
</form>
    @if(session('successMsg'))
    <div class="alert-success">
        {{ session('successMsg') }}
    </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td><a class="edit" href="{{ route('edit',$student->id) }}">Edit</a> || 
                <form method="post" id="delete-form-{{ $student->id }}" action="{{ route('delete',$student->id) }}" style="display:none;">
                    {{ csrf_field() }}
                        {{ method_field('delete') }}
                </form><button class="delete" onclick="if(confirm('Are you sure to delete this data')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $student->id }}').submit();
                } else {
                    event.preventDefault();
                }">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $students)
            <tr>
                <td>{{$students-> first_name}}</td>
                <td>{{$students-> email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection