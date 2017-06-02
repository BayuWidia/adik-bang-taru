<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      if(Request::is('kpa*')){
        ini_set('max_execution_time', 300);

        try {

          $client = new \GuzzleHttp\Client([ 'verify' => false ]);
          $res = $client->request('GET', 'https://localhost/presensi-tangkab/api/pegawai-adbt/$2y$10$izidkpMsietM5LLo2Qpw0e.7gQCB1mS0qI0.LGeNZa0FEPQAkDV72');
          $result = json_decode($res->getbody());

        } catch (RequestException $e) {

          if ($e->getResponse()->getStatusCode() == '400') {
                  dd("Got response 400");
          }
        } catch (\Exception $e) {

          $result = '';
        }

        if($result){
          $pegawaiApi = $result->pegawai;
        }else{
          $pegawaiApi = '';
        }

        view()->share('pegawaiApi', $pegawaiApi);
      }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
