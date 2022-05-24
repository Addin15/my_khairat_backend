<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    //get
    function getAnnouncements(Request $request) {
        $mosque = request('mosque_id');

        $response = Announcement::where('mosque_id', $mosque)->get();

        return response($response, 200);
    }

    //add
    function addAnnouncement(Request $request) {
        $mosque = request('mosque_id');

        $response = Announcement::create([
            'mosque_id' => $mosque,
            'announcement_title' => request('announcement_title'),
            'announcement_content' => request('announcement_content'),
            'announcement_img_url' => request('announcement_img_url'),
            'announcement_date' => request('announcement_date'),
        ]);

        return response($response, 201);
    }

    //edit
    function editAnnouncement(Request $request) {
        $id = request('id');

        $response = Announcement::where('id', $id)->update([
            'announcement_title' => request('announcement_title'),
            'announcement_content' => request('announcement_content'),
            'announcement_img_url' => request('announcement_img_url'),
        ]);

        return response($response, 200);
    }

    //delete
    function deleteAnnouncement(Request $request) {
        $id = request('id');

        $response = Announcement::where('id', $id)->delete();

        return response($response, 200);
    }
}