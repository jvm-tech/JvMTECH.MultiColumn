# Changelog

## 2.0.0 (2026-10-10)

Neos 9 support. Requires `neos/neos` ^9.0; use 1.x for Neos 5.3 – 8.x.

- Neos 9 compatibility: Fusion uses `renderingMode` (`isEdit` / `isPreview` / `name`) instead of
  `node.context.inBackend`, `node.context.currentRenderingMode` and `Neos.Node.inBackend(node)`.
- Removed the dependency on `webexcess/label` (and the `WebExcess.Label:Show` supertype of row and column).
- New: rows and columns show a grey label bar with their node type label in the editing canvas, as `webexcess/label`
  did before (`data-node-label` attribute via `Neos.Neos:ContentElementWrapping` plus `Resources/Public/Backend.css`,
  edit mode only, frontend output unchanged). Setting `JvMTECH.MultiColumn.showLabels` (default `true`).
- Removed the legacy `FlatStructureTransformation` node migration (Neos ≤ 8 only) and an accidental `Neos.Demo`
  supertype.
