@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<div id="main-content">
  <section class="content">
    <h1>
      Show report
    </h1>
    <br>
    <a href='{!!url("report")!!}' class='btn btn-primary'><i class="fa fa-home"></i>Report Index</a>
    <br>
    <table class='table table-bordered'>
      <thead>
        <th>Key</th>
        <th>Value</th>
      </thead>
      <tbody>
        <tr>
          <td> <b>year</b> </td>
          <td>{!!$report->year!!}</td>
        </tr>
        <tr>
          <td> <b>month</b> </td>
          <td>{!!$report->month!!}</td>
        </tr>
        <tr>
          <td> <b>partner</b> </td>
          <td>{!!$report->partner!!}</td>
        </tr>
        <tr>
          <td> <b>total</b> </td>
          <td>{!!$report->total!!}</td>
        </tr>
        <tr>
          <td> <b>partner_percentage</b> </td>
          <td>{!!$report->partner_percentage!!}</td>
        </tr>
        <tr>
          <td> <b>sencod_part_percentage</b> </td>
          <td>{!!$report->sencod_part_percentage!!}</td>
        </tr>
        <tr>
          <td> <b>partner_amount</b> </td>
          <td>{!!$report->partner_amount!!}</td>
        </tr>
        <tr>
          <td> <b>second_part_amount</b> </td>
          <td>{!!$report->second_part_amount!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>title : </i></b>
          </td>
          <td>{!!$report->currency->title!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>created_at : </i></b>
          </td>
          <td>{!!$report->currency->created_at!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>updated_at : </i></b>
          </td>
          <td>{!!$report->currency->updated_at!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>title : </i></b>
          </td>
          <td>{!!$report->type->title!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>created_at : </i></b>
          </td>
          <td>{!!$report->type->created_at!!}</td>
        </tr>
        <tr>
          <td>
            <b><i>updated_at : </i></b>
          </td>
          <td>{!!$report->type->updated_at!!}</td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
@endsection
