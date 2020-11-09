@extends('scaffold-interface.layouts.app')
@section('page_title','Show')
@section('content')
<div id="main-content">
  <section class="content">
    <h1>
      Show occasion
    </h1>
    <br>
    <a href='{!!url("occasion")!!}' class='btn btn-primary'><i class="fa fa-home"></i>Occasion Index</a>
    <br>
    <table class='table table-bordered'>
      <thead>
        <th>Key</th>
        <th>Value</th>
      </thead>
      <tbody>
        <tr>
          <td> <b>title</b> </td>
          <td>{!!$occasion->title!!}</td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
@endsection
