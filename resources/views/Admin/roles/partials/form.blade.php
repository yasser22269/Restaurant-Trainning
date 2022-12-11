<div class="mb-3">
    <label for="name" class="form-label"> Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" aria-describedby="name" value="{{old('name')}} @isset($role) {{$role->name}} @endisset" >
    @error('name')
    <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="mb-3">
    @foreach($permissions as $permission)
        <div class="form-check">
            <input type="checkbox" class="form-check-input @error('permissions') is-invalid @enderror " name="permissions[]" id="{{$permission->name}}" value="{{$permission->id}}"
                   @isset($role) @if(in_array($permission->id , $role->permissions->pluck('id')->toArray() )) checked @endif @endisset >
            <label for="{{$permission->name}}" class="form-check-label">{{$permission->name}}</label>
            @error('permissions')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
    @endforeach
</div>
