<?php

namespace App\Providers;

use App\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
          'file.index',
          'matakuliah_list.jarkom',
          'matakuliah_list.sbd',
          'matakuliah_list.pv',
          'matakuliah_list.pbo',
          'matakuliah_list.pc',
          'matakuliah_list.tekan',
          'matakuliah_list.simpel',
          'matakuliah_list.rpw'
        ], function($view){
          $view->with('files', File::all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
