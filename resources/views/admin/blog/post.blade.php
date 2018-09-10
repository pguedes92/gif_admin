@extends('admin.layouts.master')

@section('admin-content')
     <h1>Add New Post</h1>

     <form role="form" action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          @include('includes.messages')
          
          <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
          </div>

          <div class="form-group">
               <label>Select Tags</label>
               <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Tags" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach ($tags as $tag)
                         <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}>
                              {{ $tag->name }}
                         </option>
                    @endforeach
               </select>
          </div>

          <div class="form-group">
               <label>Select Category</label>
               <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories">
                    <option value="" disable selected> Select a Category </option>
                    @foreach ($categories as $category)
                         <option value="{{ $category->id }}" @if(old('categories') == $category->id) {{ "selected" }} @endif>
                              {{ $category->name }}
                         </option>
                    @endforeach
               </select>
          </div>

          <div class="form-group">
               <label>Status</label>
               <select class="form-control" name="status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0" @if(old('status') == '0') {{ "selected" }} @endif>Inactive</option>
                    <option value="1" @if(old('status') == '1') {{ "selected" }} @endif>Active</option>
               </select>
          </div>
          
          <div class="form-group">
               <label>Text</label>
               <textarea name="body" class="gif-textarea">{{ old('body') }}</textarea>
          </div>
          
          <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('admin.posts.index') }}" class="btn btn-warning">Back</a>
          </div>
     </form>
@endsection