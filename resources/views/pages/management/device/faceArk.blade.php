<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <div>
            <span>{{trans('deviceConfig.scenariosSelected')}}:&emsp;</span>
            <select class="selectpicker form-control" id="scenarioSelected" data-width="fit">
                <option value="0">{{trans('deviceConfig.scenario')}} I</option>
                <option value="1">{{trans('deviceConfig.scenario')}} II</option>
                <option value="2">{{trans('deviceConfig.scenario')}} III</option>
                <option value="3">{{trans('deviceConfig.scenario')}} IV</option>
                <option value="4">{{trans('deviceConfig.scenario')}} V</option>
            </select>
        </div>
        <button class="btn btn-success save" data-target="faceArk" id="faceArkSave">{{trans('dictionary.Save')}}</button>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" style="display: none">
            <li class="nav-item">
                <a class="nav-link faceArk active" data-scenario="0" data-toggle="tab" href="#scenario_1"> I </a>
            </li>
            <li class="nav-item">
                <a class="nav-link faceArk" data-scenario="1" data-toggle="tab" href="#scenario_2"> II </a>
            </li>
            <li class="nav-item">
                <a class="nav-link faceArk" data-scenario="2" data-toggle="tab" href="#scenario_3"> III </a>
            </li>
            <li class="nav-item">
                <a class="nav-link faceArk" data-scenario="3" data-toggle="tab" href="#scenario_4"> IV </a>
            </li>
            <li class="nav-item">
                <a class="nav-link faceArk" data-scenario="4" data-toggle="tab" href="#scenario_5"> V </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="scenario_1">
                @include('pages.management.device.faceArk-scenario', ['scenario' => "1"])
            </div>
            <div class="tab-pane" id="scenario_2">
                @include('pages.management.device.faceArk-scenario', ['scenario' => "2"])
            </div>
            <div class="tab-pane" id="scenario_3">
                @include('pages.management.device.faceArk-scenario', ['scenario' => "3"])
            </div>
            <div class="tab-pane" id="scenario_4">
                @include('pages.management.device.faceArk-scenario', ['scenario' => "4"])
            </div>
            <div class="tab-pane" id="scenario_5">
                @include('pages.management.device.faceArk-scenario', ['scenario' => "5"])
            </div>
        </div>
    </div>
</div>