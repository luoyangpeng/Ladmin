@extends('layouts.login')

@section('content')

    <form class="forget-form" action="{{ url('/password/email') }}" method="post" novalidate="novalidate" style="display: block;">
        <h3 class="font-green">Forget Password ?</h3>
        @if (isset($errors) && count($errors) > 0 )
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                @foreach($errors->all() as $error)
                    <span class="help-block"><strong>{{ $error }}</strong></span>
                @endforeach
            </div>

        @endif
        {!! csrf_field() !!}
        <p> 输入email地址重置密码. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"> </div>
        <div class="form-actions">

            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>

@endsection