<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LobbyVideo extends Model
{
    use HasFactory;
    protected $table= "lobby_videos";
    protected $fillable = ['real_name','user_id','pubg_id','ingame_name','whatsapp_number'];
}
