<div>
    <section class="center">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">

                    @if ($message)
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" wire:click="clear" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="card card-success">
                        <div class="card-header text-center ">
                            <h3 class="card-title center">Add new To Do!</h3>
                        </div>
                    
                <div class="col-md-6 m-auto">
                    <form method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <textarea wire:model="content" class="form-control" placeholder="Enter what to do!"></textarea>
                                <label for="floatingTextarea">What To DO?</label>
                                @error('content')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                              </div>
                           
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" wire:model="status">
                                <label class="form-check-label" for="status">is it DONE?</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if ($updateMode)
                            <input type="hidden" wire:model="selected_id">
                            <button type="button" wire:click="update" class="btn btn-success">Update!</button>
                            @else
                            <button type="button" wire:click="add" class="btn btn-success">Add!</button>
                            @endif
                            <button type="button" class="btn float-end" wire:click="resetInput()"><i class="fas fa-redo"></i></button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
    </section>
    <section class="center">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <div class="card">                        
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="card-title center">To Do's</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>To Do <input class="form-control" wire:model="searchContent" type="search" placeholder="Search" aria-label="Search"></th>
                                        <th>is it DONE?</th>
                                        <th>created_at <input class="form-control" wire:model="searchCreatedAt" type="search" placeholder="Search" aria-label="Search"></th>
                                        <th>updated_at <input class="form-control" wire:model="searchUpdatedAt" type="search" placeholder="Search" aria-label="Search"></th>
                                        <th colspan="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        
                                    
                                    <tr class="center">
                                        <td>{{ $todo->content }}</td>
                                        @if ($todo->status)
                                        <td><i class="far fa-check-circle fa-2x" style="color: green"></i></td>
                                        @else
                                        <td><i class="fas fa-ban fa-2x" style="color: red"></i></td>
                                        @endif   
                                        <td>{{ $todo->created_at }}</td>
                                        <td>{{ $todo->updated_at }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-info" wire:click="edit({{ $todo->id }})"><i class="fas fa-pen"></i></button>
                                                <button class="btn btn-danger" wire:click="delete({{ $todo->id }})"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $todos->links() }}
                        </div>	
                    </div>
                </div>
              </div>
            </div>
        </section>
</div>
