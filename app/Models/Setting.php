<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key','value'];

    public static function set($name, $value=null)
    {
        self::updateOrInsert(['key'=>$name],['key'=>$name,'value'=>$value]);
        Config::set('key',$value);
        if(Config::get($name) == $value){
            return true;
        }
        return false;
    }

    public static function get($name)
    {
        $setting = new Setting();
        $entry = $setting->where('key',$name)->first();
        if (!$entry) {
            return;
        }
        return $entry->value;
    }
}
