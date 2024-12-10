<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
   protected $fillable=['name', 'acc_no', 'ifsc_code', 'status'];
}
