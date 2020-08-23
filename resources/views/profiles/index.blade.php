@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-3 p-6" >
                <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100" style="max-width: 250px">

            </div>
            <div class="col-9 p-5 ">
                <div class="d-flex justify-content-between align-items-baseline">


                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user-> name }}</div>
                        <button class="btn btn-primary ml-4">Follow</button>
                    </div>

                    @can('update', $user->profile)
                        <a href="/p/create"><button class="btn btn-outline-secondary pt-2">Create New Post</button></a>
                    @endcan
                </div>



                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>25k</strong> followers</div>
                    <div class="pr-5"><strong>222</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit"><div class="text-danger h5 pt-2">Edit Post</div></a>
                @endcan

            </div>
        </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-4 p-3 d-flex">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 m-3">
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
