<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 17/8/29AD
 * Time: 18:29
 */

namespace app;

use Illuminate\Database\Eloquent\Model;

class TimeTracker extends Model {
    protected $table = 'time_tracks';
    protected $fillable = [
        'time',
        'description',
        'task_time',
    ];
}