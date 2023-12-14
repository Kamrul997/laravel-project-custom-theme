<?php

namespace App\Service;


use DataTables;
use App\Repositories\UserRepository;
use App\Models\Unit;
use App\Models\SubUnit;
use App\Models\Area;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    // Constructor to bind model to repo
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return  $this->userRepository->all();
    }
    public function allAssociate(array $relation = [])
    {
        return  $this->userRepository->all($relation);
    }
    public function getAllData()
    {

        $data = $this->userRepository->all();

        $data = $data->where('email', '!=', 'platform.singularity@gmail.com');
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('administrative.user.edit', $row->id) . '" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </a>';
            })
            ->addColumn('unit_name', function ($data) {
                $data = Unit::where('id',$data->unit_id)->first();
                if(isset($data)){
                  return $data->name;
                }
                else{
                    return "";
                }
            })
            ->addColumn('sub_unit_name', function ($data) {
                $data = SubUnit::where('id',$data->sub_unit_id)->first();
                if(isset($data)){
                  return $data->name;
                }else{
                    return "";
                }
            })
            ->addColumn('area_name', function ($data) {
                $data = Area::where('id',$data->area_id)->first();
                if(isset($data)){
                  return $data->name;
                }
                else{
                    return "";
                }
            })
            ->addColumn('zone_name', function ($data) {
                $data = Zone::where('id',$data->zone_id)->first();
                if(isset($data)){
                  return $data->name;
                }else{
                    return "";
                }
            })
            ->addColumn('role', function ($data) {
                $html = '<span class="badge badge-primary">' . optional($data->roles->first())->name . '</span> ';
                return $html;
            })
            ->rawColumns(['action', 'role','unit_name','sub_unit_name'])
            ->blacklist(['created_at', 'updated_at', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function findbyId($id)
    {
        return $this->userRepository->show($id);
    }
    public function store($request)
    {
        return $this->userRepository->create($request->all());
    }
    public function update($id, $request)
    {
        return $this->userRepository->update($request->all(), $id);
    }
    public function findAssociate($id)
    {
        return $this->userRepository->findAssociate($id);
    }
    public function getUserByRoleFilter()
    {
        $relationFilter = ['roles' => [
            'filterColumn' => 'name',
            'filterCondition' => '=',
            'filterConditionValue' => 'Manager',
        ]];
        return $this->userRepository->allAssociateRelationFilter($relationFilter);
    }
    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }
}
