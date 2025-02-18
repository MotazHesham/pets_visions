<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAffiliationAnalyticRequest;
use App\Models\AffiliationAnalytic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AffiliationAnalyticsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('affiliation_analytic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AffiliationAnalytic::with(['user'])->select(sprintf('%s.*', (new AffiliationAnalytic)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'affiliation_analytic_show';
                $editGate      = 'affiliation_analytic_edit';
                $deleteGate    = 'affiliation_analytic_delete';
                $crudRoutePart = 'affiliation-analytics';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('model_type', function ($row) {
                return $row->model_type ? AffiliationAnalytic::MODEL_TYPE_SELECT[$row->model_type] : '';
            });
            $table->editColumn('model_id', function ($row) {
                return $row->model_id ? $row->model_id : '';
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : '';
            });
            $table->editColumn('num_of_clicks', function ($row) {
                return $row->num_of_clicks ? $row->num_of_clicks : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.affiliationAnalytics.index');
    }

    public function show(AffiliationAnalytic $affiliationAnalytic)
    {
        abort_if(Gate::denies('affiliation_analytic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliationAnalytic->load('user');

        return view('admin.affiliationAnalytics.show', compact('affiliationAnalytic'));
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
