@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show rbt
    </h1>
    <br>
    <a href='{!!url("rbt")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Rbt Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>track_title_en</b> </td>
                <td>{!!$rbt->track_title_en!!}</td>
            </tr>
            <tr>
                <td> <b>track_title_ar</b> </td>
                <td>{!!$rbt->track_title_ar!!}</td>
            </tr>
            <tr>
                <td> <b>code</b> </td>
                <td>{!!$rbt->code!!}</td>
            </tr>
            <tr>
                <td> <b>social_media_code</b> </td>
                <td>{!!$rbt->social_media_code!!}</td>
            </tr>
            <tr>
                <td> <b>owner</b> </td>
                <td>{!!$rbt->owner!!}</td>
            </tr>
            <tr>
                <td> <b>track_file</b> </td>
                <td>{!!$rbt->track_file!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>title : </i></b>
                </td>
                <td>{!!$rbt->operator->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>created_at : </i></b>
                </td>
                <td>{!!$rbt->operator->created_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>updated_at : </i></b>
                </td>
                <td>{!!$rbt->operator->updated_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>title : </i></b>
                </td>
                <td>{!!$rbt->occasion->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>created_at : </i></b>
                </td>
                <td>{!!$rbt->occasion->created_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>updated_at : </i></b>
                </td>
                <td>{!!$rbt->occasion->updated_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>title : </i></b>
                </td>
                <td>{!!$rbt->aggregator->title!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>created_at : </i></b>
                </td>
                <td>{!!$rbt->aggregator->created_at!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>updated_at : </i></b>
                </td>
                <td>{!!$rbt->aggregator->updated_at!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection