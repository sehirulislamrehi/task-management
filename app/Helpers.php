<?php

use App\Models\Backend\CommonModule\BusinessUnit;
use App\Models\Backend\UserModule\Module;
use App\Models\Backend\UserModule\User;

function can($can): bool|\Illuminate\Http\RedirectResponse
{
    if (auth('web')->check()) {
        if (!isset(auth('web')->user()->role->permission)) {
            return false;
        }
        foreach (auth('web')->user()->role->permission as $permission) {
            if ($permission->key == $can) {
                return true;
            }
        }
        return false;
    }
    return back();
}

//check user access permission function end

//unauthorized text start
function unauthorized(): string
{
    return response()->json("You are not authorized for this request");
}

//unauthorized text end

//mail from start
function mail_from(): string
{
    return "test@sehirulislamrehi.com";
}

function isAgent(): bool
{
    if (auth('web')->check()) {
        $user = User::findOrFail(auth('web')->user()->id);
        return $user->role_id == \App\Enum\UserGroupEnum::AGENT->value;
    }
    return false;
}


//mail from end

function mobileNumberValidate($mobile): string
{

    if (strlen($mobile) > 11) {
        $mobile = substr($mobile, -11);
    }
    return $mobile;
}

/**
 * Return the active class for styling for module if it's submodule is active
 *
 * @param Module $module
 * @param string $currentRouteName
 * @return string
 */
function get_sub_module(Module $module, string $currentRouteName): string
{
    $submodules = $module->sub_module()->pluck('route')->toArray();
    if (in_array($currentRouteName, $submodules)) {
        return 'active';
    } else {
        return '';
    }
}

function get_active_module(Module $module, $currentRouteName): string
{
    $submodules = $module->sub_module()->pluck('route')->toArray();
    if (in_array($currentRouteName, $submodules)) {
        return 'menu-open';
    } else {
        return '';
    }
}


function entity_folder_mapping(string $entity_name): ?string
{
    $entity_map = [
        'channel' => 'channel_logo'
    ];

    if (array_key_exists($entity_name, $entity_map)) {
        return $entity_map[$entity_name];
    }

    return null;
}

function get_base_path($file_name): string
{
    $folder_location = entity_folder_mapping('channel');
    return 'storage/' . $folder_location . '/' . $file_name;
}


function translateNumberToBengali($number): string
{
    $bengaliNumerals = [
        '০' => 0,
        '১' => 1,
        '২' => 2,
        '৩' => 3,
        '৪' => 4,
        '৫' => 5,
        '৬' => 6,
        '৭' => 7,
        '৮' => 8,
        '৯' => 9
    ];

    $numberStr = (string)$number;
    $bengaliNumber = '';

    for ($i = 0; $i < strlen($numberStr); $i++) {
        $digit = $numberStr[$i];
        if (isset($bengaliNumerals[$digit])) {
            $bengaliNumber .= $bengaliNumerals[$digit];
        } else {
            $bengaliNumber .= $digit;
        }
    }

    return $bengaliNumber;
}


function checkUserGroup(string $groupName): bool
{
    if (auth('web')->check()) {
        $currentUser = auth('web')->user();
        $userId = $currentUser->id ?? null;
        if (!is_null($userId)) {
            $userGroup = \App\Models\Backend\UserModule\User::find($userId)->user_group->name;
            if (strtolower($groupName) === strtolower($userGroup)) {
                return true;
            }
        }
        return false;
    }
    return false;
}


function entityFolderMapping($entityName): string|null
{
    $entity_folder_mapping = [
        'note' => 'notes',
    ];
    if (array_key_exists($entityName, $entity_folder_mapping)) {
        return $entity_folder_mapping[$entityName];
    }
    return null;
}


/**
 * To check if the admin is assigned to any business unit or not. if not get all business unit access
 * @return array
 */
function isAdminBusinessUnitAccess(): array
{
    $userId = auth("web")->user()->id;
    return \Illuminate\Support\Facades\DB::table("business_unit_user")
        ->where("user_id", $userId)
        ->pluck("business_unit_id")
        ->toArray();
}

/**
 * Check if the logged-in user unit have access to business units
 * @return mixed
 */
function getUserAssignedBusinessUnits(): mixed
{
    if (auth("web")->check()) {
        $userId = auth("web")->user()->id;
        $user = User::find($userId);
        if ($user->user_group->id = \App\Enum\UserGroupEnum::ADMIN->value && count(isAdminBusinessUnitAccess()) == 0) {
            return BusinessUnit::where('is_active', true)->get();
        } else {
            return $user->business_unit;
        }
    } else {
        return BusinessUnit::where('is_active', true)->get();
    }
}


/**
 * BU name need to modify in some cases
 * @return mixed
 */
function modifyBuName($business_unit_name): mixed
{
    if ($business_unit_name == "RFL-THA" || $business_unit_name == "RFL-RAC") {
        $business_unit_name = "RFL-REL";
    }
    return $business_unit_name;
}


function isUserBelongToBu($bu_id): bool
{
    if (auth('web')->check()) {
        $userId = auth('web')->user()->id;
        $hasAccess = \Illuminate\Support\Facades\DB::table('business_unit_user')
            ->where('user_id', $userId)
            ->where('business_unit_id', $bu_id)
            ->pluck("business_unit_id")
            ->toArray();
        if (count($hasAccess) == 0) {
            return true;
        }
        elseif(in_array($bu_id, $hasAccess)) {
            return true;
        }
        else{
            return false;
        }
    }
    return true;

}


function secondToHourMin($seconds){
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    
    $time = sprintf('%02d:%02d', $hours, $minutes);
    
    return $time;
}