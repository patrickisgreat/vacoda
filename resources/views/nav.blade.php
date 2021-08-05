<!-- Tabs -->
<div class="col-md-2">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            <span>Manage</span>
        </div>
        <div class="panel-body">
            <ul class="nav spark-settings-stacked-tabs">
                <li><a href="{{ route('offers') }}">Offers</a></li>
                <li><a href="{{ route('banners') }}">Banners</a></li>
                <li><a href="/settings#/teams">Team Details</a></li>

                {{-- Only Show to Developers --}}
                @if (Spark::developer(Auth::user()->email))
                    <li><a href="{{ route('templates') }}">Templates</a></li>
                    <li><a href="{{ route('themes') }}">Themes</a></li>
                    <li><a href="{{ route('options') }}">Options</a></li>
                    <li><a href="{{ route('option-types') }}">Option Types</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>