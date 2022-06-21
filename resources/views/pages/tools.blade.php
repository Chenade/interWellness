@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Tools')])
@section('content')
    <div class="col overflow-auto">
        <table class="table table-hover table-bordered text-center" id="apps">
            <thead>
            <tr>
                <th></th>
                <th>{{trans('dictionary.Tools_OS')}}</th>
                <th>{{trans('dictionary.Version')}}</th>
                <th>{{trans('dictionary.Download')}}</th>
                <th>{{trans('dictionary.Manual')}}</th>
            </tr>
            </thead>
            <tbody>
            {{--            <tr>--}}
            {{--                <th class="text-center" colspan="5" style="background-color: #eee">BoviLive Web</th>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th rowspan="3"><i class="fab fa-chrome fa-2x"> Chrome</i></th>--}}
            {{--                <td><i class="fab fa-windows"></i> Windows</td>--}}
            {{--                <td rowspan="3" colspan="3"><a href="https://bovia.com.tw/app/manual/Web.pdf" target="_blank">User Manual</a>--}}
            {{--                </td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td><i class="fab fa-apple"></i> MacOS</td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td><i class="fab fa-linux"></i> Linux</td>--}}
            {{--            </tr>--}}
            <tr>
                <th class="text-center" colspan="5" style="background-color: #eee">BoviLive Apps</th>
            </tr>
            {{--            <tr>--}}
            {{--                <th class="text-center" colspan="5" style="background-color: #eee">--}}
            {{--                    BoviCam {{trans('dictionary.Tools')}}</th>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th>{{trans('dictionary.File_Exporter')}}</th>--}}
            {{--                <td><i class="fab fa-windows"></i> Windows</td>--}}
            {{--                <td>2016-12-07</td>--}}
            {{--                <td>--}}
            {{--                    <a class="btn btn-primary btn-sm" href="/app/win/FileExport.7z" role="button"><i class="fa fa-download"></i></a>--}}
            {{--                </td>--}}
            {{--                <td>TBA</td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th>{{trans('dictionary.File_Decryptor')}}</th>--}}
            {{--                <td><i class="fab fa-windows"></i> Windows</td>--}}
            {{--                <td>2016-12-07</td>--}}
            {{--                <td>--}}
            {{--                    <a class="btn btn-primary btn-sm" href="/app/win/FileDecrypt.7z" role="button"><i class="fa fa-download"></i></a>--}}
            {{--                </td>--}}
            {{--                <td>TBA</td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th class="text-center" colspan="5" style="background-color: #eee">{{trans('dictionary.Tools_Other')}}</th>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th rowspan="3">{{trans('dictionary.VLC_Player')}}</th>--}}
            {{--                <td><i class="fab fa-windows"></i> Windows</td>--}}
            {{--                <td rowspan="3" colspan="3"><a href="https://www.videolan.org/vlc/#download" target="_blank">https://www.videolan.org/vlc/#download</a>--}}
            {{--                </td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td><i class="fab fa-apple"></i> MacOS</td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td><i class="fab fa-linux"></i> Linux</td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <th rowspan="3">MS VC++ 2008 Redistributable Package</th>--}}
            {{--                <td><i class="fab fa-windows"></i> Windows</td>--}}
            {{--                <td colspan="3">--}}
            {{--                    <a href="https://www.microsoft.com/zh-TW/download/details.aspx?id=29" target="_blank">https://www.microsoft.com/zh-TW/download/details.aspx?id=29</a>--}}
            {{--                </td>--}}
            {{--            </tr>--}}
            </tbody>
        </table>
    </div>
@stop
@section('end_script')
    <script src="js/tools.min.js?v={{Config::get('app.version')}}"></script>
@stop