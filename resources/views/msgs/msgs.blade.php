@extends('layouts.layout')

@section('content')


    @if(count($msgs))
        <h1 class="text-center">Messages</h1>
        @foreach($msgs as $msg)
           <div class="card mb-3">
               <div class="card-header">
                   {{ $msg->user->name }} (<i>{{ $msg->user->email }}</i>)
                   <div class="float-right">{{$msg->created_at}}</div>
               </div>
               <div class="card-body">
                   {{ $msg->message }}
                   <div class="text-right"><a class="text-danger" href="/delete/{{$msg->id}}">DELETE</a></div>
               </div>
           </div>
        @endforeach
        {{ $msgs->links() }}
    @else
        <h1 class="text-danger">NO MSGS</h1>
    @endif


    <form method="post">
        @csrf
        <div class="form-group">
            <textarea name="msg" maxlength="255" placeholder="Your Message*" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection