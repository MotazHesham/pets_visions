<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAffiliationAnalyticRequest;
use App\Models\AffiliationAnalytic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AffiliationAnalyticsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('affiliation_analytic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliationAnalytics = AffiliationAnalytic::with(['user'])->get();

        return view('frontend.affiliationAnalytics.index', compact('affiliationAnalytics'));
    }

    public function show(AffiliationAnalytic $affiliationAnalytic)
    {
        abort_if(Gate::denies('affiliation_analytic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliationAnalytic->load('user');

        return view('frontend.affiliationAnalytics.show', compact('affiliationAnalytic'));
    }

    public function destroy(AffiliationAnalytic $affiliationAnalytic)
    {
        abort_if(Gate::denies('affiliation_analytic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliationAnalytic->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffiliationAnalyticRequest $request)
    {
        $affiliationAnalytics = AffiliationAnalytic::find(request('ids'));

        foreach ($affiliationAnalytics as $affiliationAnalytic) {
            $affiliationAnalytic->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
