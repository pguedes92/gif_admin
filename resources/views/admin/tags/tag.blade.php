@extends('admin.layouts.master')

@section('admin-content')
     <h1>Add New Tag</h1>

     <form role="form" action="{{ route('admin.tags.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          @include('includes.messages')
          
          <div class="form-group">
               <label for="name">Name</label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
          </div>
          
          <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('admin.tags.index') }}" class="btn btn-warning">Back</a>
          </div>
     </form>
@endsection