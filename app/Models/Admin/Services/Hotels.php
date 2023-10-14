<?php

namespace App\Models\Admin\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasUuids;
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name','location'];
}
