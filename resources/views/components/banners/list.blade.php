@extends('base')
@section('component-headline', 'Banners')
@section('resource-name', 'banner')

@section('secondary-buttons')
    <a href="/banners/archived/" class="btn btn-default">Archived</a>
@endsection

@section('component')
    <banners resource-name="banner"></banners>
@endsection