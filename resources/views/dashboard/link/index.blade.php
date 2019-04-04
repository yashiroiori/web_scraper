@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Links</h2>

            <a href="{{ route('links.create') }}" class="btn btn-warning pull-right">Add new</a>

            @if(count($links) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Url</td>
                        <td>Website</td>
                        <td>Assigned To Category</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($links as $link)
                        <tr>
                            <td>{{ $link->url }}</td>
                            <td>{{ $link->website->title }} </td>
                            <td><strong><span class="label label-info">{{ $link->category->title }}</span></strong> </td>
                            <td>
                                <a href="{{ url('dashboard/links/' . $link->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($links) > 0)
                    <div class="pagination">
                        <?php echo $links->render();  ?>
                    </div>
                @endif

            @else
                <i>No links found</i>

            @endif
        </div>
    </div>

@endsection