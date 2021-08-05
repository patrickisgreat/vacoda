@extends('base')
@section('component-headline', 'Offers')
@section('resource-name', 'offer')

@section('secondary-buttons')
    {{--Import Modal--}}
    {{--<button type="button"--}}
            {{--class="btn btn-default import"--}}
            {{--data-toggle="modal"--}}
            {{--data-target="#modal-import-offers">--}}
        {{--Import--}}
    {{--</button>--}}

@section('secondary-buttons')
    <a href="/offers/archived/" class="btn btn-default">Archived</a>
@endsection

@endsection

@section('component')
    <offers resource-name="offer"></offers>

    @include('partials.importModal')
@endsection
