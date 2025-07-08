<?php

namespace App\Http\Controllers;

use App\Models\MouvementStock;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MouvementStockController extends Controller
{
    /**
     * Affiche la liste des mouvements de stock.
     */
    public function index()
    {

        $produits = Produit::all();
        $users = User::all(); // Récupère tous les utilisateurs pour le champ

        $mouvements = MouvementStock::paginate(10);
        return view('admin.stocks.index', compact('mouvements'));

    }

    // Formulaire de création
    public function create()
    {
        $produits = Produit::all();
        $users = User::all(); // Récupère tous les utilisateurs pour le champ utilisateur
        return view('admin.stocks.create', compact('produits', 'users'));
    }

    // Traite le formulaire et enregistre le mouvement
    public function store(Request $request)
    {
        $produits = Produit::find($request->produit_id);
        if (!$produits) {
            return redirect()->back()->withErrors(['produit_id' => 'Produit non trouvé.']);
        }
        $users = User::find($request->user_id);
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'type_mouvement' => 'required|in:entree,sortie',
            'quantite' => 'required|integer|min:1',
            'motif' => 'required|string|max:255',
            'date_mouvement' => 'required|date',
        ]);

        $mouvement = new MouvementStock();
        $mouvement->produit_id = $produits->id;
        $mouvement->type_mouvement = $request->type_mouvement;
        $mouvement->quantite = $request->quantite;
        $mouvement->motif = $request->motif;
        $mouvement->date_mouvement = $request->date_mouvement;
        $mouvement->user_id = $users->id; // utilisateur connecté
        $mouvement->vente_id = null; // sera rempli uniquement pour les ventes
        $mouvement->save();

        return redirect()->route('mouvementStocks.create')->with('success', 'Mouvement enregistré avec succès.');
    }


    /**
     * Affiche un mouvement de stock spécifique.
     */
    public function show(MouvementStock $mouvementStock)
    {
        return view('admin.stocks.show', compact('mouvementStock'));
    }

    /**
     * Affiche le formulaire d'édition d'un mouvement de stock existant.
     */
    public function edit(MouvementStock $mouvementStock)
    {
        $produits = Produit::all();
        $users = User::all(); // Récupère tous les utilisateurs pour le champ
        return view('admin.stocks.edit', compact('mouvementStock','produits', 'users'));
    }

    /**
     * Met à jour un mouvement de stock existant en base de données.
     */
    public function update(Request $request, MouvementStock $mouvementStock)
    {
        $request->validate([
    'produit_id' => 'required|exists:produits,id',
    'user_id' => 'required|exists:users,id',
    'type_mouvement' => 'required|in:entree,sortie',
    'quantite' => 'required|numeric|min:1',
    'motif' => 'required|string|max:255',
    'date_mouvement' => 'required|date',
]);


        $mouvementStock->update($request->all());

        return redirect()->route('admin.mouvements.index')->with('success', 'Mouvement de stock mis à jour avec succès.');
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
