<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    use HasFactory;

    protected $table= "collabs";
    protected $fillable= ['real_name',
    'channel_name',
    'channel_link',
    'tiktok_link',
    'subscriber',
    'whatsapp_number',
    'pubg_id',
    'user_id',
    'email'];
}
