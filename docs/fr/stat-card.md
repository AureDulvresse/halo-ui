---
layout: default
title: StatCard
permalink: /fr/components/stat-card/
lang: fr
---

# StatCard

`resources/views/components/halo/stat-card.blade.php`

Une carte de métrique compacte pour tableaux de bord — un libellé, une grande valeur, une icône optionnelle et un indicateur de tendance optionnel. Composée à partir de [Card](../card).

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `label` | `string` | *requis* | Petit titre atténué au-dessus de la valeur |
| `value` | `string`\|`number` | *requis* | Rendu en grand et en gras |
| `icon` | nom d'icône ou `null` | `null` | Rendu en haut à droite via `<x-halo::icon>` |
| `trend` | `string` ou `null` | `null` | Texte libre comme `"+12%"` ou `"-3%"` — coloré en vert/rouge selon son signe de tête, neutre sinon |

## Exemples

```blade
<x-halo::stat-card label="Revenus" value="12 400 €" icon="wallet" trend="+12%" />

<x-halo::stat-card label="Attrition" value="3,2 %" icon="trending-down" trend="-3%" />

<x-halo::stat-card label="Utilisateurs actifs" value="1 204" />
```

## Accessibilité

Contenu purement présentatif rendu avec des titres et du texte simples dans une `Card` — aucun élément interactif, donc pas d'ARIA supplémentaire nécessaire. L'icône est décorative ; ajoute ton propre `aria-label` sur le composant si la valeur seule n'est pas assez descriptive dans ton contexte.
