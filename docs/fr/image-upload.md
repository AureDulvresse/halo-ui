---
layout: default
title: Image Upload
permalink: /fr/components/image-upload/
lang: fr
---

# Image Upload

`resources/views/components/halo/image-upload.blade.php`

Comme [File Upload](../file-upload), mais restreint aux images (`accept="image/*"`) et affichant une grille de vignettes avec aperçus en direct plutôt qu'une liste de noms de fichiers.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | `string` | `image` | Reçoit automatiquement `[]` en suffixe si `multiple` |
| `multiple` | `bool` | `false` | |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | |

## Exemple

```blade
<form method="POST" action="/profile/avatar" enctype="multipart/form-data">
    @csrf
    <x-halo::image-upload name="avatar" />
    <x-halo::button type="submit">Enregistrer</x-halo::button>
</form>
```

## Implémentation

Même mécanique glisser-déposer/`DataTransfer` que File Upload (`Alpine.data('haloImageUpload', ...)`), plus un aperçu par fichier via `URL.createObjectURL(file)`. L'URL d'objet de chaque aperçu est révoquée (`URL.revokeObjectURL`) quand son fichier est retiré, pour qu'abandonner une image volumineuse avant l'envoi ne laisse pas fuiter le blob pendant toute la durée de vie de la page.
