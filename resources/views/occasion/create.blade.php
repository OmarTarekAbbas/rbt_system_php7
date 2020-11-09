@extends('scaffold-interface.layouts.app')
@section('page_title','Create')
@section('content')

<section class="content">
    <h1>
        Create occasion
    </h1>
    <a href="{!!url('occasion')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Occasion Index</a>
    <br>
    <form method = 'POST' action = '{!!url("occasion")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="title">title</label>
            <input id="title" name = "title" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success borderRadius' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection
