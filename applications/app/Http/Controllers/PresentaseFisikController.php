<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresentaseFisik;
use App\Models\ItemKegiatan;
use Session;

class PresentaseFisikController extends Controller
{
    public function storefisikkegiatan(Request $request)
    {
      if (!is_null($request->realisasi_fisik)) {
        $cekfisik = PresentaseFisik::where('id_item_kegiatan', $request->id_item)->get();
        if (count($cekfisik)==0) {
          $setfisik = new PresentaseFisik;
        } else {
          $setfisik = PresentaseFisik::where('id_item_kegiatan', $request->id_item)->first();
        }
        $setfisik->no_rekening_kegiatan = $request->no_rekening;
        $setfisik->nilai = $request->realisasi_fisik;
        $setfisik->id_item_kegiatan = $request->id_item;
        $setfisik->save();
      }

      if (!is_null($request->realisasi_anggaran)) {
        $setall = ItemKegiatan::where('no_rekening', $request->no_rekening)
          ->where('id_kegiatan', $request->id_kegiatan)
          ->where('nama_item_kegiatan', $request->nama_item)
          ->update(array('realisasi_anggaran'=>$request->realisasi_anggaran));
      }

      Session::flash('success', 'Berhasil input presentase realisasi fisik dan anggaran.');
      return redirect()->route('pencairan.proses', $request->id_kegiatan);
    }

    public function storefisikitem(Request $request)
    {
      $check = PresentaseFisik::where('id_item_kegiatan', $request->id_item_kegiatan)->get();
      if (count($check)==0) {
        $set = new PresentaseFisik;
      } else {
        $set = PresentaseFisik::where('id_item_kegiatan', $request->id_item_kegiatan)->first();
      }
      $set->id_item_kegiatan = $request->id_item_kegiatan;
      $set->nilai = $request->nilai;
      $set->save();

      Session::flash('success', 'Berhasil mengupdate presentase realisasi fisik.');
      return redirect()->route('pencairan.progressbyitem', $request->id_item_kegiatan);
    }

    public function bind($id)
    {
      $get = PresentaseFisik::find($id);
      return $get;
    }
}
