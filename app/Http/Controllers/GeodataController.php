<?php

namespace App\Http\Controllers;

use App\Models\Comune;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Regione;
use App\Models\Provincia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GeodataController extends Controller
{
    public function getRegioni() {
        if (Cache::has('/geodata/regioni')) {
            Log::info('risposta in cache');
            return JsonResource::make(Cache::get('/geodata/regioni'));
        } else {
            Log::info('risposta NON in cache');
            $regioni = Regione::all();

            Cache::set('/geodata/regioni', $regioni);
        
            return JsonResource::make($regioni);
        }
    }
    
    public function getProvince($regione_id) {
        $cache_key = '/geodata/province/' . $regione_id;

        if (Cache::has($cache_key)) {
            return JsonResource::make(Cache::get($cache_key));
        } else {
            $province = Provincia::where([
                'regione_id' => $regione_id,
            ])->get();

            Cache::set($cache_key, $province);
    
            return JsonResource::make($province);
        }
    }

    public function getComuni($provincia_id) {
        $cache_key = '/geodata/comuni/' . $provincia_id;

        if (Cache::has($cache_key)) {
            return JsonResource::make(cache()->get($cache_key));
        } else {
            $comuni = Comune::where([
                'provincia_id' => $provincia_id
            ])->get();

            cache()->set($cache_key, $comuni);
    
            return JsonResource::make($comuni);
        }
    }
}
