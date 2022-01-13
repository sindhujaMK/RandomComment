@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="padding:10px">

                    <form method="POST" action="/comment">
                        @csrf
                        <div class="form-group">
                            <textarea rows="4" class="form-control" placeholder="Enter Comment" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form><br>
                </div>
                <h5 style="padding:10px">Comments</h5><br>
                <div class="row" style="padding:10px">
                    <div class="col-sm-12">
                        @foreach($Comment as $comments)
                            <div class="panel panel-default">
                                <div class="panel-body">{{$comments->comment}} - {{$comments->email}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
