@extends('adminmodule::layouts.adminMaster')

@section('styles')

@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('adminmodule::pages.users.edit.templates.header')
                @include('adminmodule::pages.users.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection