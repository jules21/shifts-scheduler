@extends('layouts.master')

@section('page-title', trans('Admin Dashboard'))
@section('page-heading', trans('Admin Dashboard'))

@section('breadcrumbs')
    <li class="list-inline-item active">
        @lang('Admin Dashboard')
    </li>
@endsection
@section('subtitle')
<div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                        <i class="metismenu-icon pe-7s-display2"></i>
                </i>
            </div>
            <div>Requested Swap(Switch Shifts)
                <div class="page-title-subheading">
                </div>
                
            </div>
        </div>
       
    </div>
@endsection
@section('content')

@include('partials.messages')
<div class="card">
        <div class="card-body">
            <form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
                <div class="row my-3 flex-md-row flex-column-reverse">

                    <div class="col-md-2 mt-2 mt-md-0">
                        
                        </div>
    
                    
                </div>
            </form>
    
            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th class="min-width-150">email</th>
                        <th class="min-width-150">employee(who Requested)</th>
                        <th class="min-width-150">date(switch)</th>
                        <th class="min-width-150">date(payback)</th>
                        <th class="min-width-150">status</th>
                        <th class="text-center">action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($leaves))
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->user['email'] }}</td>
                                    <td>{{ \App\User::where('id', $leave->swapper)->value('email')  }}</td>
                                    <td>{{ $leave->date }}</td>
                                    <td>{{ $leave->edate }}</td>
                                    <td>
                                        {{ $leave->status }}
                                    </td>
                                    <td class="text-center">
                                        @if ($leave->right == 'approval' )
                                        <a href="{{ route('user.swaps.show', $leave->id) }}" class="btn btn-icon"
                                                title="approve swap" data-toggle="tooltip" data-placement="top">
                                                 <i class="fas fa-check"></i>
                                             </a>
                                        <a href="{{ route('user.swaps.edit', $leave->id) }}" class="btn btn-icon"
                                                title="cancel swap" data-toggle="tooltip" data-placement="top">
                                                 <i class="fas fa-times"></i>
                                             </a>
                                        @endif
                                  
    <form action="{{ route('user.swaps.destroy', $leave->id) }}" method="post" class="d-inline">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
    <button
    title="Delete Leave"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                            class="btn btn-icon" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
          </form>
    
    <!---->
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>No records found</em></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@stop