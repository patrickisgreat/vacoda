@extends('base')
@section('component-headline', 'Reporting')

@section('component')
    <report-show id="report-show" :user="user" :team="currentTeam" inline-template>

        <form role="form" class="col-md-4">
            <h3>Narrow your reports by these filters:</h3>

            <!-- Banner Search -->
            <div class="form-group" :class="{'has-error': form.errors.has('banner_ids')}">
                <label class="control-label">Banner</label>

                <resource-search resource-name="banner" search-target="name" :selected.sync="form.banner_ids" :selected-data.sync="selectedBanners" show-id="true"></resource-search>

                <span class="help-block" v-show="form.errors.has('banner_ids')">
                    @{{ form.errors.get('banner_ids') }}
                </span>
            </div>

            <!-- Category Search -->
            <div class="form-group" :class="{'has-error': form.errors.has('category_ids')}">
                <label class="control-label">Marketing Segmentation</label>

                <resource-search resource-name="categories" search-target="cell_label" :selected.sync="form.category_ids" :haystack-limit="categoryLimit"></resource-search>

                <span class="help-block" v-show="form.errors.has('category_ids')">
                    @{{ form.errors.get('category_ids') }}
                </span>
            </div>

            <!-- Report Type -->
            <div class="form-group" :class="{'has-error': form.errors.has('type')}">
                <label class="control-label">Type of Report</label>

                <div>
                    <input type="radio" name="type" id="report_type_summary" value="summary" v-model="form.type">
                    <label for="report_type_summary" class="control-label">Summary</label>
                </div>

                {{-- <div>
                    <input type="radio" name="type" id="report_type_trending" value="trending" v-model="form.type">
                    <label for="report_type_trending" class="control-label">Trending</label>
                </div> --}}

                <span class="help-block" v-show="form.errors.has('type')">
                    @{{ form.errors.get('type') }}
                </span>
            </div>

            <!-- Date Range -->
            <div class="form-group" :class="{'has-error': form.errors.has('start_date') || form.errors.has('end_date')}">
                <label class="control-label">Start Date </label>

                <div>
                    <div class='input-group date datetimepicker' id='report-start'>
                        <input type='text' class="form-control" v-model="form.start_date">
                        <span class="input-group-addon">
                            <span class="icon-icon_calendar"></span>
                        </span>
                    </div>

                    <span class="help-block" v-show="form.errors.has('start_date')">
                        @{{ form.errors.get('start_date') }}
                    </span>
                </div>
                <br/>

                <label class="control-label">End Date </label>

                <div>
                    <div class='input-group date datetimepicker' id='report-end'>
                        <input type='text' class="form-control" v-model="form.end_date">
                        <span class="input-group-addon">
                            <span class="icon-icon_calendar"></span>
                        </span>
                    </div>

                    <span class="help-block" v-show="form.errors.has('end_date')">
                        @{{ form.errors.get('end_date') }}
                    </span>
                </div>
            </div>

            <!-- Trend Interval -->
            <div class="form-group" :class="{'has-error': form.errors.has('trend_interval')}" v-show="form.type === 'trending'">
                <label class="control-label">Trend Interval</label>

                <div>
                    <select class="form-control" name="trend_interval" v-model="form.trend_interval">
                        <option value="">Select Interval</option>
                        <option value="year">Year</option>
                        <option value="quarter">Quarter</option>
                        <option value="month">Month</option>
                        <option value="week">Week</option>
                    </select>

                    <span class="help-block" v-show="form.errors.has('trend_interval')">
                        @{{ form.errors.get('trend_interval') }}
                    </span>
                </div>
            </div>

            <!-- Data Points -->
            <div class="form-group" :class="{'has-error': form.errors.has('data_points')}">
                <label class="control-label">Data Points</label>

                <div>
                    <div>
                        <input type="checkbox" id="data-points-sent" value="sent" v-model="form.data_points" class="checkbox-custom">
                        <label class="control-label checkbox-custom-label" for="data-points-sent">Sent</label>
                    </div>

                    <div>
                        <input type="checkbox" id="data-points-bounce" value="bounce" v-model="form.data_points" class="checkbox-custom">
                        <label class="control-label checkbox-custom-label" for="data-points-bounce">Bounce Rate</label>
                    </div>

                    <div>
                        <input type="checkbox" id="data-points-open" value="open" v-model="form.data_points" class="checkbox-custom">
                        <label class="control-label checkbox-custom-label" for="data-points-open">Open Rate</label>
                    </div>

                    <div>
                        <input type="checkbox" id="data-points-click" value="click" v-model="form.data_points" class="checkbox-custom">
                        <label class="control-label checkbox-custom-label" for="data-points-click">Click Rate on Open</label>
                    </div>

                    <span class="help-block" v-show="form.errors.has('data_points')">
                        @{{ form.errors.get('data_points') }}
                    </span>
                </div>
            </div>

            <!-- Submit Button -->
            <div id="buttons" class="form-group">
                <button id="submit" class="btn btn-default"
                        @click.prevent="submit"
                        :disabled="form.busy">
                    Show Report
                </button>

                <button id="reset" class="btn btn-default"
                        @click.prevent="reset"
                        :disabled="form.busy">
                    Reset
                </button>
            </div>
        </form>
    </report-show>

    <div id="report-results-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <p class="modal-subtitle"></p>
                </div>

                <div class="modal-body">
                    <div id="report-results"></div>
                </div>
            </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endsection
