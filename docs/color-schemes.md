# Color Schemes

Trace ships color schemes as JSON files in `styles/`. Each one is a complete
palette: WordPress lets users pick one in Site Editor → Styles → Browse styles.

## How to add a new scheme

1. Copy `docs/_color-scheme-template.json` to `styles/<your-name>.json`
   (e.g. `styles/cream.json`).
2. Change `"title"` to the human-readable name (this is what appears in the
   Site Editor's style switcher).
3. Replace each color value with your hex. **All 11 slugs are required.** If
   you don't want a slug to do anything visually distinct, give it the same
   value as the slug it would otherwise piggy-back on (e.g. `heading` =
   `foreground` if you don't want headings in a separate hue).
4. Save. Hard-refresh the editor. The scheme appears in the picker.

## The 11 slugs (the schema)

The names are fixed — every scheme must define a value for each. The values
are entirely up to the scheme designer; nothing is forced to stay constant
across schemes.

| Slug                 | Role                                             | Used by                                       |
|----------------------|--------------------------------------------------|-----------------------------------------------|
| `background`         | Page background                                  | Body, root                                    |
| `surface`            | Secondary surface (cards, footer, nested groups) | `is-style-card`, footer parts                 |
| `border`             | Dividers, outlines, button borders               | Buttons, accordion, dividers                  |
| `muted`              | Quieter text (captions, dates, footer links)     | Post date, post-terms, footer meta            |
| `foreground`         | Primary body text                                | Body, paragraphs, links                       |
| `heading`            | Heading color (overrides foreground for h1–h6)   | Wired in `theme.json → styles.elements.heading` |
| `background-inverse` | Complement of `background` for inverted sections | Use on Cover/Group blocks for "dark interlude" sections, regardless of active scheme |
| `action`             | Primary brand accent / CTA fill                  | Button hover/fill, focus rings                |
| `accent-2`           | Secondary accent (tags, callouts, dividers)      | Reserved — drop it into post-terms, badges, etc. as needed |
| `danger`             | Error / destructive state                        | Form errors, delete confirmations              |
| `highlight`          | Callouts, annotations, marks                     | Quote treatments, mark elements                |

### Note on the `text` slug

The base `theme.json` palette and some style files (`citron`, `harbor`) also
define a `text` slug — a legacy alias that duplicates `foreground`. It is **not
part of the required schema** and is not in `_color-scheme-template.json`. Do
not add it to new schemes. It will be removed from the existing files in a
future cleanup pass.

## Existing schemes

| File          | Title   | Mode  | Background | Notes                                      |
|---------------|---------|-------|------------|--------------------------------------------|
| *(theme.json)*| Default | Dark  | `#131315`  | Fallback only — no scheme file, near-black |
| `black.json`  | Black   | Dark  | `#000000`  | Pure black; same surface/border as Default |
| `light.json`  | Light   | Light | `#FFFFFF`  | Clean white; `action` = citron `#DBFE87`   |
| `citron.json` | Citron  | Light | `#D4E055`  | Lime-yellow; hot-pink `action`; teal `heading` |
| `harbor.json` | Harbor  | Dark  | `#2D5973`  | Ocean blue; coral `action`; warm cream text |

## Design notes per scheme

A few things to think about that the schema can't enforce:

- **Surface direction.** In dark schemes, `surface` is usually *lighter* than
  `background` (cards lift off the page). In light schemes it's usually
  *darker* than `background` (cards sit recessed). This isn't automatic —
  you set the direction by choosing the hex.
- **`background-inverse` should genuinely contrast with `background`.** It's
  designed for "the section breaks out of the scheme" use cases. If they're
  similar values, it does nothing.
- **`heading` and `foreground` can be the same.** Common; nothing wrong with
  it. Set them differently when you want headings in a slightly bolder hue
  (e.g. near-black headings on a soft-gray body). Citron is an example where
  they differ: body is near-black, headings are teal.
- **Brand accents (`action`, `accent-2`, `danger`, `highlight`) are not
  required to be consistent across schemes.** A "Rust" scheme can have a
  burnt-orange `action` even though the dark scheme uses lime. The schema
  fixes the *role*, not the value.
- **Test contrast.** A scheme is only good if `foreground` on `background`
  passes WCAG AA (4.5:1 for body text). Same for `heading` on `background`,
  and any time you put `foreground` text on `surface`.

## What NOT to do

- **Don't add a new slug to one scheme without adding it to the others (and
  to `theme.json`'s base palette).** WordPress variations *replace* the base
  palette, so a slug that exists in only one scheme will be undefined under
  any other.
- **Don't add a `styles` block to a variation file.** `theme.json` already
  wires the slugs to body / heading / link elements via CSS variables —
  changing the palette is enough.
- **Don't reference colors in patterns by hex.** Always use slugs (e.g.
  `var:preset|color|action`) so patterns work under every scheme.
- **Don't add the `text` slug to new schemes** — it's a legacy alias being
  phased out. Use `foreground` instead.
