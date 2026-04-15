<?php

namespace App\Controllers;

use App\Models\AgendaModel;

/**
 * Agenda Controller — sdn56_web
 * ─────────────────────────────────────────────
 *   GET /agenda   → index() : halaman kalender agenda sekolah
 */
class Agenda extends BaseController
{
    private AgendaModel $model;

    public function __construct()
    {
        $this->model = new AgendaModel();
    }

    // ────────────────────────────────────────────
    // GET /agenda
    // GET /agenda?bulan=2026-04
    // ────────────────────────────────────────────
    public function index(): string
    {
        $bulan = $this->request->getGet('bulan'); // format: Y-m

        // Validasi format bulan
        if ($bulan && ! preg_match('/^\d{4}-\d{2}$/', $bulan)) {
            $bulan = null;
        }

        return $this->render('pages/agenda', [
            'title'         => 'Agenda & Kalender',
            'agenda_aktif'  => $this->model->getAktif(20),
            'agenda_semua'  => $this->model->getByBulan($bulan),
            'bulan_aktif'   => $bulan ?? date('Y-m'),
        ]);
    }
}