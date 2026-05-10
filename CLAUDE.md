# Trace — Context for Claude

This file is read by Claude Code at the start of every session in this theme.
Keep it concise but accurate; treat it as the single source of truth for
"what is this project and how do we work on it." When something here drifts
from reality, fix it here first.

## What Trace is

Trace is a typography-led WordPress block theme (FSE) for editorial-leaning
sites. Two fonts, twelve color slugs, one stylesheet, no JavaScript unless
unavoidable. Built around the principle that the words should be loud and
the layout should be quiet.

The theme has a deliberate split:

- **Core** is layout-first and style-agnostic. It must never carry industry
  branding, opinionated colors, decorative animations, or business-specific
  patterns. The core's job is to be boring, reliable, and invisible.
- **Branches** carry visual personality. Color schemes, opinionated patterns,
  and brand-specific touches live in branches, never in core.

Treat the core as boring infrastructure. If a change feels subjective,
decorative, or brand-led, it belongs in a branch.

For full theme philosophy: `docs/theme-contract.md`. For color scheme rules:
`docs/color-schemes.md`. Note: at time of writing, `theme-contract.md`
predates the schema work and references "11 slugs"; the live schema is now 12
(see Color System below). `color-schemes.md` will be updated alongside any
schema change.

## File layout

```
trace/
├── theme.json                 # Schema, palette, element wiring, templateParts registration
├── functions.php              # Theme setup, block style registration, recovery tool
├── style.css                  # Theme header (name, version, etc.)
├── assets/
│   ├── css/
│   │   ├── blocks.css         # Editor + frontend block styles (the primary stylesheet)
│   │   └── front.css          # Frontend-only overrides
│   ├── fonts/                 # Self-hosted Space Grotesk + Google Sans Flex
│   └── js/                    # Minimal — only when unavoidable
├── parts/                     # Header / footer template parts
├── patterns/                  # Block patterns, organized by category
│   ├── content/               # Cards, accordions, pricing, team
│   ├── cta/                   # Calls-to-action
│   ├── hero/                  # Page heroes
│   ├── pages/                 # Full-page starter patterns
│   ├── query/                 # Post loops
│   └── sections/              # Generic section blocks
├── styles/                    # Color scheme JSON files (variations)
│   ├── black.json
│   ├── light.json
│   ├── harbor.json
│   └── citron.json
├── templates/                 # Template files (home, archive, single, etc.)
└── docs/
    ├── theme-contract.md
    ├── color-schemes.md
    └── _color-scheme-template.json   # Starter for new schemes; underscore prefix prevents WP discovery
```

## Color System (the 12-slug schema)

The schema is the contract. Slug *names* are fixed across all schemes and
referenced throughout the codebase. Slug *values* (hex codes) are entirely
free per scheme — designers choose freely.

| Slug                 | Role                                                          |
|----------------------|---------------------------------------------------------------|
| `background`         | Page background                                               |
| `surface`            | Cards, footer, nested groups                                  |
| `border`             | Dividers, outlines, button borders                            |
| `muted`              | Captions, dates, footer meta                                  |
| `foreground`         | Generic foreground (icons, separators, button text) — ~30 CSS refs |
| `text`               | Body paragraph text — wired in `theme.json → styles.color.text` |
| `heading`            | h1–h6 — wired in `theme.json → styles.elements.heading`       |
| `background-inverse` | For "dark interlude" sections that break out of the scheme    |
| `action`             | Primary brand accent / CTA fill                               |
| `accent-2`           | Secondary accent (tags, callouts, badges)                     |
| `danger`             | Error / destructive state                                     |
| `highlight`          | Callouts, annotations, marks                                  |

### Why text and foreground are separate

Two slugs that almost always share a value, but label different intents in
the editor's color picker. Without `text`, body paragraphs are picker-labeled
"Foreground" because the picker reverse-resolves the computed color. With
`text` wired to body and links, paragraphs label correctly as "Text",
headings as "Heading", and `foreground` becomes the generic decoration token.

