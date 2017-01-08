<form class="navbar-form navbar-left" role="search" method="get" action="{{ action('SearchController@search') }}">
    <div class="input-group col-xs-6 col-sm-10 col-lg-12">
        <input class="form-control input" type="search" name="q" value="{{ request('q') }}" placeholder="Search">
        <div class="input-group-btn">
            <select id="searchtype" name="st" class="selectpicker form-control" data-style="btn-default">
                <option value="squad" {!! (request('st') === 'squad') ? 'selected="selected"' : '' !!}>Squad</option>
                <option value="commander" {!! (request('st') === 'commander') ? 'selected="selected"' : '' !!}>Player</option>
            </select>
        </div>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </span>
    </div>
</form>
