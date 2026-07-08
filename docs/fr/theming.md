---
layout: default
title: Thèmes
permalink: /fr/theming/
lang: fr
---

# Thèmes

Le thème de HaloUI est un ensemble de propriétés CSS personnalisées, pas un tableau de config. C'est voulu : une version antérieure avait un "thème actif" piloté par la config qui ne changeait jamais rien réellement, parce que les classes des composants étaient des utilitaires Tailwind codés en dur qui ne lisaient jamais la config. La v4 corrige ça en faisant des tokens la seule source de vérité, que la config *et* les composants pointent tous les deux vers elle.

## Comment ça marche

`resources/css/theme.css` définit des variables `--halo-*` rattachées à un attribut `[data-theme="..."]`, et les mappe vers de vraies classes utilitaires Tailwind v4 via `@theme` :

```css
[data-theme='aurora'] {
    --halo-primary: #7c3aed;
    --halo-primary-foreground: #fff;
    /* ... */
}

@theme {
    --color-halo-primary: var(--halo-primary);
    /* génère .bg-halo-primary, .text-halo-primary, .border-halo-primary, ... */
}
```

Chaque fichier Blade de composant utilise `bg-halo-primary`, `text-halo-foreground`, `rounded-halo`, etc. — jamais une couleur littérale. Changer `data-theme` sur n'importe quel élément ancêtre (typiquement `<html>`) recolore tous les composants en dessous, en direct, sans rebuild.

## Thèmes fournis

| Thème | `data-theme` | |
|---|---|---|
| **Halo** | `halo` (par défaut) | Bleu, radius standard |
| **Aurora** | `aurora` | Violet/turquoise, radius plus large |
| **Eclipse** | `eclipse` | Fond sombre, accent bleu |
| **Ember** | `ember` | Clair, accent orange chaud, coins plus nets (0.375rem) |
| **Nocturne** | `nocturne` | Sombre, fond quasi noir, accent émeraude — distinct du sombre bleuté d'Eclipse |

## Changer de thème

Côté serveur, pour le bon thème dès le premier rendu :

```blade
<html data-theme="{{ config('halo.theme.default') }}">
```

Côté client, via le store Alpine enregistré dans `resources/js/init.js` :

```blade
<button @click="$store.haloTheme.set('eclipse')">Eclipse</button>
```

Le store persiste le choix dans `localStorage` et le réapplique au chargement.

## Ajouter un thème

1. Ajoute un bloc `[data-theme="tonnom"]` dans `resources/css/theme.css` avec les mêmes noms de variables que les thèmes existants (`--halo-primary`, `--halo-primary-foreground`, `--halo-secondary`, `--halo-secondary-foreground`, `--halo-success`, `--halo-success-foreground`, `--halo-danger`, `--halo-danger-foreground`, `--halo-warning`, `--halo-warning-foreground`, `--halo-info`, `--halo-info-foreground`, `--halo-background`, `--halo-foreground`, `--halo-border`, `--halo-ring`, `--halo-radius`).
2. Ajoute `'tonnom'` à `halo.theme.available` dans `config/halo.php`.
3. Ajoute `'tonnom'` au tableau `THEMES` dans `resources/js/init.js`.

## Surcharges au niveau composant

Passe `class` à n'importe quel composant — elle est fusionnée avec, et prioritaire sur, les classes propres du composant pour la même famille d'utilitaires :

```blade
<x-halo::button class="rounded-none">Coins carrés</x-halo::button>
```

C'est géré par `halo_merge_classes()` dans `src/helpers.php`, qui suit les familles d'utilitaires que les composants font effectivement varier (`bg-`, `text-`, `border-`, `rounded-`, `p{x,y,t,r,b,l}-`, `w-`, `h-`, `gap-`) et garde la dernière occurrence de chacune.
