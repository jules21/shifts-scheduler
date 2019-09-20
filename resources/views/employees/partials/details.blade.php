<div class="row">
    <div class="col-md-6">
        @if (Auth::user()->role_id == 1)
        <div class="form-group">
            <label for="role">Department</label>
            <select class="form-control @error('department_id') is-invalid @enderror" id="category" name="department_id" aria-invalid="false" aria-describedby="roles-error" required>
                    <option value="" disabled selected>choose Departments</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}"  {{ $edit && $department->id == $user->department_id ? 'selected' : '' }}> {{ $department->name }}</option>
                    @endforeach
            </select>
            @error('department_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @endif
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $edit ? $user->first_name : '' }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $edit ? $user->last_name : '' }}">
        </div>
    </div>

    <div class="col-md-6">
        @if ((Auth::user()->role_id == 1))            
        <div class="form-group">
            <label for="status">Post[position]</label>
            <select class="form-control @error('position_id') is-invalid @enderror" id="membership" name="position_id" required>
                    <option value="" disabled selected> assign position</option>
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}"  {{ $edit && $position->id == $user->position_id ? 'selected' : '' }}> {{ $position->name }}</option>
                    @endforeach
            </select>
            @error('deparment_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @endif
        <div class="form-group">
            <label for="birthday">Date of Birth</label>
            <div class="form-group">
                <input type="date" name="birthday" id="birthday" value="{{ $edit ? $user->birthday : '' }}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $edit ? $user->address : '' }}">
        </div>
    </div>
</div>
