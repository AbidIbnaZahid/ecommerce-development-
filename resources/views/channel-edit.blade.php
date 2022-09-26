@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card my-5 m-auto">
                <div class="card-header">
                    <h3>Edit Channel</h3>

                </div>
                <div class="card-body">


                    <form action="{{route('media-center-update',$channel_info->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="">Enter Your channel Name</label>
                        <input type="text"
                            class="form-control  @error('channel_name') is-invalid  @enderror" name="channel_name"  placeholder="Please Enter your Channel" value=" {{$channel_info->channel_name}}">
                            @error('channel_name')
                                <small class="text-danger ">{{$message}}</small>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-success">Update Channel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
