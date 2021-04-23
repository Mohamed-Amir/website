@extends('Fronted.layouts.master')

@section('title')
    المحامي نضال
    @endsection

@section('content')
    @include('Fronted.GeneralPages.banner')
    @include('Fronted.GeneralPages.homeAbout')
    @include('Fronted.Services.homeServices')
    @include('Fronted.Consults.homeConsults')
@endsection