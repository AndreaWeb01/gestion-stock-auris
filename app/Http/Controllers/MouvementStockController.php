<?php

namespace App\Http\Controllers;

use App\Models\MouvementStock;
use Illuminate\Http\Request;

class MouvementStockController extends Controller
{
    /**
     * Affiche la liste des mouvements de stock.
     */
    public function index()
    {

        $mouvements = MouvementStock::paginate(10);
        return view('mouvements.index', compact('mouvements'));

    }


    public function create()
    {
        return view('mouvements.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
            'type' => 'required|in:entree,sortie',
            'date' => 'required|date',
            'motif' => 'nullable|string|max:255',
        ]);
        

        

        return redirect()->route('mouvements.index')->with('success', 'Mouvement de stock créé avec succès.');
    }

    /**
     * Affiche un mouvement de stock spécifique.
     */
    public function show(MouvementStock $mouvementStock)
    {
        return view('mouvements.show', compact('mouvementStock'));
    }

    /**
     * Affiche le formulaire d'édition d'un mouvement de stock existant.
     */
    public function edit(MouvementStock $mouvementStock)
    {
        return view('mouvements.edit', compact('mouvementStock'));
    }

    /**
     * Met à jour un mouvement de stock existant en base de données.
     */
    public function update(Request $request, MouvementStock $mouvementStock)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'type' => 'required|in:entree,sortie',
            'date' => 'required|date',
        ]);

        $mouvementStock->update($request->all());

        return redirect()->route('mouvements.index')->with('success', 'Mouvement de stock mis à jour avec succès.');
    }

    /**
     * Supprime un mouvement de stock de la base de données.
     */
    public function destroy(MouvementStock $mouvementStock)
    {
        $mouvementStock->delete();

        return redirect()->route('mouvements.index')->with('success', 'Mouvement de stock supprimé avec succès.');
    }
    /**
     * Affiche une liste filtrée des mouvements de stock selon les critères.
     */
    public function filter(Request $request)
    {
        $query = MouvementStock::query();

        if ($request->filled('produit_id')) {
            $query->where('produit_id', $request->input('produit_id'));
        } // Vérifie si l'identifiant du produit est fourni

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        } // Vérifie si le type est fourni

        if ($request->filled('date')) {
            $query->whereDate('date', $request->input('date'));
        } // Vérifie si la date est fournie

        $mouvements = $query->get();

        return view('mouvements.index', compact('mouvements'));
    } // fin de la méthode filter
}
