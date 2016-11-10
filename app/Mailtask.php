<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Mailtask extends Model
{
    //
    protected $table = 'mailtask';
    public $timestamps = false;

    public function scopeUntouched($query)
    {
        return $query->where('status' , '=' , 0);
    }
    
    
    public function TouchMessage()
    {
        $this->thread_stamp = env('MAIL_TASK_THREAD_STAMP','');
        $this->status = 1;
        return $this->save();
    }

    public function scopeTouched($query)
    {
        return $query->where('status' , '=' , 1)->where('thread_stamp' , '=' , env('MAIL_TASK_THREAD_STAMP',''));
    }

    public function Send()
    {
        mail ( $this->email , $this->subject , $this->text  );
        $this->status = 2;
        $this->save();
    }
}
