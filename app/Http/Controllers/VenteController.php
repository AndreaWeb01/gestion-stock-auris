<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Detail_vente;
use App\Models\MouvementStock;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VenteController extends Controller
{
    public function index()
    {
        $ventes = Vente::with(['client', 'user'])->paginate(10);
        return view('admin.ventes.index', compact('ventes'));
    }

    public function create()
    {
        $clients = Client::all();
        $utilisateurs = User::all();
        $produits = Produit::all();

        return view('admin.ventes.create', compact('clients', 'utilisateurs', 'produits'));
    }

public function store(Request $request)
{

    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'user_id' => 'required|exists:users,id',
        'montant_total' => 'required|numeric|min:0',
        'remise' => 'nullable|numeric|min:0',
        'date_vente' => 'required|date',
        'mode_paiement' => 'required|string|max:50',
         // Ajout de la validation pour le code reçu
    ]);

            $date = now();
            $annee = $date->format('Y');
            $mois = $date->format('m');
            $jour= $date->format('d');
            // Vérifier le dernier code reçu pour générer le nouveau code
            $dernierVente = Vente::whereYear('created_at', $annee)
                ->whereMonth('created_at', $mois)
                ->orderByDesc('id')
                ->first();
            $numero = 1;
            if ($dernierVente && preg_match('/REC-\d{4}-\d{2}-(\d+)/', $dernierVente->code_recu, $matches)) {
                $numero = intval($matches[1]) + 1;
            }
            $code_recu = 'RECU_' . $annee . $mois . '_' . str_pad($numero, 4, '0', STR_PAD_LEFT);
dd($code_recu);
     DB::beginTransaction();

    try {
        // Créer la vente principale
        $vente = Vente::create([
            'client_id' => $request->client_id,
            'user_id' => $request->user_id,
            'date_vente' => $request->date_vente,
            'montant_total' => $request->montant_total,
            'remise' => $request->remise,
            'mode_paiement' => $request->mode_paiement,
            'code_recu' => isset($code_recu) ? $code_recu : '',
        ]);

        // Générer le PDF après la création des détails
        foreach ($request->produits as $produit) {
            $total = $produit['quantite'] * $produit['prix'];
            Detail_Vente::create([
                'vente_id' => $vente->id,
                'produit_id' => $produit['produit_id'],
                'quantite' => $produit['quantite'],
                'prix' => $produit['prix'],
                'total' => $total,
            ]);
            MouvementStock::create([
                'produit_id' => $produit['produit_id'],
                'user_id' => $request->user_id,
                'quantite' => $produit['quantite'],
                'motif' => 'Vente',
                'type_mouvement' => 'sortie',
                'date_mouvement' => $request->date_vente,
            ]);
        }

        $vente->load(['client', 'user', 'details.produit']);
        $pdf = Pdf::loadView('admin.ventes.recu_pdf', ['vente' => $vente]);
        $filename = 'recu_vente_'.$vente->client->nom.'_'.$vente->code_recu.'.pdf';
        Storage::put('public/recus/' . $filename, $pdf->output());
        $vente->update(['pdf_recu' => 'recus/' . $filename]);

        return redirect()->route('ventes.index')->with('success', 'Vente enregistrée avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Erreur : ' . $e->getMessage());
    } 
    }
    
    public function show(Vente $vente)
    {
        $vente->load(['client', 'utilisateur', 'produits']);
        return view('admin.ventes.show', compact('vente'));
    }
    public function edit(Vente $vente)
    {
        $clients = Client::all();
        $utilisateurs = User::all();
        $produits = Produit::all();

        return view('admin.ventes.edit', compact('vente', 'clients', 'utilisateurs', 'produits'));
    }
    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'utilisateur_id' => 'required|exists:users,id',
            'montant_total' => 'required|numeric|min:0',
            'remise' => 'nullable|numeric|min:0',
            'date_vente' => 'required|date',
            'mode_paiement' => 'required|string|max:50',
        ]);

        $vente->update($request->all());

        return redirect()->route('admin.ventes.index')->with('success', 'Vente mise à jour avec succès');
    }
    public function destroy(Vente $vente)
    {
        // Supprimer le PDF associé
        if ($vente->pdf_recu) {
            Storage::delete('public/' . $vente->pdf_recu);
        }

        // Supprimer la vente
        $vente->delete();

        return redirect()->route('admin.ventes.index')->with('success', 'Vente supprimée avec succès');
    }
}







