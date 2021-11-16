<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $guarded = [];
    protected $table = 'sessions';

    /**
     * Get Browser Name
     *
     * @return string
     */
    public function browser_name($user_agent)
    {
        $t = strtolower($user_agent);
        $t = " " . $t;
        if (strpos($t, 'opera') || strpos($t, 'opr/')) return 'Opera';
        elseif (strpos($t, 'edg')) return 'Edge';
        elseif (strpos($t, 'chrome')) return 'Chrome';
        elseif (strpos($t, 'safari')) return 'Safari';
        elseif (strpos($t, 'firefox')) return 'Firefox';
        elseif (strpos($t, 'msie') || strpos($t, 'trident/7')) return 'Internet Explorer';
        return 'Unknown';
    }
}
