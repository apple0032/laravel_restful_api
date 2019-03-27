<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Station;
use App\Type;
use App\Area;
use App\District;
use Mail;
use Session;
use Schema;

class PagesController extends Controller {

	public function getIndex() {

		$posts = 'null';

		return view('pages.welcome')
		->withPosts($posts);
	}

	public function getXMLdata_en(){
        $xml_string = file_get_contents('https://opendata.clp.com.hk/GetChargingSectionXML.aspx?lang=EN');
        $xml = simplexml_load_string($xml_string);
       return $xml;
	}

	public function getXMLdata_tc(){
        $xml_string = file_get_contents('https://opendata.clp.com.hk/GetChargingSectionXML.aspx?lang=TC');
        $xml = simplexml_load_string($xml_string);
       return $xml;
	}

    public function ConvertXMLStoreDB(){

    	$xml_en = $this->getXMLdata_en();
        $json_en = json_encode($xml_en);
        $array_en = json_decode($json_en,true);

    	$xml_tc = $this->getXMLdata_tc();
        $json_tc = json_encode($xml_tc);
        $array_tc = json_decode($json_tc,true);

        //print_r($array_tc['areaList']['area']);die();

        //Create Area table & store data
        $this->createAreaList($array_en['areaList']['area'],$array_tc['areaList']['area']);
		//Create table before stored in db
        $this->createUsualTables();
        
    	foreach ($array_en['stationList']['station'] as $k => $station) {
	        $stat = new Station();
	        $stat->id = $station['no'];
	        $stat->location_en = $array_en['stationList']['station'][$k]['location'];
	        $stat->location_tc = $array_tc['stationList']['station'][$k]['location'];
	        $stat->lat = $station['lat'];
	        $stat->lng = $station['lng'];

			$types = explode(';',$station['type']);

			$type_str = '';
			foreach ($types as $k2 => $type) {
				$type_id = Type::select('id')->where('name','=',$type)->first();
				$type_str .= $type_id->id.',';
			}

			$stat->type = substr($type_str, 0, -1);

			$area_id = Area::select('id')->where('name_en','=',$station['districtL'])->first();
			$stat->area_id = $area_id->id;

			$district_id = District::select('id')->where('name_en','=',$station['districtS'])->first();
			$stat->district_id = $district_id->id;

	        $stat->address_en = $array_en['stationList']['station'][$k]['address'];
	        $stat->address_tc = $array_tc['stationList']['station'][$k]['address'];
	        $stat->provider = $station['provider'];
	        $stat->provider_user_id = null;
	        if(!is_array($station['parkingNo']) && $station['parkingNo'] != null){
	        	$stat->parkingNo = $station['parkingNo'];
	    	} else {
	    		$stat->parkingNo = null;
	    	}
	    	if(!is_array($station['img']) && $station['img'] != null){
	        	$stat->img = $station['img'];
	    	} else {
	    		$stat->img = null;
	    	}
	        $stat->is_active = 1;
	        $stat->is_delete = 0;

	        $stat->save();
    	}

       return response()->json([
           'result' => 'success'
       ]);
        //print_r($array_tc['stationList']['station']);die();
    }

    public function createUsualTables(){

    	//Create `station` table
		Schema::create('station', function($table)
		{
		    $table->increments('id');
		    $table->string('location_en');
		    $table->string('location_tc');
		    $table->string('lat');
		    $table->string('lng');
	    	$table->string('type');
	    	$table->string('area_id');
	    	$table->string('district_id');
	    	$table->string('address_en');
	    	$table->string('address_tc');
	    	$table->string('provider')->nullable();
	    	$table->integer('provider_user_id')->nullable();
	    	$table->string('parkingNo')->nullable();
	    	$table->string('img')->nullable();
	    	$table->integer('is_active');
	    	$table->integer('is_delete');
	    	$table->dateTime('created_at');
	    	$table->dateTime('updated_at');
		});

		//Create `Type` table
		Schema::create('type', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
	    	$table->integer('is_active');
	    	$table->integer('is_delete');
	    	$table->dateTime('created_at');
	    	$table->dateTime('updated_at');
		});

		//Insert type data into `Type`
		$station_type = array('Standard','Quick','SemiQuick');

		foreach ($station_type as $type) {
			$ty = new Type();
			$ty->name = $type;
			$ty->is_active = 1;
			$ty->is_delete = 1;
			$ty->save();
		}

    }

    public function createAreaList($area_en, $area_tc){
    	//print_r($area_tc);die();

		//Create `Area` table
		Schema::create('area', function($table)
		{
		    $table->increments('id');
		    $table->string('name_en');
		    $table->string('name_tc');
	    	$table->integer('is_active');
	    	$table->dateTime('created_at');
	    	$table->dateTime('updated_at');
		});

		//Create `District` table
		Schema::create('district', function($table)
		{
		    $table->increments('id');
		    $table->string('area_id');
		    $table->string('name_en');
		    $table->string('name_tc');
	    	$table->integer('is_active');
	    	$table->dateTime('created_at');
	    	$table->dateTime('updated_at');
		});

		foreach ($area_en as $k => $area) {
			$ar = new Area();
			$ar->name_en = $area['name'];
			$ar->name_tc = $area_tc[$k]['name'];
			$ar->is_active = 1;
			$ar->save();

			//Get $ar->id as district.area_id
			foreach ($area['districtList']['district'] as $k2 => $district) {
				$dis = new District();
				$dis->area_id = $ar->id;
				if(is_array($district)){
					$dis->name_en = $district['name'];
					$dis->name_tc = $area_tc[$k]['districtList']['district'][$k2]['name'];
				} else {
					$dis->name_en = $district;
					$dis->name_tc = $area_tc[$k]['districtList']['district']['name'];
				}
				$dis->is_active = 1;
				$dis->save();
			}
		}

    }

}