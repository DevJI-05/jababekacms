<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
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

        $otherTenants = $tenants->where('is_anchor', false)->values();

        $categories = $otherTenants->pluck('category')->filter()->unique()->sort()->values();

        $tenantTabs = collect([
            'all' => [
                'label' => __('All'),
                'groups' => $otherTenants->groupBy(fn (Tenant $tenant) => $tenant->category ?: __('Other')),
            ],
        ])->merge(
            $categories->mapWithKeys(fn (string $category) => [
                Str::slug($category) => [
                    'label' => $category,
                    'groups' => collect([$category => $otherTenants->where('category', $category)->values()]),
                ],
            ]),
        );

        return view('pages.tenants', [
            'anchorTenants' => $anchorTenants,
            'tenantTabs' => $tenantTabs,
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
