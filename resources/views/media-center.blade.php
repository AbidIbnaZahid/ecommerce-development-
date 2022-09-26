@extends('master')
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="card" style="background-color:cadetblue; border-color:darkblue;">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">All Tv Channels</h4>
            <p class="card-text">Total: {{$list->count()}}</p>


            <a href="{{route('channel-delete-soft')}}" class="btn btn-danger">Delete</a>

          </div>
        </div>

        <div class="col-6">
            @if (session('channel-delete'))
                <div class="alert alert-danger">
                    {{session('channel-delete')}}
                </div>
             @endif

             @if (session('update_success'))
                <div class="alert alert-success">
                    {{session('update_success')}}
                </div>
            @endif

            @forelse ($list as $item)
                <div class="card my-5">
                    <div class="card-header {{($loop->odd==1)?" ":" "}}">
                        <h3>{{$loop->index+1  }}</h3>
                        <small class="text-info ">Reating:{{$loop->count}}</small>
                    </div>
                    <div class="card-cody"><h1>  {{$item->channel_name}}</h1>
                        <p class="text-end">Creted at: {{$item->created_at->diffForHumans()}}</p>
                        <a href="{{route('channel-delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{route('channel-edit',$item->id)}}" class="btn btn-info btn-sm">Edit Channels</a>
                        @if ($item->updated_at)
                        <p class="badge bg-primary">Updated at: {{$item->updated_at->diffForHumans()}}</p>
                        @endif
                     </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    No Channel Available
                </div>
            @endforelse
        </div>
        <div class="col-6">
            <div class="card my-5">
                <div class="card-header bg-danger">
                    <h3>Add Tv Channel</h3>
                </div>
                <div class="card-body">
                    @if (session('insert-success'))
                        <div class="alert alert-success">
                            {{session('insert-success')}}
                        </div>
                    @endif

                    <form action="{{route('media-center-insert')}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="">Enter Your channel Name</label>
                        <input type="text"
                            class="form-control  @error('channel_name') is-invalid  @enderror" name="channel_name"  placeholder="Please Enter your Channel">
                            @error('channel_name')
                                <small class="text-danger ">{{$message}}</small>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-success">Add Channel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info">
                    Recycle Bin
                    <br>
                    <a href="{{route('channel-delete-all')}}" class="btn btn-danger btn-sm text-right">Delete All</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Channel name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($delete_cannels as $delete_cannels)
                                <tr>
                                    <td>{{$delete_cannels->channel_name}}</td>
                                    <td>
                                        <a href="{{route('channel-restore',$delete_cannels->id)}}" class="btn btn-primary btn-sm">Restore</a>
                                        <a href="{{route('channel-delete-forever',$delete_cannels->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center text-danger">
                                    <td colspan="50"> No Deleted Tv Channel here</td>
                                </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
