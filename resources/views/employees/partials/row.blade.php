<tr>
    <td style="width: 40px;">
        <a href="{{ route('manager.employees.show', $user->id) }}">
            <img
                class="rounded-circle img-responsive"
                width="40"
                {{-- src="{{ $user->present()->avatar }}" --}}
                {{-- alt="{{ $user->present()->name || no image }}" --}}
                >
        </a>
    </td>
    <td class="align-middle">
        <a href="{{ route('manager.employees.show', $user->id) }}">
            {{ $user->username ?: trans('app.n_a') }}
        </a>
    </td>
    <td class="align-middle">{{ $user->first_name . ' ' . $user->last_name }}</td>
    <td class="align-middle">{{ $user->email }}</td>
    <td class="align-middle">{{ $user->created_at->format(config('app.date_format')) }}</td>
    <td class="align-middle">{{ $user->department->name }}</td>
    <td class="align-middle">
        <span class="badge badge-lg badge-success">
            {{ $user->position->name }}
        </span>
    </td>
 
            <td class="text-center align-middle">
                    <a href="{{ route('manager.employees.edit', $user->id) }}" class="btn btn-icon"
                       title="Edit user" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-edit"></i>
                    </a>

                                                   <!---->
<form action="{{ route('manager.employees.destroy', $user->id) }}" method="post" class="d-inline">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button
title="Delete user"
                       data-toggle="tooltip"
                       data-placement="top"
                        class="btn btn-icon" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
</form>

<!---->
                </td>
</tr>