<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\MetricHistoryRun;
use App\Models\Strategy;
use Yajra\DataTables\Facades\DataTables;

class MetricController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = MetricHistoryRun::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.metric_history');
    }

    public function getMetrics(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'categories' => 'required|array',
            'strategy' => 'required|string|in:MOBILE,DESKTOP',
        ]);

        $url = $request->input('url');
        $categories = $request->input('categories');
        $strategy = $request->input('strategy');

        $client = new Client();

        $categoriesString = implode('&category=', $categories);
        $final_url = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url={$url}&key=AIzaSyDCrPAzhzWxZbJxPYIEURODTvBFVVRNHbY&strategy={$strategy}&category={$categoriesString}";

        $response = $client->get($final_url);

        $data = json_decode($response->getBody(), true);

        $html = view('content.results_charts', [
            'categories' => $data['lighthouseResult']['categories']
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'url' => 'required|url',
            'accessibility_metric' => 'nullable|numeric',
            'pwa_metric' => 'nullable|numeric',
            'performance_metric' => 'nullable|numeric',
            'seo_metric' => 'nullable|numeric',
            'best_practices_metric' => 'nullable|numeric',
            'strategy' => 'required|exists:strategies,name',
        ]);

        $strategyId = Strategy::where('name', $request->input('strategy'))->value('id');

        $metricHistoryRun = new MetricHistoryRun();
        $metricHistoryRun->url = $request->input('url');
        $metricHistoryRun->accessibility_metric = $request->input('accessibility_metric');
        $metricHistoryRun->pwa_metric = $request->input('pwa_metric');
        $metricHistoryRun->performance_metric = $request->input('performance_metric');
        $metricHistoryRun->seo_metric = $request->input('seo_metric');
        $metricHistoryRun->best_practices_metric = $request->input('best_practices_metric');
        $metricHistoryRun->strategy_id = $strategyId;
        $metricHistoryRun->save();

        return response()->json(['success' => true, 'data' => $metricHistoryRun]);
    }
}
