<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['filename', 'bytes', 'mime'];

    public function article() {
        return $this->belongsTo(Product::class);
    }

    public function getBytesAttribute($value) {
        return format_filesize($value);
    }

    public function getUrlAttribute() {
        return url('files/' . $this->filename);
    }

    public function format_filesize($bytes) {
        if (! is_numeric($bytes)) {
            return 'NaN';
        }

        $decr = 1024;
        $step = 0;
        $suffix = ['bytes', 'KB', 'MB'];

        while (($bytes / $decr) > 0.9) {
            $bytes = $bytes / $decr;
            $step ++;
        }

        return round($bytes, 2) . $suffix[$step];
    }
}
