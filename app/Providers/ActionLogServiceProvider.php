<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ActionLogRepository;

class ActionLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $model = config("admin.actionlog");
		if($model){
			foreach($model as $k => $v) {
				
			$v::created(function($data){
                ActionLogRepository::createActionLog('create',json_encode($data));
				});

			$v::saved(function($data){
                ActionLogRepository::createActionLog('add/update',json_encode($data));
			});
			
			$v::deleted(function($data){
                ActionLogRepository::createActionLog('delete',json_encode($data));

			});
			
			}
		}
        

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("ActionLogRepository",function($app){
            return new \App\Repositories\admin\ActionLogRepository();
        });
    }
}
