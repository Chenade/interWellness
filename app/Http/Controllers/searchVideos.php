<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use ErrorException;
use Illuminate\Support\Facades\Lang;

class searchVideos extends Controller
{
    public static function sizeFromUrl($url = null)
    {
        $size = 0;
        if ($url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE);
            $data = curl_exec($ch);
            $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
            curl_close($ch);
        }

        return $size;
    }

    public static function gender($code = 1)
    {
        switch ($code) {
            case 0:
                $gender = trans('ai.unknown');
                break;
            case 1:
                $gender = trans('ai.male');
                break;
            case 2:
                $gender = trans('ai.female');
                break;
            case 9:
                $gender = trans('ai.notApplicable');
                break;
            default:
                $gender = 'N/A';
                break;
        }

        return $gender;
    }

    public static function birthday($birth)
    {
        $age = 0;
        if (is_string($birth)) {
            try {
                list($year, $month, $day) = explode('-', $birth);
                $cm = date('n');
                $cd = date('j');
                $age = date('Y') - $year - 1;
                if ($cm > $month || $cm == $month && $cd > $day) $age++;
            } catch (ErrorException $e) {
                $age = 0;
            }
        }
        return $age;
    }

    public static function gen_button($text = ''){
        $color = '';
        switch ($text){
            case "Person":
                $color = "#ff0000";
                break;
            case "Car":
                $color = "#94ffe6";
                break;
            case "Bike":
                $color = "#7773ff";
                break;
            case "Airplane":
                $color = "#8fb5a7";
                break;
            case "Bus":
                $color = "#f1fae6";
                break;
            case "Train":
                $color = "#e6e6fa";
                break;
            case "Truck":
                $color = "#ffcc00";
                break;
            case "Boat":
                $color = "#f1ff73";
                break;
            case "Bag":
                $color = "#6dfc6f";
                break;
            case "Suitcase":
                $color = "#ca6ad9";
                break;
            default:
                $color = '#ff0000';
                break;
        }
        return '<button class="btn btn-xs or-draw" id="'. $text .'" style="background-color:' . $color . '">' . $text . '</button>';

    }

    public static function selection($large = false, $checked = false, $description = '', $id = '0', $class = '', $disabled = false, $attr = '')
    {
        if ($large) {
            $str = '<div class="checkbox"> <label>';
            $str .= '<input type="checkbox" class="' . $class . '" data-id="' . strval($id) . '" ' . ($checked ? 'checked ' : ' ') . ($disabled ? 'disabled' : '') . ' ' . $attr . ' >';
            $str .= '<span class="cr" style="width: 1.5em; height: 1.5em;">';
            $str .= '<i class="cr-icon fas fa-check" style="font-size: 12pt"></i></span></label></div>';
        } else {
            $str = '<label class="custom-control overflow-checkbox">';
            $str .= '<input type="checkbox" class="overflow-control-input ' . $class . '" data-id="' . strval($id) . '" ' . ($checked ? 'checked' : '') . ' ' . $attr . ' >';
            $str .= '<span class="overflow-control-indicator"></span>';
            $str .= '<span class="material-control-description">' . $description . '</span>';
            $str .= '</label>';
        }
        return $str;
    }

    public static function formatBytes($bytes = 0, $decimals = 0, $k = 1000)
    {
        if ($bytes < 1) return '0 Byte';
        $dm = $decimals + 1 || 3;
        $sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $i = floor(log($bytes) / log($k));

        $size = strval(number_format(floatval($bytes / pow($k, $i)), $dm));
        if (substr($size, -2) == '.0') {
            $size = substr($size, 0, -2);
        }

        return $size . ' ' . $sizes[$i];
    }

    public static function dataTable($videos = [], $target = 'playback')
    {
        $rows = [];
        Lang::setLocale(session('setLocale'));

        foreach ($videos as $video) try {

            $snapshot = '<div class="image-container"><img data-src="' . $video['snapshotUrl'] . '" class="play-snapshot" id="' . $video['id'] . '" onerror="this.src=\'/img/default.jpg\';"/><div class="play-icon" data-id="' . $video['id'] . '"></div> </div>';
            $author = $video['user']['id'] . '&ensp;' . $video['user']['info']['name'];
            $size = self::formatBytes($video['size'], 0, 1024);

            if (session('user')['permission']['video'])
                $download = '<button class="btn btn-lg btn-link" onclick="window.location.href=\'' . $video['downloadUrl'] . '\'" ' . (array_key_exists('stopTime', $video) ? '' : 'disabled') . '><i class="fas fa-download"> </i> </button>';
            else
                $download = '';

            $keep = self::selection(false, $video['keep'], trans('dictionary.Preservation'), $video['id'], 'video-keep', false);

            $time = round($video['length']);
            $duration = array_key_exists('stopTime', $video) ? sprintf('%02d:%02d:%02d', ($time / 3600), ($time / 60 % 60), $time % 60) : 'Live';

            $str = '<div class="d-flex flex-row">';
            $str .= '<div class="align-self-center" style="padding: 0 15px">' . self::selection(true, false, '', $video['id'], 'selection', !(array_key_exists('stopTime', $video))) . '</div>';
            $str .= '<div class="align-self-center">' . $snapshot . '</div>';
            $str .= '<div class="col-4">';
            $str .= '<div class="align-self-center" style="height: 65px"><input type="text" class="form-control video-title" data-id="' . $video['id'] . '" value="' . $video['title'] . '" style="border: none; background-color: transparent; font-size: 1.4em; padding: 0" disabled></div>';
            $str .= '<div class="align-self-center" style="height: 65px"><input type="text" class="form-control" value="' . $author . '" style="border: none; background-color: transparent; padding: 0" disabled>' . '<div class="text-muted">' . $video['device']['info']['type'] . '</div></div>';
            $str .= '</div>';
            $str .= '<div class="col-3">';
            $str .= '<div class="align-self-center" style="height: 65px"><i class="fas fa-play text-info">&ensp;</i>' . $duration . '</div>';
            $str .= '<div class="align-self-center video-utc-time" style="height: 65px"><i class="far fa-calendar-plus text-info">&ensp;</i>' . $video['startTime'] . '</></div>';
            $str .= '</div>';
            $str .= '<div class="col align-self-center">' . $size . '</div>';
            $str .= '<div class="col align-self-center">' . $download . '</div>';
            if (session('user')['permission']['video'])
                $str .= '<div class="col align-self-center">' . $keep . '</div>';
            $str .= '</div>';

            array_push($rows, array(
                "DT_RowId" => $video['id'],
                $str
            ));
        } catch (ErrorException $e) {
            error_log($e);
        }

        return ['origin' => $videos, 'data' => $rows];
    }

    public static function vaEvents($videos = [])
    {
        $rows = [];
        Lang::setLocale(session('setLocale'));

        foreach ($videos as $video) try {

            $snapshot = '<div class="image-container"><img data-src="' . $video['snapshotUrl'] . '" class="play-snapshot" id="' . $video['id'] . '" onerror="this.src=\'/img/default.jpg\';"/><div class="play-icon" data-id="' . $video['id'] . '"></div> </div>';
            $description = $video['description'];
            $author = $video['targetId'];
            $size = self::formatBytes($video['size'], 0, 1024);
            $download = '<button class="btn btn-lg btn-link" onclick="window.location.href=\'' . $video['downloadUrl'] . '\'"><i class="fas fa-download"> </i> </button>';
            $keep = self::selection(false, $video['keep'], trans('va.keep'), $video['id'], 'video-keep', false);
            $misjudged = self::selection(false, $video['misjudged'], trans('va.misjudged'), $video['id'], 'video-misjudged', false);
            $time = $video['date'];

            $str = '<div class="d-flex flex-row">';
            $str .= '<div class="align-self-center" style="padding: 0 15px">' . self::selection(true, false, '', $video['id'], 'selection', 0) . '</div>';
            $str .= '<div class="align-self-center">' . $snapshot . '</div>';
            $str .= '<div class="col-3">';
            $str .= '<div class="align-self-center" style="height: 65px"><input type="text" class="form-control video-title" data-id="' . $video['id'] . '" value="' . $description . '" style="border: none; background-color: transparent; font-size: 1.4em; padding: 0" disabled></div>';
            $str .= '<div class="align-self-center" style="height: 65px"><input type="text" class="form-control" value="' . $author . '" style="border: none; background-color: transparent; padding: 0" disabled>' . '<div class="text-muted">' . '</div></div>';
            $str .= '</div>';
            $str .= '<div class="col-3">';

            $triggered = '';
            if ($video['triggered']) foreach ($video['triggered'] as $_triggered) $triggered .= trans('va.' . $_triggered) . ', ';
            if ($triggered . endsWith(', ')) {
                $triggered = substr($triggered, 0, -2);
            }

            $str .= '<div class="align-self-center" style="height: 65px"><i class="fas fa-bell text-info">&ensp;</i>' . $triggered . '</div>';

            $str .= '<div class="align-self-center" style="height: 65px"><i class="far fa-calendar-plus text-info">&ensp;</i><span class="utc-time">' . $time . '</span></div>';
            $str .= '</div>';
            $str .= '<div class="col align-self-center">' . $size . '</div>';
            $str .= '<div class="col align-self-center">' . $download . '</div>';
            $str .= '<div class="col align-self-center">' . $keep . '</div>';
            $str .= '<div class="col align-self-center">' . $misjudged . '</div>';
            $str .= '</div>';

            array_push($rows, array(
                "DT_RowId" => $video['id'],
                $str
            ));

        } catch (ErrorException $e) {
            error_log($e);
        }

        return ['origin' => $videos, 'data' => $rows];
    }

    public static function frEvents($events = [])
    {
        Lang::setLocale(session('setLocale'));
        $class = 'background-color: transparent; border: transparent; font-size: 1.2em; line-height: 2em; min-width:10em;';
        $previous_id = 0;

        try {
            $rows = [];
            foreach ($events as $index => $event) {

                $vid = (int)$event['id'];
                $checkbox = self::selection(true, false, '', $vid, 'selection', false, '');

                $attr = ' ';
                foreach ($event['metadata'] as $face) if ($face['faceIndex'] == $event['faceIndex']) {
                    foreach (['x', 'y', 'w', 'h'] as $roi) $attr .= $roi . '="' . strval($face[$roi]) . '" ';
                    break;
                }
                //GPS Info
                $lng = $event['longitude'];
                $lat = $event['latitude'];
                $next_id = (array_key_exists($index + 1, $events)) ? (int)$events[$index + 1]['id'] : '999999';

                $img = '<div><img style="border-radius: 4px; margin: 5px;" 
                            content="' . $event['snapshotUrl'] . '" 
                            id="event_' . $vid . '" 
                            class="img-origin" 
                            data-src="' . $event['photoUrl'] . '" 
                            data-lat="' . $lat . '" 
                            data-lng="' . $lng . '" 
                            data-previous="event_' . $previous_id . '" 
                            data-next="event_' . $next_id . '" 
                            data-keep="' . $event['keep'] . '"
                            data-misjudged="' . $event['misjudged'] . '"
                            width="120" 
                            height="160" 
                            onerror="this.src=\'/img/default.jpg\';" ' . $attr . 'data-time="' . $event['detectTime'] . '"' . '/></div>';
                $figcaption = '<div class="align-self-center"><h5>' .trans('ai.snapshot') .'</h5></div>';
                $previous_id = $vid;

                $snap = '<div class="d-flex flex-column justify-content-around align-content-around">' . '<div><i class="fas fa-user-circle fa-7x"></i></div><div class="align-self-center"><h5>' . trans('ai.visitor') .'</h5></div></div>';
                $col_1 = '<div class="d-flex flex-column justify-content-around align-content-around">' . $img . $figcaption . '</div>';
                $col_2 = '';
                $col_3 = '';

                if(count($event['triggered']) > 0){

                    $triggers = $event['triggered'];
                    //Sorting
                    $score = array();
                    foreach ($triggers as $key => $row) $score[$key] = $row['score'];
                    array_multisort($score, SORT_DESC, $triggers);

                    $selector = 0;
                    $count = 0;
                    foreach ($triggers as $trigger) {
                        if ($trigger['wanted']) {
                            $selector = $count;
                            break;
                        }
                        $count += 1;
                        if ($count > 9) break;
                    }

                    $triggers = $triggers[$selector];

                    $snapshot = ($triggers['photoUrl'] == '') ? 'img/default.jpg' : $triggers['photoUrl'];
                    $snapshot = '<div><img event-id="'.$vid.'" style="border-radius: 4px; margin: 5px;" content="' . $triggers['idCard'] . '" id="'.$vid.'" class="img-rankList" data-src="' . $snapshot . '" width="120"  height="160" onerror="this.src=\'/img/default.jpg\';"/></div>';
                    $figcaptions = '<div class="align-self-center"><h5>' . round($triggers['score']) .'%</h5></div>';
                    $snap = '<div class="d-flex flex-column justify-content-around align-content-around">' . $snapshot . $figcaptions . '</div>';

                    $wanted = ($triggers['wanted']) ? '<button class="btn btn-sm btn-danger">&emsp;' . trans('ai.yes') . '&emsp;</button>' : '<button class="btn btn-sm btn-secondary">&emsp;' . trans('ai.no') . '&emsp;</button>';
                    $tagText = '';
                    if($triggers['tagText']){
                        foreach ($triggers['tagText'] as $tag){
                            $tagText .= $tag;
                        }
                    }

                    $col_2 = '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.name') . ':</span><span>' . $triggers['name'] . '</span></div>';
                    $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.idCard') . ':</span><span style="margin-right: 1em;">' . $triggers['idCard'] . '</span></div>';
                    $col_2 .= '<div class="d-flex justify-content-start flex-wrap">';
                    $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.gender') . ':</span><span>' . self::gender($triggers['gender']) . '</span></div>';
                    $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.age') . ':</span><span>' . self::birthday($triggers['birthday']) . '&ensp;' . trans('ai.yearsOld') .'</span></div>';
                    $col_2 .= '</div>';
                    $col_2 .= '<div style="' . $class . '" class="text-warning"><span style="margin-right: 0.5em;">' . trans('ai.wanted') . ':</span><span>' . $wanted . '</span></div>';
                    $col_2 .= '<div style="' . $class . '" class="text-danger"><span style="margin-right: 0.5em;">' . trans('ai.tag') . ':</span><span>' . $tagText . '</span></div>';
                }

                $access = trans('ai.fr');
                if ($event['rfid'] == 1) $access =  trans('ai.rfid') . '&ensp;<i class="fas fa-check-circle text-success"></i>';
                if ($event['rfid'] == 2) $access =  trans('ai.rfid') . '&ensp;<i class="fas fa-times-circle text-danger"></i>';

                $isFever = '';
                if ($event['fever'] == 1) $isFever =  '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.fever') . ':</span><span><button class="btn btn-sm btn-danger">&emsp;' . trans('ai.yes') . '&emsp;</button>' . '</span></div>';
                if ($event['fever'] == 2) $isFever =  '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.fever') . ':</span><span><button class="btn btn-sm btn-secondary">&emsp;' . trans('ai.no') . '&emsp;</button>' . '</span></div>';

                $liveness = '';
                if ($event['liveness'] == 1) $liveness =  '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.liveness') . ':</span><span><button class="btn btn-sm btn-success">&emsp;' . trans('ai.pass') . '&emsp;</button>' . '</span></div>';
                if ($event['liveness'] == 2) $liveness =  '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.liveness') . ':</span><span><button class="btn btn-sm btn-danger">&emsp;' . trans('ai.fail') . '&emsp;</button>' . '</span></div>';

                $col_3 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.accessType') . ':</span><span>' . $access . '</span></div>';
                $col_3 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.temperature') . ':</span><span style="margin-right: 1em;">' .  round($event['temperature'], 1) . '</span></div>';
                $col_3 .= $isFever;
                $col_3 .= $liveness;

                $manage = self::selection(false, $event['keep'], trans('dictionary.Preservation'), $vid, 'history-keep', false, '') . '&emsp;';
                $manage .= self::selection(false, $event['misjudged'], trans('va.misjudged'), $vid, 'history-misjudged', false, '');

                $html = '<div class="d-flex flex-row flex-wrap" style="padding: 10px 0;">';
                $html .= '<div class="col-12 col-sm-6 col-lg-3 d-flex justify-content-around align-content-around">' . $col_1 . $snap . '</div>';
                $html .= '<div class="col-12 col-sm-6 col-lg-3 d-flex flex-column justify-content-center" id="e_' . $vid . '" >' . $col_2. '</div>';
                $html .= '<div class="col-12 col-sm-6 col-lg-3 d-flex flex-column justify-content-center justify-content-lg-around" id="faceark_'. $vid .'">' . $col_3. '</div>';

                $html .= '<div class="col-12 col-sm-6 col-lg-3 d-flex flex-column justify-content-center justify-content-lg-around">';
                $html .= '<div style="' . $class . '"><span class="control-label" style="margin-right: 0.3em;">' . trans('ai.time') . ':</span><span id="lprtime_'.$vid.'" class="text-info" style="font-size: 0.8em;font-size: 0.8em;white-space:nowrap;"><a href="#" onclick="return false"  class="utc-time">' . $event['detectTime'] . '</a></span></div>';
                $html .= '<div style="' . $class . '"><span class="control-label" style="margin-right: 0.3em;">' . trans('ai.source') . ':&ensp;</span><span id="lprsource_'.$vid.'" class="text-info"><a href="#" onclick="return false">' .  $event['user']['id'] . '</a></span></div>';
                $html .= '<div class="d-flex flex-wrap align-content-center" style="margin-top: 0.8em"><span class="control-label" style="margin-right: 0.3em; font-size: 1.2em;">' . trans('ai.manage') . ':&ensp;</span>' . $manage . '</div>';
                $html .= '</div>';
                $html .= '</div>';

                array_push($rows, array(
                    "DT_RowId" => 'history' . $event['id'],
                    "selection" => $checkbox,
                    "body" => $html,
                ));
            }
            return ['origin' => $events, 'data' => $rows];
        } catch (ErrorException $e) {
            return response()->json(['error' => trans('api.failed_to_get_event_list')], 500);
        }
    }

    public static function human($man = [], $lazy = false)
    {
        Lang::setLocale(session('setLocale'));

        //todo: api need add file size
        /*if (is_array($man['feature'])) foreach ($man['feature'] as $id => $img) {
            //error_log($img['photoUrl']);
            $humans[$index]['feature'][$id]['size'] = self::sizeFromUrl($img['photoUrl']);
        }
        if (is_array($man['featureTask'])) foreach ($man['featureTask'] as $id => $img) {
            //error_log($img['photo']);
            $humans[$index]['featureTask'][$id]['size'] = self::sizeFromUrl($img['photo']);;
        }*/
        //error_log(json_encode($man));

        try {
            $age = self::birthday($man['birthday']);
            $snapshot = '/img/default.jpg';
            if (is_array($man['feature']) && count($man['feature'])) $snapshot = $man['feature'][0]['photoUrl'];

            $profile = '<div style="width: 160px"><img style="max-width: 100%; height: auto;" data-id="' . $man['id'] . '" class="db-profile" ' . ($lazy ? 'data-' : '') . 'src="' . $snapshot . '" onerror="this.src=\'/img/default.jpg\';"></div>';

            $wantedText = '';
            $tagText = '';

            if (is_array($man['wantedText'])) foreach ($man['wantedText'] as $record) $wantedText .= $record . '&ensp;';
            if (is_array($man['tagText'])) foreach ($man['tagText'] as $record) $tagText .= $record . '&ensp;';

            $item0 = '<div class="align-self-center" style="padding: 0 15px">' . self::selection(true, false, '', $man['id'], 'selection', false) . '</div>';
            $item1 = '<div class="align-self-center">' . $profile . '</div>';
            $item2 = '
                <div style="padding: 0 10px">
                    <div class="align-self-center">
                        <span class="form-control" style="background-color: transparent; border: transparent; font-weight: 500; display: inline; font-size: 1.2em">' . $man['name'] . '</span>
                    </div>
                    <div class="align-self-center form-control" style="background-color: transparent; border: transparent;font-size: 1.2em">
                        <span>' . $age . '</span> ' . trans('ai.yearsOld') . ',&ensp;<span>' . self::gender($man['gender']) . '</span>,&ensp;
                        <span>' . $man['job'] . '</span>' . '
                    </div>
                    <div class="align-self-center form-control text-danger" style="background-color: transparent; border: transparent;font-size: 1.2em">' . $wantedText . '</div>
                    <div class="align-self-center form-control text-warning" style="background-color: transparent; border: transparent;font-size: 1.2em">' . $tagText . '</div>
                    <div class="align-self-center form-control text-muted" style="background-color: transparent; border: transparent;font-size: 1em">
                        <i class="far fa-edit utc-time"> ' . $man['updateTime'] . '</i>
                    </div>
                </div>';

            $row = '<div class="d-flex flex-row">' . $item0 . $item1 . $item2 . '</div>';
        } catch (ErrorException $e) {
            $row = '';
            error_log($e);
        }
        return $row;
    }

    public static function humanList($humans = [])
    {
        try {
            $rows = [];
            foreach ($humans as $index => $man) {

                array_push($rows, array(
                    "DT_RowId" => 'human' . $man['id'],
                    'man' => self::human($man, true)
                ));
            }
            return ['origin' => $humans, 'data' => $rows];
        } catch (\Exception $e) {
            return response()->json(['error' => trans('api.failed_to_get_suspects_list')], 500);
        }
    }

    public static function lprEvents($events = [],$tagList = [], $codebook = [])
    {
        Lang::setLocale(session('setLocale'));
        $class = 'background-color: transparent; border: transparent; font-size: 1.2em; line-height: 2em; min-width:10em;';
        $previous_id = 0;

        try {
            $rows = [];
            foreach ($events as $index => $event) {

                $vid = (int)$event['id'];
                $checkbox = self::selection(true, false, '', $vid, 'selection', false, '');

                $attr = ' ';
                foreach ($event['metadata'] as $plate) if ($plate['vehicleIndex'] == $event['vehicleIndex']) {
                    foreach (['x', 'y', 'w', 'h'] as $roi) $attr .= $roi . '="' . strval($plate[$roi]) . '" ';
                    break;
                }
                //GPS Info
                $lng = $event['longitude'];
                $lat = $event['latitude'];
                $next_id = (array_key_exists($index + 1, $events)) ? (int)$events[$index + 1]['id'] : '999999';

                $img = '<div><img style="border-radius: 4px; margin: 5px;" 
                            content="' . $event['snapshotUrl'] . '" 
                            id="event_' . $vid . '" 
                            class="img-origin" 
                            data-src="' . $event['photoUrl'] . '" 
                            data-lat="' . $lat . '" 
                            data-lng="' . $lng . '" 
                            data-previous="event_' . $previous_id . '" 
                            data-next="event_' . $next_id . '" 
                            data-keep="' . $event['keep'] . '"
                            data-misjudged="' . $event['misjudged'] . '"
                            width="120" 
                            height="160" 
                            onerror="this.src=\'/img/default.jpg\';" ' . $attr . 'data-time="' . $event['detectTime'] . '"' . '/></div>';
                $figcaption = '<div class="align-self-center"><h5>' .trans('ai.snapshot') .'</h5></div>';
                $previous_id = $vid;

                $col_1 = '<div class="d-flex flex-column justify-content-around align-content-around">' . $img . $figcaption . '</div>';
                $col_2 = '';

                if(count($event['triggered']) > 0){

                    $triggers = $event['triggered'][0];

                    $tagText =  '';
                    foreach ($triggers['tag'] as $record) {
                        foreach ($tagList as $tag){
                            if($record == $tag['id']) $tagText .= $tag['name'] . '&ensp;';
                        }
                    }

                    $licensePlate = '<button class="btn btn-sm btn-secondary">[&emsp;' . trans('ai.notFound') . '&emsp;]</button>';
                    if($triggers['licensePlate']) {
                        $licensePlate = '<button class="btn btn-sm btn-danger">[&emsp;' . $triggers['licensePlate'] . '&emsp;]</button>';
                    }

                    $snapshot = ($triggers['photoUrl'] == '') ? 'img/default.jpg' : $triggers['photoUrl'];
                    $snapshot = '<div><img style="border-radius: 4px; margin: 5px;" content="' . $snapshot . '" data-src="' . $snapshot . '" width="120"  height="160" onerror="this.src=\'/img/default.jpg\';"/></div>';
                    $figcaptions = '<div class="align-self-center"><h5>' .trans('ai.carInfo') .'</h5></div>';
                    $brand = ($triggers['brand'] > 0) ? $codebook['brand'][$triggers['brand']] : '';
                    $color = ($triggers['color'] > 0) ? $codebook['color'][$triggers['color']] : '';
                    $classification = ($triggers['classification'] > 0) ? $codebook['classification'][$triggers['classification']] : '';

                    $col_1 .= '<div class="d-flex flex-column justify-content-around align-content-around">' . $snapshot . $figcaptions . '</div>';

                    $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.results') . ':</span><span>' . $triggers['content'] . '</span></div>';
                    $col_2 .= '<div style="' . $class . '" class="d-flex align-content-center">' . trans('ai.compare') . ':&ensp;' . $licensePlate . '</div>';
                    $col_2 .= '<div class="d-flex justify-content-start flex-wrap">';
                        $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.brand') . ':</span><span>' . $brand . '</span></div>';
                        $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.color') . ':</span><span>' . $color . '</span></div>';
                        $col_2 .= '<div style="' . $class . '"><span style="margin-right: 0.5em;">' . trans('ai.classification') . ':</span><span>' . $classification . '</span></div>';
                    $col_2 .= '</div>';
                    $col_2 .= '<div style="' . $class . '" class="text-danger"><span style="margin-right: 0.5em;">' . trans('ai.tag') . ':</span><span>' . $tagText . '</span></div>';
                }

                $manage = self::selection(false, $event['keep'], trans('dictionary.Preservation'), $vid, 'history-keep', false, '') . '&emsp;';
                $manage .= self::selection(false, $event['misjudged'], trans('va.misjudged'), $vid, 'history-misjudged', false, '');

                $html = '<div class="d-flex flex-row flex-wrap" style="padding: 10px 0;">';
                $html .= '<div class="col-12 col-sm-3 d-flex justify-content-around flex-wrap align-content-around">' . $col_1 . '</div>';
                $html .= '<div id="e_' . $vid . '" class="col-12 col-sm-5 d-flex flex-column justify-content-center">' . $col_2. '</div>';

                $html .= '<div class="col-12 col-sm-4 d-flex flex-column justify-content-center justify-content-lg-around">';
                $html .= '<div style="' . $class . '"><span class="control-label" style="margin-right: 0.3em;">' . trans('ai.time') . ':</span><span id="lprtime_'.$vid.'" class="text-info" style="font-size: 0.8em;font-size: 0.8em;white-space:nowrap;"><a href="#" onclick="return false"  class="utc-time">' . $event['detectTime'] . '</a></span></div>';
                $html .= '<div style="' . $class . '"><span class="control-label" style="margin-right: 0.3em;">' . trans('ai.source') . ':&ensp;</span><span id="lprsource_'.$vid.'" class="text-info"><a href="#" onclick="return false">' .  $event['user']['id'] . '</a></span></div>';
                $html .= '<div class="d-flex flex-wrap align-content-center" style="margin-top: 0.8em"><span class="control-label" style="margin-right: 0.3em; font-size: 1.2em;">' . trans('ai.manage') . ':&ensp;</span>' . $manage . '</div>';
                $html .= '</div>';
                $html .= '</div>';

                array_push($rows, array(
                    "DT_RowId" => 'history' . $event['id'],
                    "selection" => $checkbox,
                    "body" => $html,
                ));
            }
            return ['origin' => $events, 'data' => $rows];
        } catch (\ErrorException $e) {
            return response()->json(['error' => trans('api.failed_to_get_event_list')], 500);
        }
    }

    public static function vehicle($codebooks = [], $tagList = [],$car = [], $lazy = false)
    {
        Lang::setLocale(session('setLocale'));

        try {
            $codebooks = json_decode($codebooks, true);

            $brand = $codebooks['brand'][$car['brand']];
            $color = $codebooks['color'][$car['color']];
            $classification = $codebooks['classification'][$car['classification']];

            if ($car['photoUrl'] != "") $snapshot= $car['photoUrl'];
            else $snapshot= '/img/default.jpg';

            $tagText = '';

            foreach ($car['tag'] as $record) {
                foreach ($tagList as $tag){
                    if($record == $tag['id'])
                        $tagText .= $tag['name'] . '&ensp;';
                }
            }

            $profile = '<div style="width: 160px"><img style="max-width: 100%; height: auto;" data-id="' . $car['id'] . '" class="db-profile" ' . ($lazy ? 'data-' : '') . 'src="' . $snapshot . '" onerror="this.src=\'/img/default.jpg\';"></div>';

            $item0 = '<div class="align-self-center" style="padding: 0 15px">' . self::selection(true, false, '', $car['id'], 'selection', false) . '</div>';
            $item1 = '<div class="align-self-center">' . $profile . '</div>';
            $item2 = '
                <div style="padding: 0 10px">
                    <div class="align-self-center">
                        <span class="form-control" style="background-color: transparent; border: transparent; font-weight: 500; display: inline; font-size: 1.2em">' . $car['licensePlate'] . '</span>
                    </div>
                    <div class="align-self-center form-control" style="background-color: transparent; border: transparent;font-size: 1.2em">
                        <span>' . $brand . '</span>,&ensp;
                        <span>' . $color . '</span>,&ensp;
                        <span>' . $classification . '</span>&ensp;
                        <span>' . $car['model'] . '</span>' .
                '</div>
                    <div class="align-self-center form-control text-danger" style="background-color: transparent; border: transparent;font-size: 1.2em">' .$tagText. '</div>
                    <div class="align-self-center form-control text-warning" style="background-color: transparent; border: transparent;font-size: 1.2em"><span style="color:darkorange">' .$car['note'] .'</span></div>
                    <div class="align-self-center form-control text-muted" style="background-color: transparent; border: transparent;font-size: 1em">
                        <i class="far fa-edit utc-time"> ' . $car['updateTime'] . '</i>
                    </div> 
                </div>';
            $row = '<div class="d-flex flex-row">' . $item0 . $item1 . $item2 . '</div>';
        } catch (\ErrorException $e) {
            $row = '';
        }
        return $row;
    }

    public static function vehicleList($vehicle = [],$tagList = [], $codebooks=[])
    {
        try {

            $rows = [];
            foreach ($vehicle as $index => $car) {
                array_push($rows, array(
                    "DT_RowId" => 'vehicle' . $car['id'],
                    'car' => self::vehicle($codebooks, $tagList, $car, true)
                ));
            }
            return ['origin' => $vehicle, 'data' => $rows];
        } catch (\Exception $e) {
            return response()->json(['error' => trans('api.failed_to_get_vehicle_list')], 500);
        }
    }

    public static function lprReports($events = [])
    {
        Lang::setLocale(session('setLocale'));
        try {
            $rows = [];
            foreach ($events as $index => $event) {
                $vid = (int)$index;
                $size = self::formatBytes($event['size'], 0, 1024);

                $html = '<div class="d-flex flex-wrap justify-content-between">';

                $html .= '<div class="d-flex flex-column justify-content-start col-12 col-sm-6 col-lg-4">';
                $html .= '<div><input type="text" class="form-control" value="' .$event['name'] . '" style="border: none; background-color: transparent; font-size: 1.4em; padding: 0" disabled></div>';
                $html .= '<div class=""><span>' . $event['query']['description'] . '</span></div>';
                $html .= '</div>';

                $html .= '<div class="col-12 col-sm-6 col-lg-3 align-self-center" style="font-size: 1.1em;"><i class="far fa-calendar-plus text-info">&ensp;</i><span class="utc-time">' . $event['query']['queryTime'] . '</span></div>';
                $html .= '<div class="col-12 col-sm-6 col-lg-2 align-self-center" style="font-size: 1.1em;"><i class="far fa-file-excel text-info"></i>&ensp;' . $size . '&ensp;('. $event['query']['total'] . '&ensp;' .  trans('ai.event_count') .')</div>';

                $html .= '<div class="d-flex justify-content-center col-12 col-sm-6 col-lg-3">';
                if($event['status'] > 0) $html .= '<div class="align-self-center"><button type="button" class="btn btn-primary" style="margin: 1em;" onclick="window.location.href=\'' . $event['url'] . '\'"><i class="fas fa-download"></i>&ensp;' . trans('dictionary.Download') . '</button></div>';
                else $html .= '<div class="align-self-center"><button type="button" class="btn btn-secondary" style="margin: 1em;" onclick="window.location.href=\'' . $event['url'] . '\'" disabled><i class="fas fa-download" disabled></i>&ensp;' . trans('dictionary.Download') . '</button></div>';
                $html .= '<div class="align-self-center"><button type="button" class="btn btn-danger report-delete" data-id="' .$event['name'] . '" style="margin: 1em;"><i class="fas fa-trash-alt"></i>&ensp;' . trans('dictionary.Delete') . '</button></div>';
                $html .= '</div>';

                $html .= '</div>';

                array_push($rows, array(
                    "DT_RowId" => 'reports_' . $vid,
                    "body" => $html,
                ));
            }
            $count = count($events);

            return ['origin' => $events, 'data' => $rows, 'recordsTotal' => $count, 'recordsFiltered' => $count, 'total' => $count,];
        } catch (\ErrorException $e) {

            return response()->json(['error' => trans('api.failed_to_get_reports_list')], 500);
        }
    }

    public static function orSnapshot($events = [])
    {
        Lang::setLocale(session('setLocale'));
        $class = 'background-color: transparent; border: transparent; font-size: 1.2em; line-height: 2em; min-width:10em;';
        $previous_id = 0;
        try {
            $rows = [];
            foreach ($events as $index => $event) {

                $vid = (int)$event['id'];
                $checkbox = self::selection(true, false, '', $vid, 'selection', false, '');

                //GPS Info
                $lng = $event['longitude'];
                $lat = $event['latitude'];
                $next_id = (array_key_exists($index + 1, $events)) ? (int)$events[$index + 1]['id'] : '999999';
                $video = ($event['videoUrl']) ? $event['videoUrl'] : '';

                $img = '<div><img  id="event_' . $vid . '" class="video-origin play-snapshot" 
                            data-src="' . $event['snapshotUrl'] . '" 
                            data-lat="' . $lat . '"  data-lng="' . $lng . '" 
                            data-previous="event_' . $previous_id . '" 
                            data-next="event_' . $next_id . '" 
                            data-keep="' . $event['keep'] . '"
                            data-misjudged="' . $event['misjudged'] . '"
                            data-video="' . $video  . '"
                            onerror="this.src=\'/img/default.jpg\';" data-time="' . $event['detectTime'] . '"' . '/></div>';
                $figcaption = '<div id="list_'.$vid.'" class="align-self-center" style="margin-top: 1em;"><h5>' .trans('ai.snapshot') .'</h5></div>';
                $previous_id = $vid;

                $count = []; $result = trans('ai.noResult');

                if(count($event['object']) > 0){
                    $objects = $event['object'];
                    $name =''; $x =''; $y =''; $w =''; $h ='';

                    foreach ($objects as $key => $object){
                        if (!array_key_exists($object['name'], $count)) $count[$object['name']] = 0;
                        $count[$object['name']] ++;

                        $name .= $object['name'] . '_';
                        $x .= $object['x'] . '_';
                        $y .= $object['y'] . '_';
                        $w .= $object['w'] . '_';
                        $h .= $object['h'] . '_';
                        $result = '';
                    }
                    $figcaption = '<div id="list_'.$vid.'" class="align-self-center" data-list="' . $name . '" data-x="' . $x . '" data-y="' . $y . '" data-w="' . $w . '" data-h="' . $h . '" ><h5>' .trans('ai.snapshot') .'</h5></div>';
                }

                $manage = self::selection(false, $event['keep'], trans('dictionary.Preservation'), $vid, 'history-keep', false, '') . '&emsp;';
                $manage .= self::selection(false, $event['misjudged'], trans('va.misjudged'), $vid, 'history-misjudged', false, '');
                foreach ($count as $key => $index) $result .= ($index > 1) ? (self::gen_button($key).'*'.$index.',&emsp;') : (self::gen_button($key).',&emsp;');

                $html = '<div class="d-flex flex-row flex-wrap" style="padding: 10px 0;">';

                $html .= '<div class="col-12 col-lg-3 d-flex justify-content-around flex-wrap align-content-center align-content-lg-a">';
                $html .= '<div class="d-flex flex-column justify-content-around align-content-around">' . $img . $figcaption . '</div>';
                $html .= '</div>';

                $html .= '<div id="e_' . $vid . '" class="col-12 col-lg-5 d-flex flex-column justify-content-center justify-content-lg-around"">';
                $html .= '<div><input type="text" id="ordpt_'.$vid.'" class="form-control" data-id="' . $vid . '" value="' . $event['description'] . '" style="border: none; background-color: transparent; font-size: 1.4em; padding: 0" disabled></div>';
                $html .= '<div style="min-height: 2em">' . '<div id="or_'.$vid.'">' . $result . '</div></div>';
                $html .= '<div style="height: 2em">' . '<div class="text-muted">' . $event['device']['info']['type'] . '</div></div>';
                $html .= '</div>';

                $html .= '<div class="col-12 col-lg-4 d-flex flex-column justify-content-center justify-content-lg-around">';
                $html .= '<div><span class="control-label" style="font-size: 1.2em; margin-right: 0.3em;">' . trans('ai.time') . ':</span><span id="lprtime_'.$vid.'" class="text-info" style="font-size: 1em;"><a href="#" onclick="return false"  class="utc-time">' . $event['detectTime'] . '</a></span></div>';
                $html .= '<div><span class="control-label" style="font-size: 1.2em; padding-right: 0.2em;">' . trans('ai.source') . ':&ensp;</span><span id="lprsource_'.$vid.'" class="text-info"><a href="#" onclick="return false">' .  $event['user']['id'] . '</a></span></div>';
                $html .= '<div class="d-flex flex-wrap align-content-center"><span class="control-label" style="font-size: 1.2em; padding-right: 0.2em;">' . trans('ai.manage') . ':&ensp;</span>' . $manage . '</div>';
                $html .= '</div>';

                $html .= '</div>';

                array_push($rows, array(
                    "DT_RowId" => 'history' . $event['id'],
                    "selection" => $checkbox,
                    "body" => $html
                ));
            }
            return ['origin' => $events, 'data' => $rows];
        } catch (\ErrorException $e) {
            return response()->json(['error' => trans('api.failed_to_get_event_list')], 500);
        }
    }
}