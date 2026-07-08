---
layout: default
title: File Upload
permalink: /fr/components/file-upload/
lang: fr
---

# File Upload

`resources/views/components/halo/file-upload.blade.php`

Une zone de glisser-déposer par-dessus un `<input type="file">` natif, avec une liste supprimable des fichiers sélectionnés. Pleinement fonctionnel dans un vrai `<form>` — c'est un vrai champ fichier, pas un widget JS qui en imite un.

## Props

| Prop | Type | Défaut | Notes |
|---|---|---|---|
| `name` | `string` | `file` | Reçoit automatiquement `[]` en suffixe si `multiple` |
| `multiple` | `bool` | `false` | |
| `accept` | `string` ou `null` | `null` | Attribut natif `accept` (ex. `.pdf,.docx`) ; affiché aussi comme indice sous la zone de dépôt |
| `disabled` | `bool` | `false` | |
| `id` | `string` ou `null` | auto-généré | |

## Exemple

```blade
<form method="POST" action="/documents" enctype="multipart/form-data">
    @csrf
    <x-halo::file-upload name="documents" multiple accept=".pdf,.docx" />
    <x-halo::button type="submit">Envoyer</x-halo::button>
</form>
```

## Accessibilité

La zone de dépôt est un `<label for>` enveloppant un input fichier natif visuellement masqué (`sr-only`, pas `display:none`) — il reste dans l'ordre de tabulation et activable au clavier (Espace/Entrée ouvre le sélecteur de fichiers du système), et le label reçoit un anneau de focus visible via `peer-focus-visible` quand l'input caché a le focus. Le glisser-déposer est une amélioration progressive par-dessus cet input natif, pas un remplacement.

## Implémentation

`Alpine.data('haloFileUpload', ...)` dans `resources/js/init.js` suit les fichiers sélectionnés pour l'affichage et reconstruit le `FileList` de l'input via l'API `DataTransfer` quand un fichier est retiré — un simple tableau JS ne peut pas être réassigné directement à `input.files`, car c'est un type de collection natif du navigateur, en lecture seule.
