@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Articles</h2>

                @if(count($articles) > 0)

                    @foreach($articles as $article)
                        <div class="row">

                        </div>
                    @endforeach

                @else
                        <i>No articles found</i>

                @endif
        </div>
    </div>

@endsection