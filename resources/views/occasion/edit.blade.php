@extends('scaffold-interface.layouts.app')
@section('page_title','Edit')
@section('content')
<div id="main-content">
  <section class="content">
    <h1>
      Edit occasion
    </h1>
    <a href="{!!url('occasion')!!}" class='btn btn-primary'><i class="fa fa-home"></i> Occasion Index</a>
    <br>
    <form method='POST' action='{!! url("occasion")!!}/{!!$occasion->
        id!!}/update'>
      <input type='hidden' name='_token' value='{{Session::token()}}'>
      <div class="form-group">
        <label for="title">title</label>
        <input id="title" name="title" type="text" class="form-control" value="{!!$occasion->
            title!!}">
      </div>
      <button class='btn btn-success' type='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
  </section>
</div>
@endsection
