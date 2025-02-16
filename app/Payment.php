<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['public_company_id', 'special_company_id', 'manager_id', 'amount'];
    //get payment for every special company for model
    public static function spePay($id) {
        return Payment::select('notification_id','amount','state','created_at')->where('special_company_id',$id)->get();
    }
    public static function pubPay($id,$pub_com_id) {
        return Payment::select('notification_id','amount','state','created_at')->where('public_company_id',$id)->where('manager_id',$pub_com_id)->get();
    }
}
