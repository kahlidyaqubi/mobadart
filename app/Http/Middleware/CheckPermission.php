<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        $type=\Auth::user()->the_type;

        if($type == 2){
            return redirect('/activist');
        }elseif($type == 1){

            $admin = \Auth::user()->admin;
            if (!$admin)
                return redirect('/');

            if ($admin != NULL) {
                //to delete prameter from route
                function delete_all_between($beginning, $end, $string) {
                    $beginningPos = strpos($string, $beginning);
                    $endPos = strpos($string, $end);
                    if ($beginningPos === false || $endPos === false) {
                        return $string;
                    }

                    $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

                    return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
                }
                $currentPath= Route::getFacadeRoot()->current()->uri();
                $url = "/".delete_all_between('/{', '}', $currentPath);

                $link = \DB::table("links")->where('link', $url)->first();
                //معناه انه الرابط عليه صلاحيات
                if ($link != NULL) {
                    $haveAdminThisLink = $admin->links->contains($link->id);
                    if (!$haveAdminThisLink) {
                        return redirect('/admin/noaccess');
                    }
                }
            }
        }

        return $next($request);
    }
}
