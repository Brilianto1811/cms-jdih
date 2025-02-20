<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\AgendaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AgendaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view agenda', only: ['index']),
            new Middleware('permission:edit agenda', only: ['edit']),
            new Middleware('permission:create agenda', only: ['create']),
            new Middleware('permission:delete agenda', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $agenda = Agenda::orderBy('tgl_agenda', 'ASC')->paginate(5);
    //     return view('agenda.list', [
    //         'agenda' => $agenda,
    //     ]);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $agenda = Agenda::orderBy('tgl_agenda', 'ASC')->get();

            return DataTables::of($agenda)
                ->addIndexColumn()
                ->addColumn('tgl_agenda', function ($row) {
                    return \Carbon\Carbon::parse($row->tanggal_kegiatan)
                        ->locale('id')->isoFormat('dddd, D MMMM YYYY');
                })
                ->addColumn('action', function ($item) {
                    return view('agenda.action', compact('item'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('agenda.list');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tgl_agenda' => 'required|date',
            'agenda_kegiatan.*.waktu_kegiatan' => 'required',
            'agenda_kegiatan.*.judul_kegiatan' => 'required|string|max:225',
            'agenda_kegiatan.*.deskripsi_kegiatan' => 'required|string',
        ], [
            'tgl_agenda.required' => 'Tanggal Agenda harus diisi.',
            'agenda_kegiatan.*.waktu_kegiatan.required' => 'Waktu kegiatan harus diisi.',
            // 'agenda_kegiatan.*.waktu_kegiatan.date_format' => 'Format waktu kegiatan harus HH:MM.',
            'agenda_kegiatan.*.judul_kegiatan.required' => 'Judul kegiatan harus diisi.',
            'agenda_kegiatan.*.deskripsi_kegiatan.required' => 'Deskripsi kegiatan harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $agenda = Agenda::create([
            'tgl_agenda' => $request->tgl_agenda,
        ]);

        // dd($request);

        if ($request->has('agenda_kegiatan')) {
            foreach ($request->agenda_kegiatan as $agenda_kegiatan) {
                AgendaKegiatan::create([
                    'agenda_id' => $agenda->id,
                    'waktu_kegiatan' => $agenda_kegiatan['waktu_kegiatan'],
                    'judul_kegiatan' => $agenda_kegiatan['judul_kegiatan'],
                    'deskripsi_kegiatan' => $agenda_kegiatan['deskripsi_kegiatan'],
                ]);
            }
        }

        return redirect()->route('agenda.list')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        // Load kegiatan dan urutkan berdasarkan waktu_kegiatan ASC
        $agenda->load(['agendaKegiatan' => function ($query) {
            $query->orderBy('waktu_kegiatan', 'ASC');
        }]);

        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        // Validasi data yang dikirimkan
        $validator = Validator::make($request->all(), [
            'tgl_agenda' => 'required|date',
            'agenda_kegiatan.*.waktu_kegiatan' => 'required',
            'agenda_kegiatan.*.judul_kegiatan' => 'required|string|max:255',
            'agenda_kegiatan.*.deskripsi_kegiatan' => 'required|string',
        ], [
            'tgl_agenda.required' => 'Tanggal Agenda harus diisi.',
            'agenda_kegiatan.*.waktu_kegiatan.required' => 'Waktu kegiatan harus diisi.',
            // 'agenda_kegiatan.*.waktu_kegiatan.date_format' => 'Format waktu kegiatan harus HH:MM.',
            'agenda_kegiatan.*.judul_kegiatan.required' => 'Judul kegiatan harus diisi.',
            'agenda_kegiatan.*.deskripsi_kegiatan.required' => 'Deskripsi kegiatan harus diisi.',
        ]);

        // Jika validasi gagal, redirect kembali dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update tanggal kegiatan
        $agenda->update(['tgl_agenda' => $request->tgl_agenda]);

        if ($request->has('agenda_kegiatan')) {
            // Ambil semua kegiatan yang terkait dengan agenda ini
            $existingKegiatan = AgendaKegiatan::where('agenda_id', $agenda->id)->get();

            // Proses setiap kegiatan yang dikirimkan
            foreach ($request->agenda_kegiatan as $index => $agenda_kegiatan) {
                // Jika kegiatan sudah ada di database, update saja
                if (isset($existingKegiatan[$index])) {
                    $existingKegiatan[$index]->update([
                        'waktu_kegiatan' => $agenda_kegiatan['waktu_kegiatan'],
                        'judul_kegiatan' => $agenda_kegiatan['judul_kegiatan'],
                        'deskripsi_kegiatan' => $agenda_kegiatan['deskripsi_kegiatan'],
                    ]);
                } else {
                    // Jika kegiatan tidak ada, buat baru
                    AgendaKegiatan::create([
                        'agenda_id' => $agenda->id,
                        'waktu_kegiatan' => $agenda_kegiatan['waktu_kegiatan'],
                        'judul_kegiatan' => $agenda_kegiatan['judul_kegiatan'],
                        'deskripsi_kegiatan' => $agenda_kegiatan['deskripsi_kegiatan'],
                    ]);
                }
            }

            // Hapus kegiatan yang tidak ada pada data yang baru
            $existingKegiatan->skip(count($request->agenda_kegiatan))->each->delete();
        }

        return redirect()->route('agenda.list')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $agenda = Agenda::find($id);

        if ($agenda == null) {
            session()->flash('error', 'agenda not found');
            return response()->json([
                'status' => false
            ]);
        }
        $agenda->delete();

        session()->flash('success', 'Artikel Berhasil Dihapus.');
        return response()->json([
            'status' => true
        ]);
    }
}
