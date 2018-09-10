@extends('admin.layouts.master')

@section('admin-content')
     <h1>Categories <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New</a> </h1>
     <table id="posts-datatable" class="table table-striped table-bordered gif-datatable">
          <thead>
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Creatd At</th>
                    <th>Edit</th>
                    <th>Delete</th>
               </tr>
          </thead>

          <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>{{ $category->created_at }}</td>
                  <td><a href="{{ route('admin.categories.edit', $category->id) }}"><span class="far fa-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('admin.categories.destroy', $category->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form> 
                    <a href="" onclick="
                      if(confirm('Are you sure, You Want to delete this?'))
                      {
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $category->id }}').submit();
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
