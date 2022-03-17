<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Log extends Model
{

    protected $table = 'logs';
    protected $guarded = array();

    function addToLog($subject, $queryRequest, $queryType)
    {
        if($queryRequest != NULL){
            $queryRequest = json_encode($queryRequest);
        }

        $log = [];
        $log['subject'] = $subject;
        $log['query_request'] = $queryRequest;
        $log['query_type'] = $queryType;
        $log['url'] = request()->fullUrl();
        $log['method'] = request()->method();
        $log['ip'] = request()->ip();
        $log['agent'] = request()->header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 0;

        static::create($log);

        return true;
    }

    /**
     * Get the users that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
