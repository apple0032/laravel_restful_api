<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Station;
use App\Type;
use App\Area;
use App\District;
use Validator;
use Session;
use DB;

class ApiController extends Controller
{

    public function getAllStation() {

        $station = DB::table('station')
            //->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name' , 'district.name_tc as district_name_tc')
            ->select('station.id','station.location_en','station.lat', 'station.lng')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id')
            ->where('station.is_delete','=','0')
            ->where('station.is_active','=','1')
            //->where('station.id','=','1')
            ->get();

        $result = array(
            'status' => 'success',
            'type' => 'Get all stations',
            'total' => count($station),
            'station' => $station,
        );

       return response()->json([
           'result' => $result
       ]);

    }


    public function getStation($id) {

        $station = DB::table('station')
            ->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name_en' , 'district.name_tc as district_name_tc','users.name as username')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id')
            ->leftJoin('users','station.provider_user_id', '=' , 'users.id')
            ->where('station.id','=',$id)
            ->first();

        $result = array(
            'status' => 'success',
            'type' => 'Get specific station by id',
            'station' => $station,
        );

       return response()->json([
           'result' => $result
       ]);

    }


    public function getSearchStation(Request $request) {

        //Join Table
        $station = DB::table('station')
            ->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name_en' , 'district.name_tc as district_name_tc' ,'users.name as username')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id')
            ->leftJoin('users','station.provider_user_id', '=' , 'users.id');

        //Search condition
        if ($request->name != null) {
            $name = $request->name;
            $station->where(function ($query) use ($name) {
                $query->orWhere('station.location_en', 'like', '%' . $name . '%');
                $query->orWhere('station.location_tc', 'like', '%' . $name . '%');
            });
        }

        if ($request->type != null) {
            $types = explode(',',$request->type);

            $station->where(function ($query) use ($types) {
                foreach ($types as $type) {
                    if($type != ''){
                        $query->orwhereRaw("find_in_set($type,station.type)");
                    }
                }
            });
        }

        if ($request->area_id != null) {
            $station = $station->where('station.area_id','=', $request->area_id);
        }        

        if ($request->district_id != null) {
            $station = $station->where('station.district_id','=', $request->district_id);
        }

        if ($request->address != null) {
            $address = $request->address;
            $station->where(function ($query) use ($address) {
                $query->orWhere('station.address_en', 'like', '%' . $address . '%');
                $query->orWhere('station.address_tc', 'like', '%' . $address . '%');
            });
        }

        $station = $station->where('station.is_active','=','1');
        $station = $station->where('station.is_delete','=','0');

        $c_station = $station->get();   //count total station without offset & limit

        if ($request->limit != null) {
            $station = $station->limit($request->limit);
        }
        if ($request->offset != null) {
            $station = $station->offset($request->offset);
        }

        //Execute query
        $station = $station->orderBy('id','desc')->get();

        //Return result
        $result = array(
            'status' => 'success',
            'type' => 'Search stations by requested criteria',
            'total' => count($c_station),
            'display' => count($station),
            'station' => $station,
        );

       return response()->json([
           'result' => $result
       ]);

    }


    public function postStation(Request $request) {

        $validator = Validator::make($request->all(), [
           //'location_en' => 'required|string|unique:station|max:50',
            'location_en' => 'required|string|max:50',
            'location_tc' => 'required|string|max:50',
            'lat' => 'required|string|max:30',
            'lng' => 'required|string|max:30',
            'type' => 'required|string|max:10',
            'district_id' => 'required|integer|max:30',
            'address_en' => 'required|string|max:250',
            'address_tc' => 'required|string|max:250',
            //'provider_user_id' => 'required|integer|max:20',
       ]);
        
       if ($validator->fails()) {
            return $this->validator($validator->messages()->toArray());
       }

       $station = new Station();
       $station->location_en = $request->location_en;
       $station->location_tc = $request->location_tc;
       $station->lat = $request->lat;
       $station->lng = $request->lng;
       $station->type = $request->type;
       $station->district_id = $request->district_id;
       $station->address_en = $request->address_en;
       $station->address_tc = $request->address_tc;
       $district = District::select('area_id')->where('id','=',$request->district_id)->first();
       $station->area_id = $district->area_id;
       $station->provider = null;
       $station->provider_user_id = $request->provider_user_id;
       $station->parkingNo = $request->parkingNo;
       $station->img = $request->img;
       $station->is_active = 1;
       $station->is_delete = 0;
       $station->save();

        $result = array(
            'status' => 'success',
            'type' => 'New station created',
            'station' => $station
        );

        /* Params example
            location_en:Temple Chinese
            location_tc:中文
            lat:22.4504833221436
            lng:114.160835266113
            type:1,2
            district_id:15
            address_en:Ygate
            address_tc:歪基
            provider_user_id:1
            parkingNo:
            img:/test.png
        */

       return response()->json([
           'result' => $result
       ]);
    }

    public function updateStation(Request $request, $id) {

        $station = Station::where('id','=',$id)->first();
        foreach ($request->all() as $k => $updates){
            $station->$k = $updates;
            if($k == 'district_id'){
                $area_id = District::select('area_id')->where('id','=',$updates)->first();
                $station->area_id = $area_id->area_id;
            }
        }

        $station->save();

        $result = array(
            'status' => 'success',
            'type' => 'Update station',
            'station' => $station,
        );

       return response()->json([
           'result' => $result
       ]);
    }

    public function deleteStation($id) {

        $station = Station::where('id','=',$id)->first();
        //$station->is_delete = 1;
        //$station->save();
        $deleted_station = $station;
        $station->delete();

        $result = array(
            'status' => 'success',
            'type' => 'Delete station',
            'station' => $deleted_station,
        );

       return response()->json([
           'result' => $result
       ]);
    }

    protected function validator(array $data)
    {
        //print_r($data);die();
        return response()->json([
            'result' => 'error',
            'status' => '400',
            'error_message' => $data
        ],200);
    }

}
