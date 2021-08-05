@extends('base')
@section('component-headline', 'Banners Scheduled for Auto-Archive')
@section('resource-name', 'banner')

@section('component')
    <h5>{{ $scheduled->count() }} banners scheduled for auto-archive on Saturday, {{ date("m/d/Y", strtotime("next Saturday")) }}:</h5>

    <table class="table" style="width: 500px;">
        <tr>
            <th>Name</th>
            <th>End Date</th>
        </tr>

        @forelse ($scheduled as $banner)
            <tr>
                <td><a href="/banner/{{ $banner->id }}">{{ $banner->name }}</a></td>
                <td>{{ $banner->end_date }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">No banners scheduled for auto-archive.</td>
            </tr>
        @endforelse
    </table>
@endsection
