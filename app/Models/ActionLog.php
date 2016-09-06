<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class ActionLog extends Model
{
    use ActionAttributeTrait;
    protected $table = 'action_log';

    protected $fillable = ['uid','type','username','url','description','ip'];


    private $action;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->action = config('admin.global.actionlog.action');
    }

}
