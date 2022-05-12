@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All cagegory
                    </div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                        {{-- {{ __('You are logged in!') }} --}}

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{'success'}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SI NO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">CREATED AT</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($categories as $category )



                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->user->name}}</td>
                                        <td>
                                            @if($category->created_at ==NULL)
                                            <span>No time set</span>
                                            @else
                                            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('Category/Edit/'.$category->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                        {{$categories->links()}}
                    </div>
                </div>
            </div>


            {{-- second --}}

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Category
                    </div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                        {{-- {{ __('You are logged in!') }} --}}



                        <form action="{{route('store.category')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Add Category</label>
                              <input type="text" name="category_name" placeholder="Enter Category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">


                                @error('category_name')
                                <span class="text-denger">{{$message}}</span>

                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
