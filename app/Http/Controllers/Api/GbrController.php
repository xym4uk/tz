<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gbr;
use Illuminate\Http\Request;

class GbrController extends Controller {
    public function getGroups() {
        return response()->json([
                                    'success'  => true,
                                    'response' => ['groups' => Gbr::all()],
                                    'error'    => null,
                                    'message'  => ''
                                ]);
    }

    public function addGroup(Request $request) {
        $groupId     = $request->input('Group_id');
        $description = $request->input('Description');
        $category    = $request->input('category');
        $statusId    = $request->input('status_id');
        $reason      = $request->input('reason');

        Gbr::create(
            [
                'Group_id'    => $groupId,
                'TableID'     => $groupId,
                'Description' => $description,
                'category'    => $category,
                'status_id'   => $statusId,
                'reason'      => $reason
            ]);

        return response()->json(['success' => true, 'response' => null, 'error' => null, 'message' => '']);
    }

    public function editGroup(Request $request) {
        $groupId     = $request->input('Group_id');
        $description = $request->input('Description');
        $category    = $request->input('category');
        $statusId    = $request->input('status_id');
        $reason      = $request->input('reason');

        Gbr::where('Group_id', '=', $groupId)->update(
            [
                'Group_id'    => $groupId,
                'TableID'     => $groupId,
                'Description' => $description,
                'category'    => $category,
                'status_id'   => $statusId,
                'reason'      => $reason
            ]);
        return response()->json(['success' => true, 'response' => null, 'error' => null, 'message' => '']);
    }

    public function deleteGroup(Request $request){
        $groupId = $request->input('Group_id');
        $gbr = Gbr::where('Group_id', '=', $groupId)->first();
        $gbr->delete();
        return response()->json(['success' => true, 'response' => null, 'error' => null, 'message' => '']);
    }
}
