# JvMTECH.MultiColumn Package for Neos CMS #
[![Latest Stable Version](https://poser.pugx.org/jvmtech/multicolumn/v/stable)](https://packagist.org/packages/jvmtech/multicolumn)
[![License](https://poser.pugx.org/jvmtech/multicolumn/license)](https://packagist.org/packages/jvmtech/multicolumn)

Tailwind CSS / Bootstrap grid for Neos CMS

![JvM.MultiColumn](Documentation/preview.gif "JvM.MultiColumn")

## Compatibility

| Version | Neos |
|---------|------|
| 2.x     | 9.x  |
| 1.x     | 5.3 – 8.x |

### Upgrading from 1.x

- Requires Neos 9. Run the Neos 9 content migration (`site:exportLegacyData` / `site:importAll`) as usual; node type names are unchanged.
- The dependency on `webexcess/label` was removed. Row and column labels in the backend use the Neos core label mechanism.
- The legacy `FlatStructureTransformation` node migration was removed (it only applied to Neos ≤ 8).

## Installation
```
composer require jvmtech/multicolumn
```

## Configuration

### Change grid rendering Tailwind CSS / Bootstrap

There are already defined classes for Tailwind CSS and Bootstrap. You can simply define it in the configuration.

#### Tailwind CSS

```
JvMTECH:
  MultiColumn:
    framework: 'tailwindcss'
```

#### Bootstrap

```
JvMTECH:
  MultiColumn:
    framework: 'bootstrap'
```

### Row dialog

To improve the user experience, the `JvMTECH.MultiColumn:Mixin.Row.CreationDialog` can be added. This will ask for the number of columns when inserting.

```
JvMTECH.MultiColumn:Content.Row:
  superTypes:
    JvMTECH.MultiColumn:Mixin.Row.CreationDialog: true
```

For this you have to install the `Flowpack.NodeTemplates` package.

```
composer require flowpack/nodetemplates
```

### Disable property

To disable e.g. the offset, override in your package the column NodeType by the following:

```
JvMTECH.MultiColumn:Content.Column:
  superTypes:
    JvMTECH.MultiColumn:Mixin.Column.Offset: false
```

To disable e.g. only the xl property, you can just disable the `JvMTECH.MultiColumn:Mixin.Column.Offset.XL` mixin.

```
JvMTECH.MultiColumn:Content.Column:
  superTypes:
    JvMTECH.MultiColumn:Mixin.Column.Offset.XL: false
```

## Upgrade from *WebExcess.MultiColumn*

If you upgrade from the *WebExcess.MultiColumn* package, do first an upgrade to Neos 8.3.
