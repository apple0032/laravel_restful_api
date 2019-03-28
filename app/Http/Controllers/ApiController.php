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
            ->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name' , 'district.name_tc as district_name_tc')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id')
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
            ->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name' , 'district.name_tc as district_name_tc')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id')
            ->where('station.id','=',$id)
            ->get();

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
            ->select('station.*','type.name as type_name','area.name_en as area_name_en', 'area.name_tc as area_name_tc','district.name_en as district_name' , 'district.name_tc as district_name_tc')
            ->leftJoin('type', 'station.type', '=', 'type.id')
            ->leftJoin('area', 'station.area_id', '=', 'area.id')
            ->leftJoin('district', 'station.district_id', '=', 'district.id');

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
                    $query->orwhereRaw("find_in_set($type,station.type)");
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

        //Execute query
        $station = $station->get();

        //Return result
        $result = array(
            'status' => 'success',
            'type' => 'Search stations by requested criteria',
            'total' => count($station),
            'station' => $station,
        );

       return response()->json([
           'result' => $result
       ]);

    }


    public function postStation(Request $request) {
        
        die('test github');

        $validator = Validator::make($request->all(), [
           'name' => 'required|string|unique:users|max:10',
           'role' => 'required|string|max:50',
       ]);
        
       if ($validator->fails()) {
            return $this->validator($validator->messages()->toArray());
       }

        $result = array(
            'status' => 'success',
            'type' => 'new post',
            'item' => array(
                'name' => $request->name,
                'role' => $request->role,
                'level' => 'master tier',
                'salary' => '50k/month',
            )
        );

       return response()->json([
           'result' => $result
       ]);
    }

    public function updateStation(Request $request, $id) {

        $result = array(
            'status' => 'success',
            'type' => 'update post',
            'item' => array(
                'id' => $id,
                'name' => $request->name,
                'role' => $request->role,
                'level' => 'master tier',
                'salary' => '50k/month',
            )
        );

       return response()->json([
           'result' => $result
       ]);
    }

    public function deleteStation($id) {

        $result = array(
            'status' => 'success',
            'type' => 'delete',
            'item' => array(
                'id'   => $id,
                'name' => 'ken',
            )
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
            'status' => '200',
            'error_message' => $data
        ],200);
    }

}
