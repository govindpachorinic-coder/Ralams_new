<?php
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\ForwardToRoles;

if (!function_exists('getRolesByCurrentRole')) {
    function getRolesByCurrentRole($current_role)
    {
        $dropdownroles = array();
        $location_type = '';
        $location_id = '';
        if($current_role == 'DA'){
            $user = Auth::user();
            switch ($user->parent_role) {
                case 'DM':
                    $location_type = "district_id";
                    $location_id = $user->district_id;
                    break;
                case 'Patwari':
                    $location_type = "village_id";
                    $location_id = $user->village_id;
                    break;                          
                default:
                    $location_type = "block";
                    $location_id = $user->block;
            }
            $dropdownroles = User::select('user_type as forward_to')->where(['user_type'=> $user->parent_role, $location_type=>$location_id]);
            if($user->parent_role == 'DM'){
                $dropdownroles = $dropdownroles->orWhere('user_type','IRA');
            }
            $dropdownroles = $dropdownroles->get();
        }else{
            $dropdownroles = ForwardToRoles::where('user_type',$current_role)->get();
        }        
        
        return $dropdownroles;
    }
}

if ( !function_exists( 'log_activity' ) ) {
    function log_activity( $activity, $activity_details = null ) {
        ActivityLog::create( [
            'sso_id' => null,
            'ralams_id'  =>null,
            'user_id'    => auth()->id(),
            'user_type'  => auth()->user()->user_type,
            'ip_address' => request()->ip(),
            'activity'     => $activity,
            'activity_details'=> $activity_details
        ] );
    }
}