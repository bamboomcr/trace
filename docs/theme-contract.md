# Trace Theme Core – Internal Documentation

This documentation defines the *rules, intent, and constraints* of the Trace core theme. It exists to ensure the theme remains stable, predictable, and reusable when branching into styled variants.

## 1. Theme Philosophy (The Contract)

This theme is a **layout-first, style-agnostic FSE core**.

Its purpose is to:

- Provide reliable layout behaviour
- Prevent accidental editor breakage
- Allow rapid creation of styled, industry-specific branches

The core theme **must never contain**:

- Industry branding
- Opinionated colour schemes
- Decorative animations
- Business-specific patterns

All visual personality belongs in *branches*, not the core.

## 2. Layout System Rules

### 2.1 Content Widths

The theme uses a single fluid width formula for both content and wide layouts:

- **Content Width** — `clamp(320px, 90vw, 1850px)`
- **Wide Width** — `clamp(320px, 90vw, 1850px)` *(same value — both resolve identically)*

The distinction between content and wide is preserved at the markup/class level (so blocks can target `aligncontent` vs `alignwide`) but both currently resolve to the same fluid width. If a variant needs a narrower readable column, override `contentSize` in the branch's `theme.json`.

Root horizontal padding is `clamp(1.25rem, 4vw, 3rem)` on each side.

### 2.2 Alignment Rules

- `alignfull` may only be used for:
  - Cover blocks
  - Full-width Groups
  - Hero / banner sections
- `alignwide` may be used inside constrained layouts
- Text-based blocks must **never** be full width

### 2.3 Constrained Wrappers

All templates wrap content inside a **constrained Group**.

This allows:

- Wide and full blocks to escape intentionally
- Predictable centring of readable content

No template should output raw `post-content` without a constrained wrapper.

### 2.4 Template Parts

The theme registers six template parts:

| Name                   | Title                  | Area     |
|------------------------|------------------------|----------|
| `header`               | Header                 | `header` |
| `header-smart`         | Header — Smart         | `header` |
| `header-fixed`         | Header — Fixed         | `header` |
| `footer`               | Footer                 | `footer` |
| `footer-alternative-1` | Footer — Alternative 1 | `footer` |
| `footer-alternative-2` | Footer — Alternative 2 | `footer` |

## 3. Spacing & Padding Philosophy

### 3.1 Global Padding

- Root padding is enabled using `useRootPaddingAwareAlignments`
- This ensures full-width blocks respect site gutters

### 3.2 Spacing Presets

Nine spacing presets are defined. Use these instead of custom values:

| Slug  | Name | Size (clamp)                              |
|-------|------|-------------------------------------------|
| `xs`  | XS   | `clamp(0.5rem, 0.42rem + 0.25vw, 0.625rem)` |
| `s`   | S    | `clamp(0.75rem, 0.66rem + 0.35vw, 0.95rem)` |
| `m`   | M    | `clamp(1rem, 0.90rem + 0.40vw, 1.25rem)`  |
| `l`   | L    | `clamp(1.5rem, 1.25rem + 0.80vw, 2rem)`   |
| `xl`  | XL   | `clamp(2.25rem, 1.80rem + 1.50vw, 3.25rem)` |
| `2xl` | 2XL  | `clamp(3.25rem, 2.45rem + 2.50vw, 5rem)`  |
| `3xl` | 3XL  | `clamp(2rem, 0.7rem + 5vw, 7rem)`         |
| `4xl` | 4XL  | `clamp(2.5rem, 0.9rem + 7vw, 9.5rem)`     |
| `5xl` | 5XL  | `clamp(3rem, 1.1rem + 9vw, 13rem)`        |

Rules:

- Do not stack padding + margin unnecessarily
- Use spacing presets over custom values
- Padding should be applied to **sections**, not individual text blocks

Allowed spacing units: `rem`, `%`, `vw`, `vh`.

## 4. Typography Rules

### 4.1 Units

- REM and percentage units only (enforced via `spacingSizes` and font presets)
- No fixed pixel typography
- All font sizes use `clamp()` for fluid scaling
- Custom font size and custom line height are **disabled** in the editor

### 4.2 Font Families

Two variable fonts are bundled (no external loading):

| Name             | Slug               | Use              | Weight range |
|------------------|--------------------|------------------|--------------|
| Google Sans Flex | `google-sans-flex` | Body / default   | 100–1000     |
| Space Grotesk    | `space-grotesk`    | Headings/buttons | 300–700      |

The body default is Google Sans Flex; headings and buttons use Space Grotesk.

### 4.3 Font Size Presets

Two naming layers exist — semantic (preferred) and legacy shorthand:

**Semantic presets (preferred):**

| Slug         | Name       | Size (clamp)                                  |
|--------------|------------|-----------------------------------------------|
| `display-xl` | Display XL | `clamp(2.5rem, 10vw, 10rem)`                  |
| `display-l`  | Display L  | `clamp(2.5rem, 6vw, 5rem)`                    |
| `display-m`  | Display M  | `clamp(2.25rem, 5vw, 3.5rem)`                 |
| `heading-xl` | Heading XL | `clamp(2rem, 4vw, 3rem)`                      |
| `heading-l`  | Heading L  | `clamp(1.75rem, 3vw, 2.25rem)`                |
| `heading-m`  | Heading M  | `clamp(1.5rem, 2.5vw, 1.875rem)`              |
| `body-l`     | Body L     | `clamp(1.125rem, 1.05rem + 0.6vw, 1.35rem)`  |
| `body-m`     | Body M     | `clamp(1rem, 0.95rem + 0.3vw, 1.125rem)`     |
| `body-s`     | Body S     | `clamp(0.875rem, 0.85rem + 0.2vw, 0.95rem)`  |
| `meta`       | Meta       | `clamp(0.75rem, 0.72rem + 0.2vw, 0.875rem)`  |

