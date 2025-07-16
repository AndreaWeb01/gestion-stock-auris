<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Reset
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les permissions
        $permissions = [
            'produit.index', 'produit.create', 'produit.edit', 'produit.delete',
        'vente.create', 'vente.index', 'vente.show', 'vente.annuler',
        'stock.index', 'stock.mouvement',
        'client.create', 'client.index',
        'recu.print', 'dashboard.view',
        'user.manage', 'role.manage',
        'export.excel'

        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Créer les rôles et leurs permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $vendeur = Role::firstOrCreate(['name' => 'vendeur']);
        $superviseur = Role::firstOrCreate(['name' => 'superviseur']);

        $admin->givePermissionTo($permissions);
        $vendeur->givePermissionTo(['produit.index', 'vente.create', 'vente.index', 'vente.show',
        'stock.index', 'client.create', 'client.index', 'recu.print', 'dashboard.view']);
        
        $superviseur->givePermissionTo(['produit.index', 'produit.create', 'produit.edit',
        'vente.create', 'vente.index', 'vente.show', 'vente.annuler',
        'stock.index', 'stock.mouvement', 'client.create', 'client.index',
        'recu.print', 'dashboard.view', 'export.excel']);
    }
}


