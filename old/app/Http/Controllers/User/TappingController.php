<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\TappingLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TappingController extends Controller
{
    public function datatable(Request $request)
    {
            $data = TappingLog::orderBy('id', 'desc');
        if(Auth::guard('web')->check()){
            $data->where('user_id',Auth::guard('web')->id());
        }
        if($request->card_id){
               $data->where('card_id',$request->card_id);
            }


            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = '';
                    $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                    </div>';
                    return $checkbox;
                })
                ->addColumn('os', function ($row) {
                    $os_platform='';
                    $os_array     = array(
                        '/windows nt 10/i'      =>  'Windows 10',
                        '/windows nt 6.3/i'     =>  'Windows 8.1',
                        '/windows nt 6.2/i'     =>  'Windows 8',
                        '/windows nt 6.1/i'     =>  'Windows 7',
                        '/windows nt 6.0/i'     =>  'Windows Vista',
                        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                        '/windows nt 5.1/i'     =>  'Windows XP',
                        '/windows xp/i'         =>  'Windows XP',
                        '/windows nt 5.0/i'     =>  'Windows 2000',
                        '/windows me/i'         =>  'Windows ME',
                        '/win98/i'              =>  'Windows 98',
                        '/win95/i'              =>  'Windows 95',
                        '/win16/i'              =>  'Windows 3.11',
                        '/macintosh|mac os x/i' =>  'Mac OS X',
                        '/mac_powerpc/i'        =>  'Mac OS 9',
                        '/linux/i'              =>  'Linux',
                        '/ubuntu/i'             =>  'Ubuntu',
                        '/iphone/i'             =>  'iPhone',
                        '/ipod/i'               =>  'iPod',
                        '/ipad/i'               =>  'iPad',
                        '/android/i'            =>  'Android',
                        '/blackberry/i'         =>  'BlackBerry',
                        '/webos/i'              =>  'Mobile'
                    );

                    foreach ($os_array as $regex => $value)
                        if (preg_match($regex, $row->device))
                            $os_platform = $value;

                    return $os_platform;
                })
                ->addColumn('browser', function ($row) {
                    $t = strtolower($row->device);
                    $t = " " . $t;
                    if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
                    elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
                    elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
                    elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
                    elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
                    elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';
                    return 'Unkown';;
                })
                ->editColumn('updated_at', function ($row) {
               return $row->updated_at->format('Y-m-d H:i');
                })

                ->rawColumns([ 'checkbox', 'name', 'is_active','user_id','profile_id'])
                ->make();

    }

}
