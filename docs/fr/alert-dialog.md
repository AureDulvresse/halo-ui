---
layout: default
title: AlertDialog
permalink: /fr/components/alert-dialog/
lang: fr
---

# AlertDialog

`resources/views/components/halo/alert-dialog/{index,header,body,footer}.blade.php`

Une [Modal](../modal) plus stricte pour les confirmations qui ne doivent pas être fermées par accident : elle ne se ferme jamais sur un clic sur le fond ou sur `Echap`, seulement via une action explicite dans son pied (ex. Annuler / Confirmer).

## Props

`<x-halo::alert-dialog>` :

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | `string` | *requis* | Identifie cette boîte de dialogue pour les événements `open-alert-dialog`/`close-alert-dialog` |
| `size` | `sm`\|`md`\|`lg`\|`xl` | `md` | |

`alert-dialog.header`, `alert-dialog.body`, `alert-dialog.footer` n'ont pas de props au-delà des attributs passthrough.

## Exemples

```blade
<x-halo::button variant="danger" @click="$dispatch('open-alert-dialog', 'confirm-delete')">
    Supprimer le compte
</x-halo::button>

<x-halo::alert-dialog name="confirm-delete">
    <x-halo::alert-dialog.header>Supprimer le compte ?</x-halo::alert-dialog.header>

    <x-halo::alert-dialog.body>
        Cette action est irréversible. Toutes vos données seront définitivement supprimées.
    </x-halo::alert-dialog.body>

    <x-halo::alert-dialog.footer>
        <x-halo::button variant="outline" @click="$dispatch('close-alert-dialog', 'confirm-delete')">Annuler</x-halo::button>
        <x-halo::button variant="danger" @click="$dispatch('close-alert-dialog', 'confirm-delete')">Supprimer</x-halo::button>
    </x-halo::alert-dialog.footer>
</x-halo::alert-dialog>
```

## Accessibilité

Rend `role="alertdialog"` et `aria-modal="true"` (plutôt que `role="dialog"` pour [Modal](../modal)), selon le [pattern WAI-ARIA alertdialog](https://www.w3.org/WAI/ARIA/apg/patterns/alertdialog/) — le même comportement de piège à focus et de restauration du focus que Modal s'applique (`Tab`/`Shift+Tab` bouclent dans le panneau ; la fermeture redonne le focus à ce qui l'a déclenchée), mais il n'y a délibérément **pas** de bouton de fermeture, pas de gestionnaire de clic sur le fond, et pas de gestionnaire `Echap`. La seule sortie possible est l'une des actions fournies dans le pied de page, ce qui est le but recherché : une alert dialog interrompt l'utilisateur pour une décision qu'il doit prendre explicitement.

## Implémentation

Enregistrée comme sa propre factory `Alpine.data('haloAlertDialog', ...)` dans `resources/js/init.js` — une factory distincte plutôt qu'un indicateur `alertMode` ajouté à `haloModal`, afin que le comportement « pas de fermeture accidentelle » ne puisse pas régresser suite à un futur changement de Modal, et pour qu'un `$dispatch('close-modal')` égaré ailleurs dans une application ne puisse jamais fermer une alert dialog. Pour la même raison, elle écoute ses propres événements `open-alert-dialog`/`close-alert-dialog` sur `window` plutôt que de réutiliser `open-modal`/`close-modal` de Modal.
