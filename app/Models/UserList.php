<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'name',
        'surname',
        'mobile',
        'email',
        'bio',
        'jobtitle',
        'password'
    ];
}
