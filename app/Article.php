<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //

    protected $fillable = ['title', 'body', 'published_at'];
    // như trên là bạn đã cho phép 3 trường trên sẽ được khai báo trong Mass Assignment, những trường khác mà
    // có sử dụng thì sẽ bị báo lỗi ngoại lệ như phía trên

    // Ví dụ ta thiết lập dùng date mutators cho thuộc tính published_at
    //protected $dates = ['published_at'];

    public function getTitleAttribute($value)
    {
        // đổi thành chữ hoa
        return mb_strtoupper($value);
    }

    public function setTitleAttribute($value)
    {
        // thay đổi thành chữ thường
        $this->attributes['title'] = mb_strtolower($value);
    }

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    } 

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

        // Thêm đoạn này
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
