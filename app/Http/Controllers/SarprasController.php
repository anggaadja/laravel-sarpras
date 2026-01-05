<?php

namespace App\Http\Controllers;

use App\Models\Sarpras;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     * LIMIT: 7 DATA PER HALAMAN
     */
    public function index(Request $request)
    {
        // dd('Controller is working!'); 
        $query = Sarpras::query();
        
        // Handle search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('kode', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }
        
        // Handle filter kategori
        if ($request->has('filter_kategori') && $request->filter_kategori != '') {
            $query->where('kategori', $request->filter_kategori);
        }
        
        // Handle filter kondisi
        if ($request->has('filter_kondisi') && $request->filter_kondisi != '') {
            $query->where('kondisi', $request->filter_kondisi);
        }
        
        // Handle filter lokasi
        if ($request->has('filter_lokasi') && $request->filter_lokasi != '') {
            $query->where('lokasi', 'like', '%' . $request->filter_lokasi . '%');
        }
        
        // Get distinct values for filter options
        $kategoris = Sarpras::distinct()->pluck('kategori')->sort()->values();
        $lokasis = Sarpras::distinct()->pluck('lokasi')->sort()->values();
        
        // PAGINATION: 7 DATA PER HALAMAN
        $items = $query->paginate(7)->withQueryString();
        
        // Calculate stats
        $totalBarang = Sarpras::count();
        $totalBaik = Sarpras::where('hasil_rekondisi', 'Baik')->count();
        $totalPerbaikan = Sarpras::where('kondisi', 'Perbaikan')->count();
        $totalRusak = Sarpras::where('hasil_rekondisi', 'Dihanguskan')->count();

        return view('sarpras_v2', [
            'sarpras' => $items,
            'kategoris' => $kategoris,
            'lokasis' => $lokasis,
            'totalBarang' => $totalBarang,
            'totalBaik' => $totalBaik,
            'totalPerbaikan' => $totalPerbaikan,
            'totalRusak' => $totalRusak
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode'     => 'required|unique:sarpras,kode',
            'nama'     => 'required',
            'kategori' => 'required',
            'lokasi'   => 'required',
            'jumlah'   => 'required|integer|min:1',
            'kondisi'  => 'required|in:Baik,Perbaikan,Rusak',
            'tanggal'  => 'nullable|date',
            'tanggal_perbaikan'  => 'nullable|date',
            'hasil_rekondisi'    => 'nullable|string',
        ]);

        Sarpras::create($validated);
        return redirect()->route('sarpras.index')
                     ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sarpras = Sarpras::find($id);
        if (!$sarpras) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json($sarpras);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sarpras = Sarpras::findOrFail($id);
        
        $sarpras->kode = $request->input('kode');
        $sarpras->nama = $request->input('nama');
        $sarpras->kategori = $request->input('kategori');
        $sarpras->lokasi = $request->input('lokasi');
        $sarpras->jumlah = $request->input('jumlah');
        $sarpras->kondisi = $request->input('kondisi');
        $sarpras->tanggal = $request->input('tanggal');
        $sarpras->tanggal_perbaikan = $request->input('tanggal_perbaikan');
        $sarpras->hasil_rekondisi = $request->input('hasil_rekondisi');

        $sarpras->save();
        
        return redirect()->route('sarpras.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Sarpras $sarpras)
    {
        $sarpras->delete();
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Data berhasil dihapus']);
        }
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