**Legacy shorthand presets** (kept for backward compatibility):

| Slug  | Name  | Equivalent to  |
|-------|-------|----------------|
| `s`   | Small | `body-s`       |
| `m`   | Base  | `body-m`       |
| `l`   | Large | `body-l`       |
| `xl`  | XL    | `clamp(1.35rem, 1.2rem + 1vw, 1.8rem)` |
| `2xl` | 2XL   | `clamp(1.7rem, 1.4rem + 1.6vw, 2.4rem)` |
| `3xl` | 3XL   | `clamp(2.1rem, 1.6rem + 2.4vw, 3.2rem)` |

Use semantic slugs in all new work.

Default heading sizes wired in `theme.json`:
- h1 → `heading-xl`, h2 → `heading-l`, h3 → `heading-m`
- h4 → `l`, h5 → `m`, h6 → `s`

### 4.4 Line Height Presets

| Slug       | Name     | Value |
|------------|----------|-------|
| `display`  | Display  | `1`   |
| `headings` | Headings | `1.2` |
| `body`     | Body     | `1.6` |

Custom line height is disabled in the editor — use these presets.

### 4.5 Letter Spacing Presets

| Slug     | Name   | Value      |
|----------|--------|------------|
| `tight`  | Tight  | `-0.04em`  |
| `slight` | Slight | `-0.02em`  |
| `normal` | Normal | `0em`      |

Headings default to `slight`. Buttons default to `normal`.

## 5. Colour System

The core theme provides:

- Neutral base palette (default dark: `#131315` background)
- Semantic colour slots only

Rules:

- No branded colours
- No industry colours
- No gradients unless structural

Colour personality belongs in branches (style variations in `styles/`).

The base palette in `theme.json` acts as the fallback when no style variation is active. It is a dark, neutral default — not an endorsed scheme.

See `docs/color-schemes.md` for the full slug schema and per-scheme details.

## 6. Motion & Animation

Custom motion properties are defined under `settings.custom.motion`:

| Token                    | Value                            | Use                            |
|--------------------------|----------------------------------|--------------------------------|
| `duration-fast`          | `300ms`                          | Micro-interactions, hovers     |
| `duration-base`          | `600ms`                          | Standard transitions           |
| `duration-slow`          | `1200ms`                         | Page-level or entrance effects |
| `ease-out`               | `cubic-bezier(0.22, 1, 0.36, 1)` | Snappy deceleration            |
| `ease-soft`              | `cubic-bezier(0.25, 0.1, 0.25, 1)` | Gentle easing               |
| `parallax-distance`      | `2px`                            | Subtle depth parallax          |
| `hover-lift`             | `4px`                            | Card/element hover elevation   |

Reference these via `var(--wp--custom--motion--duration-fast)` etc.

Decorative animations must not be added to the core — these tokens exist for structural micro-interactions only.

## 7. Patterns Strategy

### 7.1 Pattern Types

Patterns fall into two categories:

#### Utility Patterns

- Section – Constrained
- Section – Wide
- Section – Full
- Spacing helpers

These are structural and must remain visually neutral.

#### Layout Patterns

- Header skeletons
- Footer skeletons
- Content scaffolds

No marketing copy or imagery should exist in core patterns.

### 7.2 What Patterns Should NOT Do

Patterns should not:

- Impose branding
- Hardcode colours
- Lock typography

Patterns define *structure*, not style.

## 8. Block Variations

The core theme registers the following block style variations:

### `core/group` — Card (`is-style-card`)

Adds a 1px border and 0.75rem radius with `m` padding on all sides. Intended for surface-lifted content sections. Colour comes from the active scheme's `surface` + `border` tokens.

### `core/list` — No bullets / numbers (`no-markers`)

Strips list markers. Useful for navigation-style lists and icon lists in patterns.

## 9. Editor Experience Rules

- Editors should feel guided, not restricted
- Defaults should be sensible
- Dangerous options should be quietly removed

If a block can break layout, it should be constrained at theme level.

Disabled editor features:
- Custom font sizes (`customFontSize: false`)
- Custom line heights (`customLineHeight: false`)
- Default WordPress colour palette (`defaultPalette: false`)
- Default gradients (`defaultGradients: false`)
- Default duotone (`defaultDuotone: false`)

## 10. Performance Principles

The core theme prioritises:

- Minimal CSS
- No JavaScript unless unavoidable
- No external font loading (both fonts are self-hosted in `assets/fonts/`)

Rules:

- One global stylesheet
- No per-template CSS
- No per-pattern CSS unless structural

## 11. Branching Rules (Step 2)

When creating a new theme variant:

- The core must not be modified
- Branches may override:
  - Colours
  - Typography
  - Patterns
  - Templates (visual only)
- Layout logic must remain untouched

If a branch needs layout changes, the core should be updated first.

## 12. Golden Rule

If a decision feels subjective, decorative, or brand-led — it does not belong in the core.

The core exists to be boring, reliable, and invisible.
