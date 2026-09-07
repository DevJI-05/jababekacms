<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        $tenants = Tenant::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $anchorTenants = $tenants->where('is_anchor', true)->values();

        $otherTenants = $tenants->where('is_anchor', false)
            ->groupBy(fn (Tenant $tenant) => $tenant->category ?: __('Other'));

        return view('pages.tenants', [
            'anchorTenants' => $anchorTenants,
            'otherTenants' => $otherTenants,
        ]);
    }

    public function show(Tenant $tenant): View
    {
        abort_unless($tenant->is_active, 404);

        return view('pages.tenant-show', [
            'tenant' => $tenant,
        ]);
    }
}
