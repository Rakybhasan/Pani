@extends('layouts.app')
@section('content')

la

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total Users : {{ $total_users }}</div>

                <div class="card-body">
                  <table class="table table-striped">
                    <tr>
                      <th>SL. NO</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                    </tr>


                  @foreach($users as $user)
                    <tr>
                      <td>{{ $loop-> index +1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach


                  </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <h1>Welcome</h1> -->

@endsection
