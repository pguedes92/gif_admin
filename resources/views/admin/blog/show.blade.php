@extends('admin.layouts.master')

@section('admin-content')
     <h1>Blog Posts <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add New</a> </h1>
     <table id="posts-datatable" class="table table-striped table-bordered gif-datatable">
          <thead>
               <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Creatd At</th>
                    <th>Edit</th>
                    <th>Delete</th>
               </tr>
          </thead>

          <tbody>
               @foreach ($posts as $post)
                    <tr>
                         <td>{{ $loop->index + 1 }}</td>
                         <td>{{ $post->title }}</td>
                         <td>{{ $post->slug }}</td>
                         <td>{{ $post->created_at }}</td>

                         <td><a href="{{ route('admin.posts.edit', $post->id) }}"><span class="far fa-edit"></span></a></td>

                         <td>
                              <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('admin.posts.destroy', $post->id) }}" style="display: none">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?')) {
                                   event.preventDefault();
                                   document.getElementById('delete-form-{{ $post->id }}').submit();
                              }
                              else{
                                   event.preventDefault();
                              }" ><span class="far fa-trash-alt"></span></a>
                         </td>
                    </tr>
               @endforeach
          </tbody>
     </table>
@endsection
