<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactUsRequest;
use App\Models\ContactUs;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactUsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_us_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactUss = ContactUs::all();

        return view('frontend.contactUss.index', compact('contactUss'));
    }

    public function destroy(ContactUs $contactUs)
    {
        abort_if(Gate::denies('contact_us_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactUs->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactUsRequest $request)
    {
        $contactUss = ContactUs::find(request('ids'));

        foreach ($contactUss as $contactUs) {
            $contactUs->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
