# Changelog

All notable changes to the **Trace WordPress Block Theme** will be documented in this file.

This project adheres to **Semantic Versioning** and follows the **Keep a Changelog** format.

Version format:

MAJOR.MINOR.PATCH

- MAJOR → Breaking changes
- MINOR → New features / improvements
- PATCH → Bug fixes


---

# [1.2.0] — Unreleased

Release-preparation pass.

### Added

- Prebuilt pages offered when adding a new page: Home, About, Services, Pricing, FAQ, Journal, Contact
- "Blank (hero-led)" template for posts and pages that supply their own hero
- Harbor and Citron colour schemes; `heading`, `body`, `background-inverse` and `accent-2` colour slugs
- Radius block styles for Group, Image, Cover and Media & Text
- Link arrow paragraph styles
- Tools → Reset Trace Customizations
- LICENSE file and licence headers

### Changed

- Colour slug `text` renamed to `body` (see Fixed)
- Line-height and letter-spacing tokens moved to `settings.custom` (`--wp--custom--line-height--*`, `--wp--custom--letter-spacing--*`)
- Single posts show title, date, category, featured image, post navigation and comments
- Blog home, archive and index templates use real post loops
- Site title is no longer an `<h1>`; each page has one `<h1>`
- Header and footers no longer contain site-specific menu ids, page ids, URLs or branding
- Theme version is read from `style.css` in one place

### Fixed

- Muted and other custom text colours were overridden everywhere: a palette slug named `text` generated a `.has-text-color` rule that collides with a WordPress core class
- Line-height and letter-spacing rules were silently dropped (the preset variables never existed)
- Search results ignored the search term
- Blog home content sat underneath the fixed header
- Page transitions hijacked cmd/ctrl-click and middle-click
- Pattern and template markup that did not match its block attributes
- Hard-coded hex colours in patterns and footers replaced with slugs
- Split-list pattern filenames were swapped

### Removed

- All bundled photographs; replaced with original SVG placeholder artwork
- Trace sales copy in the demo patterns; replaced with neutral placeholder text
- Test page pattern
- theme.json entries WordPress ignored (malformed block style variations)

### Known issues

- Pattern text is not yet translatable


---

# [1.1.1] — 2026-03-06

## Fixed

- Cover block parallax style (`trace-parallax`) now works perfectly



# [1.1.0] — 2026-03-06

Milestone release capturing the latest stable architecture of the Trace theme.

This version represents the current development baseline before further styling improvements, bug fixes, and additional theme style variants are implemented.

### Added

- Core Full Site Editing theme structure
- Token-based colour palette system
- Global spacing system using REM units
- Typography presets and fluid typography scale
- Initial pattern library
- Header and footer pattern system
- Cover block parallax style (`trace-parallax`)
- Custom block styles for cards and components
- Initial mobile navigation structure
- Pattern categories for organised editor workflow

### Changed

- Colour palette refactored to align palette names with token slugs
- Improved block spacing behaviour across core blocks
- Theme.json structure reorganised to improve maintainability
- Pattern markup simplified to reduce unnecessary wrappers
- CSS architecture improved for token-driven design system

### Fixed

- Editor colour palette inconsistencies
- Pattern registration issues
- Layout width behaviour in wide and full-width blocks

### Known Issues

- Cover block parallax behaviour requires further refinement
- Group blocks sometimes ignore custom colour selections
- Inverted group style not yet implemented
- Mobile navigation requires styling and accordion improvements
- Pattern markup requires further cleanup and optimisation


---

# [1.0.0] — Initial Foundation

First working implementation of the Trace theme architecture.

### Added

- Basic WordPress Full Site Editing theme structure
- theme.json configuration
- Base CSS architecture
- Initial templates
- Pattern support
- Navigation setup


---

# Versioning Policy

Trace uses **Semantic Versioning**.

### Major Version

Breaking structural changes:

Examples

- Theme.json architecture changes
- CSS token system changes
- Pattern system restructuring
- Layout system changes


### Minor Version

New features or improvements:

Examples

- New block styles
- New theme styles
- New patterns
- Performance improvements
- UX improvements


### Patch Version

Bug fixes only:

Examples

- CSS fixes
- JavaScript fixes
- minor accessibility improvements
- layout corrections


---

# Notes

Trace is developed as a modern WordPress Full Site Editing theme with a focus on:

- Token-driven design systems
- Fluid typography
- Pattern-based layouts
- Performance-first CSS
- Block editor usability

The theme is designed to act as a **foundation for future derivative themes and industry-specific designs**.
