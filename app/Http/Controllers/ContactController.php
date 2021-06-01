<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function contact_store(Request $request)
    {
        $validator = $this->validate($request,[
            'contact_email' => 'required',
        ]);
        if (!$validator) {
            $success = 0;
            return back()->withErrors($validator)->withInput();
        }else{
            $data = array(
                'name' => $request->contact_name,
                'email' => $request->contact_email,
                'message' => $request->contact_message
            );
            $contact = Contact::create($data);
            if ($contact) {
                return redirect('/contact_us');
            }
        }
    }

    public function show()
    {
        $data['contacts'] = Contact::paginate(10);
        return view('admin.contact',$data);
    }

    public function destory($id)
    {
        $deleteId = Contact::findOrFail($id);
        if ($deleteId) {
            $deleteId->delete();
        }
        return redirect('/contact-show');
    }
}