### Hard rules

- **Don't rename slugs.** Renaming breaks every saved customization and every
  reference across patterns/CSS. New slugs are fine; renames are a major
  version bump and require a migration story.
- **Every scheme must define every slug.** WordPress variations *replace*
  the base palette, so a slug missing from a variation is undefined when
  that variation is active. Test by activating each scheme.
- **Never reference colors by hex in patterns.** Always slug
  (`var:preset|color|action`) so patterns work across all schemes.
- **Don't add a `styles` block to a variation file.** `theme.json` wires
  slugs to body/heading/link elements globally; changing the palette is
  enough.

### Existing schemes

- **Black** — high-contrast monochrome, the default
- **Light** — clean editorial, long-form reading
- **Harbor** — marine teal (#2D5973) with vintage travel-poster warmth
- **Citron** — saturated chartreuse (#D4E055), heading in Harbor blue

## How styles work end-to-end

1. `theme.json` defines the base palette (12 slugs) and wires those slugs to
   body, heading, link, and button elements via `styles.color.*` and
   `styles.elements.*`.
2. Each variation in `styles/*.json` overrides the palette by providing its
   own values for the 12 slugs. Element wiring inherits from `theme.json` —
   variations should not redefine it.
3. CSS in `assets/css/blocks.css` references slugs as
   `var(--wp--preset--color--SLUG)`. These resolve correctly under any active
   variation because every variation defines every slug.
4. Patterns reference slugs via attribute syntax
   (`var:preset|color|SLUG` or `"textColor":"SLUG"`).

The single biggest stability rule: schema is the contract. Keep slugs
universal; let values vary freely.

## Fonts

Two self-hosted families:

- **Space Grotesk** — headings
- **Google Sans Flex** — body

Both have `font-feature-settings: "ss01"` (Stylistic Set 1) which swaps the
default arrow glyphs (`←` `→`) for thin, monoline variants. This is why
button arrows look the way they do, and why the link-arrow paragraph styles
(`is-style-link-arrow`, `is-style-link-arrow-left`) include `ss01` in their
pseudo-element rules.

If a future font swap removes `ss01`, the property silently becomes a no-op
and the default arrow glyph returns. Safe by default.

## Patterns

31 patterns under `patterns/`, each:

- Has a `metadata.name` on the top-level block for editor List View identity
- References colors by slug only, never hex
- Lives in one of: content/, cta/, hero/, pages/, query/, sections/

Multi-section patterns get descriptive sub-names (e.g. "Pricing Cards —
Intro" + "Pricing Cards — Plans"). When in doubt, look at how
`content-accordion-faq.php` handles this and follow the pattern.

### Known issue (flagged, not fixed)

`sections/section-split-list.php` and `section-split-list-animated.php` have
filenames swapped relative to their content. Titles and slugs match content
correctly so editor display is fine; only the filenames are misleading. Worth
fixing in a focused cleanup pass.

## Block styles registered

- `is-style-card` (group, paragraph, columns) — `surface` background, padding
- `is-style-link-arrow` (paragraph) — appends animated `→` after the text
- `is-style-link-arrow-left` (paragraph) — prepends animated `←` before
- Several others — see `functions.php` `trace_register_block_styles()`

The link-arrow styles put the arrow on the paragraph's `::after`/`::before`,
not on any inner `<a>`. This avoids fighting the global `main a::after`
underline-animation rule and works whether or not the paragraph contains a
link.

## Template parts

Six parts, registered explicitly in `theme.json → templateParts` so the
editor knows their area binding:

| Slug                    | Area    |
|-------------------------|---------|
| `header`                | header  |
| `header-smart`          | header  |
| `header-fixed`          | header  |
| `footer`                | footer  |
| `footer-alternative-1`  | footer  |
| `footer-alternative-2`  | footer  |

**Why explicit registration matters:** without it, parts default to area
`uncategorized`, which breaks the Reset button affordance in the editor and
causes "Template part has been deleted or is unavailable" cascades when DB
customizations drift. Adding new parts? Register them here.

## Recovery tool

`Tools → Reset Trace Customizations` (admin page in `functions.php`).

Two independent reset categories:

1. **Templates & Template Parts** — clears `wp_template` and
   `wp_template_part` posts for the active theme. Use when "Template part
   has been deleted or is unavailable" errors appear, or when a template
   update isn't reflecting on disk.
2. **Global Styles** — clears `wp_global_styles` posts for the active theme
   (skipping the empty placeholder). Use when palette changes aren't
   showing new color slugs, or when typography/layout overrides are stuck.

Each requires explicit confirmation. Posts, pages, menus, media, plugins,
navigation menus are never touched.

The "smart counting" for Global Styles parses the JSON content and only
counts rows with non-empty `styles` or `settings` — placeholder rows
(`{"styles":[],"settings":[]}`) don't count as customizations.

## Common workflows

### Adding a color scheme

1. Copy `docs/_color-scheme-template.json` to `styles/<name>.json`.
2. Set `"title"` to the human-readable name.
3. Replace 12 hex codes (one per slug). Schema is enforced; if you skip a
   slug it'll be undefined when the scheme is active.
4. Hard-refresh the editor. Verify by switching to the new scheme.

### Schema changes (rare; high-stakes)

If you genuinely need to add a slug:

1. Add to `theme.json` palette.
2. Add to **every** `styles/*.json` variation (same slug, scheme-specific
   value).
3. Add to `docs/_color-scheme-template.json`.
4. Wire to relevant elements in `theme.json` `styles.color.*` /
   `styles.elements.*` if it's a semantic role like `text` or `heading`.
5. Update `docs/color-schemes.md` (slug count + role table).
6. Update this file's Color System section.
7. Commit before testing — schema changes can break customizations.
8. After the user updates, expect them to run Tools → Reset Trace
   Customizations to clear stale customizations.

Slug renames are a breaking change — avoid unless absolutely necessary.

### Sweeping the codebase for orphan slug references

When a schema change happens, run a Python sweep to find every slug
reference and check it's in the schema:

```python
import re, glob
EXPECTED = {'background', 'surface', 'border', 'muted', 'foreground',
            'text', 'heading', 'background-inverse', 'action', 'accent-2',
            'danger', 'highlight'}
all_refs = set()
for f in glob.glob('**/*', recursive=True):
    if f.endswith(('.css', '.json', '.html', '.php')):
        text = open(f).read()
        all_refs |= set(re.findall(r'var:preset\|color\|([a-z0-9-]+)', text))
        all_refs |= set(re.findall(r'--wp--preset--color--([a-z0-9-]+)', text))
        all_refs |= set(re.findall(r'"(?:textColor|backgroundColor|borderColor|overlayColor|iconColor|iconBackgroundColor)":"([a-z0-9-]+)"', text))
unknown = all_refs - EXPECTED
print(f'Out-of-schema: {unknown}' if unknown else f'✓ All {len(all_refs)} refs match schema')
```

### Visual previews / design references

SVG previews of every color scheme live conceptually as
`docs/figma/*.svg` (when they exist locally). Each is a single-page
mockup at 800×1040 with body type, buttons, badge, card, and the full
12-swatch palette grid. Drag into Figma to use as design references.
Regenerate via the script in conversation history if a scheme changes.

## Conventions

- **wp-cli is available** when working from Local's site shell. Prefer
  `wp db query "..."` over manual SQL paste workflows. `wp post list`,
  `wp option get`, `wp transient delete --all` are all useful.
- **Never modify files under `/mnt/skills/` or other read-only system
  paths.** Always work in the theme directory.
- **Validate JSON after edits.** A broken `theme.json` or pattern JSON
  silently breaks the editor. Run a Python json.load() on changed files
  before declaring done.
- **Validate PHP balance** when editing `functions.php`. Brace counts and
  paren counts should match (current state: 51 open/close braces, 275
  open/close parens after the recovery tool was added).
- **The recovery tool is your friend.** Suggest running it whenever
  schema, template, or pattern changes might have left stale DB state.

## What NOT to do

- Don't put colors in patterns as hex codes. Always slug.
- Don't add a slug to one scheme without adding it everywhere.
- Don't rename slugs without a major-version migration story.
- Don't redefine element wiring in variation files (`styles/*.json`) —
  that's `theme.json`'s job.
- Don't put industry/brand decisions in the core. They go in branches.
- Don't add JavaScript unless absolutely unavoidable.
- Don't break the `is-style-card`, `is-style-link-arrow`, or
  `is-style-link-arrow-left` registrations without removing every
  reference first — those are referenced in patterns/parts.
- Don't auto-register template parts by file discovery alone. Always
  explicit-register in `theme.json → templateParts`.

## Useful commands

```bash
# From Local site shell, in the theme directory:

# Validate every JSON file
find . -name "*.json" -not -path "./node_modules/*" -exec python3 -c "import json,sys; json.load(open(sys.argv[1])); print('OK', sys.argv[1])" {} \;

# List template-part DB customizations for the active theme
wp db query "SELECT p.ID, p.post_name AS slug, p.post_modified, GROUP_CONCAT(t.name) AS theme FROM wp_posts p LEFT JOIN wp_term_relationships tr ON p.ID = tr.object_id LEFT JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'wp_theme' LEFT JOIN wp_terms t ON tt.term_id = t.term_id WHERE p.post_type IN ('wp_template', 'wp_template_part') GROUP BY p.ID;"

# List Global Styles customizations
wp db query "SELECT ID, post_status, LENGTH(post_content) AS size FROM wp_posts WHERE post_type = 'wp_global_styles';"

# Inventory color slug usage
grep -rohE 'var:preset\|color\|[a-z0-9-]+|--wp--preset--color--[a-z0-9-]+' --include='*.css' --include='*.json' --include='*.html' --include='*.php' . | sort | uniq -c | sort -rn

# Check pattern JSON validity (parse every wp:* block's attributes)
python3 -c "
import re, json, glob
for f in glob.glob('patterns/**/*.php', recursive=True):
    c = open(f).read()
    for m in re.finditer(r'<!--\s*wp:[\w/-]+\s+(\{)', c):
        s = m.start(1); d=0; in_str=False; esc=False; e=-1
        for i in range(s, len(c)):
            ch=c[i]
            if esc: esc=False; continue
            if ch=='\\\\': esc=True; continue
            if in_str:
                if ch=='\"': in_str=False
                continue
            if ch=='\"': in_str=True
            elif ch=='{': d+=1
            elif ch=='}': d-=1
            if d==0 and i>s: e=i; break
        if e>=0:
            try: json.loads(c[s:e+1])
            except json.JSONDecodeError as x: print(f'{f}: {x}')
"
```

## Session-start checklist for Claude

When starting a new session in this project:

1. Read this file (you already are).
2. Skim `docs/theme-contract.md` and `docs/color-schemes.md` for any
   updates not yet reflected here.
3. Check the current schema state with the slug-inventory command above.
   If you find out-of-schema slugs, that's a regression to flag, not
   evidence the schema has changed.
4. If the user's about to make a schema change, sequence: add to all
   variations first → wire in theme.json → update docs → commit → then
   test. Reverse causes broken intermediate states.
5. After any non-trivial change, suggest the user run Tools → Reset
   Trace Customizations to clear stale DB state.

## Communication style

The user prefers:

- Direct technical writing, not marketing prose. No "Let's dive in!"
- Honest pushback when something seems wrong. Disagreement is fine
  if it's reasoned.
- Reasoning shown when proposing changes. Why this approach over the
  alternatives.
- Realistic caveats, not just upbeat encouragement. If a thing might
  break or has tradeoffs, name them.
- Concrete diffs and file paths over vague descriptions. "I'll edit
  X line Y to do Z" beats "I'll fix the issue."
