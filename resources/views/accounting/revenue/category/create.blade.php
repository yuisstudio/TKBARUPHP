@extends('layouts.adminlte.master')

@section('title')
    @lang('accounting.revenue.category.create.title')
@endsection

@section('page_title')
    <span class="glyphicon glyphicon-flash"></span>&nbsp;@lang('accounting.revenue.category.create.page_title')
@endsection

@section('page_title_desc')
    @lang('accounting.revenue.category.create.page_title_desc')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>@lang('labels.GENERAL_ERROR_TITLE')</strong> @lang('labels.GENERAL_ERROR_DESC')<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('accounting.revenue.category.create.header.title')</h3>
        </div>
        <form class="form-horizontal" action="{{ route('db.acc.revenue.category.create') }}" method="post" data-parsley-validate="parsley">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputGroup" class="col-sm-2 control-label">@lang('accounting.revenue.category.field.group')</label>
                    <div class="col-sm-10">
                        <select id="inputGroupSelect" name="group_select" class="form-control">
                            <option value="">@lang('labels.PLEASE_SELECT')</option>
                            @foreach ($groupdistinct as $g)
                                <option value="{{ $g->group }}">{{ $g->group }}</option>
                            @endforeach
                        </select>
                        <input id="inputGroupText" name="group" type="text" class="form-control" placeholder="@lang('labels.CREATE_NEW')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">@lang('accounting.revenue.category.field.name')</label>
                    <div class="col-sm-10">
                        <input id="inputName" name="name" type="text" class="form-control" placeholder="@lang('accounting.revenue.category.field.name')" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputButton" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <a href="{{ route('db.acc.revenue.category') }}" class="btn btn-default">@lang('buttons.cancel_button')</a>
                        <button class="btn btn-default" type="submit">@lang('buttons.submit_button')</button>
                    </div>
                </div>
            </div>
            <div class="box-footer"></div>
        </form>
    </div>
@endsection