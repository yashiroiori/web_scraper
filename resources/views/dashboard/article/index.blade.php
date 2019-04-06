@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Articles</h2>

            @if(count($articles) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>Image</td>
                        <td>Source link</td>
                        <td>Category</td>
                        <td>Website</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td><img width="150" src="{{ $article->image }}" /></td>
                            <td><a href="{{ $article->source_link }}" target="_blank">View</a> </td>
                            <td>{{ $article->category->title }}</td>
                            <td>{{ $article->website->title }}</td>
                            <td>
                                <form method="post" action="{{ route('articles.destroy', ['id' => $article->id]) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}

                                    <button class="btn btn-danger" type="submit" onclick="if(!confirm('Are you sure')) return false;"><i class="glyphicon glyphicon-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($articles) > 0)
                    <div class="pagination">
                        <?php echo $articles->render();  ?>
                    </div>
                @endif

            @else
                <i>No articles found</i>

            @endif
        </div>
    </div>

@endsection