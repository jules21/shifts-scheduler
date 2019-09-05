@extends('layouts.master')

@section('page-title', 'Departments Post')
@section('page-heading', $edit ? $position->name : 'New positionent Post')

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
                        <h5 class="card-title">  {{ $edit ? 'Edit' : 'Create' }} positionent Post</h5>
                        @if ($edit)
                            <form action="{{ route('manager.positions.update',$position->id) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                        @else
                             <form action="{{ route('manager.positions.store') }}" method="post">
                        @endif
                            @csrf
                            
                                {{-- department --}}
                                <div class="position-relative form-group">
                                        <label for="name" class="">Departments List</label>
                                         <select class="form-control" id="category" name="department_id" aria-invalid="false" aria-describedby="roles-error">
                                                <option value="" disabled selected>choose Departments</option>
                                                @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"> {{ $department->name }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                {{-- department --}}
                            <div class="position-relative form-group">
                                <label for="name" class="">Position Name</label>
                                <input name="name" id="name" placeholder="Department Name" type="text" class="form-control" 
                                 value="{{ $edit ? $position->name : old('name') }}" required>
                                </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Text Area</label>
                                        <textarea name="description" id="exampleText" class="form-control">
                                                {{ $edit ? $position->description : old('description') }}
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                            {{ $edit ? 'Update department Posr' : 'Create department Post' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
  
    </div>
@endsection

@section('scripts')
@stop