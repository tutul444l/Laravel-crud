@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashbord Hi..{{Auth::user()->name}} <span class="badge rounded-pill bg-success">Active Now</span><b style="float: right">Total User<span class="badge rounded-pill bg-danger">{{count($users)}}</span></b></div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                        {{-- {{ __('You are logged in!') }} --}}


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SI NO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">CREATED AT</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php($i = 1)
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td> --}}
                                        <td>{{($user->created_at)->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
