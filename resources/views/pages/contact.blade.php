@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.contact')])
@section('content')
    <div class="col overflow-auto">
        <?php
        $arr = array(env('CUSTOMIZE'));
        env('CUSTOMIZE') != 'bovia' && ($arr = array(env('CUSTOMIZE'), 'bovia'));
        ?>
        @foreach($arr as $value)
            @if(strlen($value) and trans('contact.'.$value) != 'contact.'.$value)
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        @if($value=='fet')
                            <td rowspan="6" class="text-center" width="30%" style="vertical-align: middle;">
                                <img src="img/fet2.png" style="max-width: 100%"></td>
                        @else
                            <td rowspan="6" class="text-center" width="30%" style="vertical-align: middle;">
                                <img src="img/{{$value}}.png" style="max-width: 100%"></td>
                        @endif
                        <th>{{trans('contact.company')}}</th>
                        <td>{{trans('contact.'.$value)}}</td>
                    </tr>
                    <tr>
                        <th width="20%">{{trans('contact.mail')}}</th>
                        <td width="50%">
                            {{trans('contact.'.$value.'MailName1')}}
                            <a href="mailto:{{trans('contact.'.$value.'Mail1')}}">{{trans('contact.'.$value.'Mail1')}}</a>
                            @if(strlen(trans('contact.'.$value.'MailName2')))
                                <br/>
                                {{trans('contact.'.$value.'MailName2')}}
                                <a href="mailto:{{trans('contact.'.$value.'Mail2')}}">{{trans('contact.'.$value.'Mail2')}}</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('contact.phone')}}</th>
                        <td>{{trans('contact.'.$value.'Phone')}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('contact.fax')}}</th>
                        <td>{{trans('contact.'.$value.'Fax')}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('contact.address')}}</th>
                        <td>{{trans('contact.'.$value.'Address')}}</td>
                    </tr>
                    </tbody>
                </table>
            @endif
        @endforeach
    </div>
@stop
@section('end_script')
    <script>
        $(document).ready(function () {
            $('.overflow-auto').height($(window).height() * 0.75);
            loading(false);
        });
    </script>
@stop