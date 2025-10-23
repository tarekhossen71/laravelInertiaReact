<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SettingRequest;
use Inertia\Inertia;

class SettingController extends Controller
{
    use UploadAble;

    private function changeEnvData(array $data){
        if(count($data) > 0){
            $env = file_get_contents(base_path().'/.env');
            $env = preg_split('/\s+/',$env);

            foreach ($data as $key => $value) {
                foreach ($env as $env_key => $env_value) {
                    $entry = explode("=",$env_value,2);
                    if($entry[0] == $key){
                        $env[$env_key] = $key."=".$value;
                    }else{
                        $env[$env_key] = $env_value;
                    }
                }
            }

            $env = implode("\n",$env);

            file_put_contents(base_path().'/.env',$env);
            return true;
        }else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return Inertia::render('Settings/Index', [
            'settings' => $settings,
            'pageTitle' => 'Settings',
        ]);
    }

    public function storeOrUpdate(SettingRequest $request){
        if ($request->ajax()) {
            $collection = collect($request->validated());
            // dd($request->all());
            try {
                foreach ($collection->all() as $key => $value) {
                    Setting::set($key,$value);
                }
                return back()->with('success','Settings has been updated successfully');
            } catch (\Exception $e) {

                return back()->with('error','Something went wrong');
            }
        }
    }


}
