<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::whereRaw(1);
        $contacts = $contacts->orderBy('id', 'DESC')->paginate(5);
        $viewData = [
            'contacts' => $contacts
        ];

        return view('admin::contact.index', $viewData);
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $contact = Contact::find($id);
            $message = '';
            switch ($action)
            {
                case 'active':
                    $contact->c_status = $contact->c_status ? 0 : 1;
                    $contact->save();
                    $message = 'Hoàn thành thay đổi trạng thái liên hệ';
                    break;
                case 'delete':
                    $contact->delete();
                    $message = 'Hoàn thành xóa liên hệ';
                    break;
            }
        }

        return redirect()->back()->with('success', $message);
    }
}
