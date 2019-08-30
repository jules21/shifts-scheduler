@extends('layouts.master')

@section('page-title', 'Departments')
@section('page-heading', $edit ? $department->name : 'New department')

@section('breadcrumbs')
/&nbsp;
    <li class="list-inline-item active">
            {{ $edit ? 'Edit' : 'Create' }}
    </li>
@endsection

@section('content')

<div class="row">
        <div class="col-md-6 offset-md-2">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">  {{ $edit ? 'Edit' : 'Create' }} Department</h5>
                        @if ($edit)
                            <form action="{{ route('manager.departments.update',$department->id) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                        @else
                             <form action="{{ route('manager.departments.store') }}" method="post">
                        @endif
                            @csrf
                            
                            <div class="position-relative form-group">
                                <label for="name" class="">Name</label>
                                <input name="name" id="name" placeholder="Department Name" type="text" class="form-control" 
                                 value="{{ $edit ? $department->name : old('name') }}" required>
                                </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Text Area</label>
                                        <textarea name="description" id="exampleText" class="form-control">
                                                {{ $edit ? $department->description : old('description') }}
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                            {{ $edit ? 'Update department' : 'Create department' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
  
    </div>
@endsection

@section('scripts')
@stop