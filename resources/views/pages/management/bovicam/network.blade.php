<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#conn_tab">{{trans('bovicam.connection')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#firewall_tab">{{trans('bovicam.firewall')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#smartlink_tab">{{trans('bovicam.smartlink')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#gps_tab">{{trans('bovicam.gps')}}</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="conn_tab">
                @include('pages.management.bovicam.network.conn')
            </div>
            <div class="tab-pane" id="firewall_tab">
                @include('pages.management.bovicam.network.firewall')
            </div>
            <div class="tab-pane" id="smartlink_tab">
                @include('pages.management.bovicam.network.smartlink')
            </div>
            <div class="tab-pane" id="gps_tab">
                @include('pages.management.bovicam.network.gps')
            </div>
        </div>
    </div>
</div>