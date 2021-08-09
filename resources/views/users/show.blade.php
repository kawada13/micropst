@extends('layouts.app')

@section('content')
    <div class="row">



        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                <img class="mr-2 rounded" src="https://www.kurieisha.com/wp-content/uploads/2021/05/007.jpg" alt="" style="width:220px;">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>



        <div class="col-sm-8">


            @include('users.navtabs', ['user' => $user])



            @if (Auth::id() == $user->id)
            <form class="mb-4" method="post" action="{{ route('microposts.store') }}">
            @csrf
              <div class="form-group">
                <label for="exampleFormControlTextarea1">ツイートする</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>
              </div>
              <button type="submit" class="btn btn-primary">投稿する</button>
            </form>
            @endif




            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif

            
        </div>

        
    </div>
@endsection