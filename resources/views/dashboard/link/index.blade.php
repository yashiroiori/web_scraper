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
                        <td>Main Filter Selector</td>
                        <td>Website</td>
                        <td>Assigned To Category</td>
                        <td>Item Schema</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($links as $link)
                        <tr>
                            <td>{{ $link->url }}</td>
                            <td>{{ $link->main_filter_selector }}</td>
                            <td>{{ $link->website->title }} </td>
                            <td><strong><span class="label label-info">{{ $link->category->title }}</span></strong> </td>
                            <td>
                                <select class="item_schema" data-id="{{ $link->id }}" data-original-schema="{{$link->item_schema_id}}">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($itemSchemas as $item)
                                        <option value="{{$item->id}}" {{ $item->id==$link->item_schema_id?"selected":"" }}>{{$item->title}}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-info btn-sm btn-apply" style="display: none">Apply</button>
                            </td>
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

@section('script')
    <script>
        $(function () {
           $("select.item_schema").change(function () {
              if($(this).val() != $(this).attr("data-original-schema")) {
                  $(this).siblings('.btn-apply').show();
              }
           });
        });
    </script>
@endsection