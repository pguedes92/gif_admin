@extends('admin.layouts.master')

@section('admin-content')
     <h1>Edit Post #{{ $post->id }}</h1>

     <form role="form" action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          
          @include('includes.messages')
          
          <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
          </div>

          <div class="form-group">
               <label>Select Tags</label>
               <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach ($tags as $tag)
                         <option value="{{ $tag->id }}"
                              @foreach ($post->tags as $postTag)
                                   @if ($postTag->id == $tag->id)
                                        {{ "selected" }}
                                   @endif
                              @endforeach
                         >{{ $tag->name }}</option>
                    @endforeach
               </select>
          </div>

          <div class="form-group">
               <label>Select Category</label>
               <select class="form-control" name="categories">
                    @foreach ($categories as $category)
                         <option value="{{ $category->id }}"
                              @foreach ($post->categories as $postCategory)
                                   @if ($postCategory->id == $category->id)
                                        {{ "selected" }}
                                   @endif
                              @endforeach
                         >{{ $category->name }}</option>
                    @endforeach
               </select>
          </div>

          <div class="form-group">
               <label>Status</label>
               <select class="form-control" name="status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0" @if($post->status == '0') {{ "selected" }} @endif>Inactive</option>
                    <option value="1" @if($post->status == '1') {{ "selected" }} @endif>Active</option>
               </select>
          </div>
          
          <div class="form-group">
               <label>Text</label>
               <textarea name="body" class="gif-textarea">{{ $post->body }}</textarea>
          </div>
          
          <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('admin.posts.index') }}" class="btn btn-warning">Back</a>
          </div>
     </form>
@endsection