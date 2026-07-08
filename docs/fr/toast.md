---
layout: default
title: Toast
permalink: /fr/components/toast/
lang: fr
---

# Toast

`resources/views/components/halo/toast.blade.php`

Une file de notifications globale unique. Place `<x-halo::toast />` une fois dans ton layout ; envoie des notifications depuis n'importe où via le store Alpine.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `position` | `bottom-right`\|`bottom-left`\|`top-right`\|`top-left` | `bottom-right` | |

## Utilisation

```blade
{{-- une fois, dans ton layout --}}
<x-halo::toast />
```

```html
<button @click="$store.haloToast.push('Enregistré !', 'success')">Enregistrer</button>
```

```js
// depuis n'importe quel script, une fois Alpine démarré
Alpine.store('haloToast').push('Une erreur est survenue', 'danger');
```

`push(message, variant = 'info', duration = 4000)` retourne l'id du toast et se referme automatiquement après `duration` ms (passe `0` pour désactiver la fermeture auto). Variants : `info`, `success`, `warning`, `danger`.

## Accessibilité

Le conteneur a `aria-live="polite"` et `aria-atomic="true"` pour que les lecteurs d'écran annoncent les nouveaux toasts sans interrompre. Chaque toast a `role="status"` et son propre bouton de fermeture.

## Implémentation

Enregistré comme `Alpine.store('haloToast', ...)` dans `resources/js/init.js` — un store plutôt qu'un `Alpine.data()` par composant, puisque la file est un état vraiment global partagé sur toute la page, pas local à un élément.
