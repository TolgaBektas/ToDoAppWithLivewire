<div>
    <section class="center">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header text-center ">
                            <h3 class="card-title center">Add new To Do!</h3>
                        </div>
                    
                <div class="col-md-8 m-auto">
                    <form method="POST" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">What To Do?</label>
                                <textarea wire:model="content" cols="110" rows="5" placeholder="Enter what to do..."></textarea>
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
                            <button type="button" wire:click="add" class="btn btn-success">Add!</button>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>To Do</th>
                                        <th>is it DONE?</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th colspan="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        
                                    
                                    <tr class="center">
                                        <td>{{ $todo->content }}</td>
                                        @if ($todo->status)
                                        <td><button type="submit" class="btn btn-success">Yes!</button></td>
                                        @else
                                        <td><button type="submit" class="btn btn-danger">No!</button></td>
                                        @endif   
                                        <td>{{ \Carbon\Carbon::parse($todo->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($todo->updated_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-info">Update</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>			
                    </div>
                </div>
              </div>
            </div>
        </section>
</div>
