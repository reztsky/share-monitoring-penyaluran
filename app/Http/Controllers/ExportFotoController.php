<?php

namespace App\Http\Controllers;

use App\Services\Export\ExportFotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportFotoController extends Controller
{
    private $path = "export.";

    public function index($kategori)
    {
        return view("{$this->path}index",compact('kategori'));
    }

    public function export(Request $request, ExportFotoService $exportFotoService)
    {
        $validated = $request->validate([
            'limit' => 'required|numeric|min:1',
            'offset' => 'required|numeric',
            'kategori'=>'required',
        ]);

        $export = $exportFotoService->export($validated);

        if (!$export['status']) {
            return redirect()->route('exportfoto.index',$validated['kategori'])->with('notifikasi', $export['message']);
        }

        return (file_exists($export['data']['path'])) ?
            response()->download($export['data']['path']) :
            redirect()->route('exportfoto.index',$validated['kategori'])->with('notifikasi', 'No File Download');
    }
}
