<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class RequirementFormsController extends Controller
{
    public function create(Request $request) {
        $validate = $request->validate([
            'hadHepatitisB' =>  $request->input("hadHepatitisB"),
            'hadContactwithPatientHepatitisB'   =>  $request->input("hadHepatitisB"),
            'hadBloodTransfusion'   =>  $request->input("hadHepatitisB"),
            'gotPiercedOrTatto' =>  $request->input("gotPiercedOrTatto"),
            'hadTeethOperation' =>  $request->input("hadTeethOperation"),
            'hadSmallOperation' =>  $request->input("hadSmallOperation"),
            'beenYearafterSmallOperation'   =>  $request->input("beenYearafterSmallOperation"),
            'withinaDayafterVaccin' =>  $request->input("withinaDayafterVaccin"),
            'withinaWeekafterLiveVaccin'    =>  $request->input("withinaWeekafterLiveVaccin"),
            'withinaYearafterRabiesImunitation' =>  $request->input("withinaYearafterRabiesImunitation"),
            'withinaWeekafterAlergicSymtom' =>  $request->input("withinaWeekafterAlergicSymtom"),
            'withinaYearafterSkinTranspant' =>  $request->input("withinaYearafterSkinTranspant"),
            'pregnantOrNewBornMom'  =>  $request->input("pregnantOrNewBornMom"),
            'activeBreastFeed'  =>  $request->input("activeBreastFeed"),
            'drugAddiction' =>  $request->input("drugAddiction"),
            'alcoholics' =>  $request->input("alcoholics")
        ]);
        // - Alkoholisme akut dan kronis
        // - Mengidap Sifilis
        // - Menderita Tuberkulosis secara klinis
        // - Menderita epilepsi dan sering kejang
        // - Menderita penyakit kulit pada vena
        // (pembuluh darah balik) yang akan
        // ditusuk
        // - Mempunyai kecenderungan perdarahan
        // atau penyakit darah, misalnya thalasemia
        // - Seseorang yang termasuk kelompok
        // masyarakat yang berisiko tinggi
        // mendapatkan HIV dan AIDS (homoseks,
        // morfinis, berganti-ganti pasangan seks
        // dan pemakai jarum suntik tidak steril)
        // - Pengidap HIV dan AIDS menurut hasil
        // pemeriksaan saat donor darah
        // - Syarat donor darah untuk perempuan,
        // sebaiknya sedang tidak dalam masa haid
        $payload = $validate;
        $request->get("name");
        $request->all();
        $request->post("name");
        $request->acceptsJson();
        $request->allFiles();
        $request->bearerToken();
        $request->getMethod();
        $request->session();
        session();
        $request->url();
        $request->header("Authoriation");
        Participant::query()->create($payload);
        return redirect()->back();
    }
}
