<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\MetricHistoryRun;
use App\Models\Category;
use App\Models\Strategy;

class MetricController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $strategies = Strategy::all();
        return view('content.run_metric', compact('categories', 'strategies'));
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
                'categories' => $data['lighthouseResult']['categories']])->render();

            return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $strategyId = Strategy::where('name', $request->input('strategy_id'))->value('id');

        $request->validate([
            'url' => 'required|url',
            'accessibility_metric' => 'nullable|numeric',
            'pwa_metric' => 'nullable|numeric',
            'performance_metric' => 'nullable|numeric',
            'seo_metric' => 'nullable|numeric',
            'best_practices_metric' => 'nullable|numeric',
            'strategy_id' => 'required|exists:strategies,id',
        ]);

        $metricHistoryRun = MetricHistoryRun::create([
            'url' => $request->input('url'),
            'accessibility_metric' => $request->input('accessibility_metric'),
            'pwa_metric' => $request->input('pwa_metric'),
            'performance_metric' => $request->input('performance_metric'),
            'seo_metric' => $request->input('seo_metric'),
            'best_practices_metric' => $request->input('best_practices_metric'),
            'strategy_id' => $request->input('strategy_id'),
        ]);

        return response()->json(['success' => true, 'data' => $metricHistoryRun]);
    }
}

