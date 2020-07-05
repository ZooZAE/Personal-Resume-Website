<?php


namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Certificate;

class CertificateController extends Controller
{
    
    public function index()
    {
        $certificates = Certificate::paginate(5);
        return view('manage.certificate.index')->with('certificates', $certificates);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $education = Certificate::create([
            'title' => $request->title,
            'description' => $request->description,
            'from' => $request->from,
            'to' => $request->to,
            ]);

        return redirect()->route('manage.certificate.index');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $certificate->title = $request->title;
        $certificate->description = $request->description;
        $certificate->from = $request->from;
        $certificate->to = $request->to;
            
        $certificate->save();
        return redirect()->route('manage.certificate.index');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('manage.certificate.index');
    }
}
