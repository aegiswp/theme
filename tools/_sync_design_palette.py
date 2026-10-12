"""Rewrite DESIGN.md colour tables from theme.json with intact Markdown."""

from __future__ import annotations

import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
palette = {
	c["slug"]: c["color"]
	for c in json.loads((ROOT / "theme.json").read_text(encoding="utf-8"))[
		"settings"
	]["color"]["palette"]
}

# Tailwind / reference hexes for the third column (Zinc / Neutral / Emerald /
# Amber / Rose where the theme still tracks them; Info uses labels).
TAILWIND_REF = {
	"primary-25": "#fcfcfd",
	"primary-50": "#fafafa",
	"primary-100": "#f4f4f5",
	"primary-200": "#e4e4e7",
	"primary-300": "#d4d4d8",
	"primary-400": "#a1a1aa",
	"primary-500": "#71717a",
	"primary-600": "#52525b",
	"primary-700": "#3f3f46",
	"primary-800": "#27272a",
	"primary-900": "#18181b",
	"primary-950": "#09090b",
	"neutral-0": "#ffffff",
	"neutral-50": "#fafafa",
	"neutral-100": "#f5f5f5",
	"neutral-200": "#e5e5e5",
	"neutral-300": "#d4d4d4",
	"neutral-400": "#a3a3a3",
	"neutral-500": "#737373",
	"neutral-600": "#525252",
	"neutral-700": "#404040",
	"neutral-800": "#262626",
	"neutral-900": "#171717",
	"neutral-950": "#0a0a0a",
	"success-100": "#d1fae5",
	"success-500": "#10b981",
	"success-600": "#059669",
	"warning-100": "#ffedd5",
	"warning-500": "#f59e0b",
	"warning-600": "#d97706",
	"error-100": "#ffe4e6",
	"error-500": "#f43f5e",
	"error-600": "#e11d48",
}

INFO_LABEL = {
	"info-100": "Light",
	"info-500": "Base",
	"info-600": "Dark (deepest Info step)",
}

colour_section = f"""## Colour Palette

The palette is organised into semantic groups. **Primary** and **Neutral** use a full Tailwind-style step scale (Primary includes `25`; Neutral includes `0`). **Success**, **Info**, **Warning**, and **Error** each ship only **`100` / `500` / `600`**. Lower numbers are lighter; higher numbers are darker.

### Primary — Tailwind Zinc

Used for branded UI elements, interactive controls, and the default text/surface hierarchy.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `primary-25` | `{palette["primary-25"]}` | `{TAILWIND_REF["primary-25"]}` |
| `primary-50` | `{palette["primary-50"]}` | `{TAILWIND_REF["primary-50"]}` |
| `primary-100` | `{palette["primary-100"]}` | `{TAILWIND_REF["primary-100"]}` |
| `primary-200` | `{palette["primary-200"]}` | `{TAILWIND_REF["primary-200"]}` |
| `primary-300` | `{palette["primary-300"]}` | `{TAILWIND_REF["primary-300"]}` |
| `primary-400` | `{palette["primary-400"]}` | `{TAILWIND_REF["primary-400"]}` |
| `primary-500` | `{palette["primary-500"]}` | `{TAILWIND_REF["primary-500"]}` |
| `primary-600` | `{palette["primary-600"]}` | `{TAILWIND_REF["primary-600"]}` |
| `primary-700` | `{palette["primary-700"]}` | `{TAILWIND_REF["primary-700"]}` |
| `primary-800` | `{palette["primary-800"]}` | `{TAILWIND_REF["primary-800"]}` |
| `primary-900` | `{palette["primary-900"]}` | `{TAILWIND_REF["primary-900"]}` |
| `primary-950` | `{palette["primary-950"]}` | `{TAILWIND_REF["primary-950"]}` |

### Neutral — Tailwind Neutral

Pure grays with no hue tint. Used for body text, borders, backgrounds, and surfaces.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `neutral-0` | `{palette["neutral-0"]}` | `{TAILWIND_REF["neutral-0"]}` |
| `neutral-50` | `{palette["neutral-50"]}` | `{TAILWIND_REF["neutral-50"]}` |
| `neutral-100` | `{palette["neutral-100"]}` | `{TAILWIND_REF["neutral-100"]}` |
| `neutral-200` | `{palette["neutral-200"]}` | `{TAILWIND_REF["neutral-200"]}` |
| `neutral-300` | `{palette["neutral-300"]}` | `{TAILWIND_REF["neutral-300"]}` |
| `neutral-400` | `{palette["neutral-400"]}` | `{TAILWIND_REF["neutral-400"]}` |
| `neutral-500` | `{palette["neutral-500"]}` | `{TAILWIND_REF["neutral-500"]}` |
| `neutral-600` | `{palette["neutral-600"]}` | `{TAILWIND_REF["neutral-600"]}` |
| `neutral-700` | `{palette["neutral-700"]}` | `{TAILWIND_REF["neutral-700"]}` |
| `neutral-800` | `{palette["neutral-800"]}` | `{TAILWIND_REF["neutral-800"]}` |
| `neutral-900` | `{palette["neutral-900"]}` | `{TAILWIND_REF["neutral-900"]}` |
| `neutral-950` | `{palette["neutral-950"]}` | `{TAILWIND_REF["neutral-950"]}` |

### Success — Tailwind Green

Positive feedback states: confirmations, availability, valid inputs.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `success-100` | `{palette["success-100"]}` | `{TAILWIND_REF["success-100"]}` |
| `success-500` | `{palette["success-500"]}` | `{TAILWIND_REF["success-500"]}` |
| `success-600` | `{palette["success-600"]}` | `{TAILWIND_REF["success-600"]}` |

### Info — Blue

Informational accents and status.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `info-100` | `{palette["info-100"]}` | {INFO_LABEL["info-100"]} |
| `info-500` | `{palette["info-500"]}` | {INFO_LABEL["info-500"]} |
| `info-600` | `{palette["info-600"]}` | {INFO_LABEL["info-600"]} |

### Warning — Tailwind Orange

Caution states: non-blocking alerts, pending actions, low-stock notices.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `warning-100` | `{palette["warning-100"]}` | `{TAILWIND_REF["warning-100"]}` |
| `warning-500` | `{palette["warning-500"]}` | `{TAILWIND_REF["warning-500"]}` |
| `warning-600` | `{palette["warning-600"]}` | `{TAILWIND_REF["warning-600"]}` |

### Error — Tailwind Red

Destructive and error states: validation failures, deletions, critical alerts.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `error-100` | `{palette["error-100"]}` | `{TAILWIND_REF["error-100"]}` |
| `error-500` | `{palette["error-500"]}` | `{TAILWIND_REF["error-500"]}` |
| `error-600` | `{palette["error-600"]}` | `{TAILWIND_REF["error-600"]}` |

### Utility Colours

Special-purpose tokens with no numeric step.

| Slug | Value | Use |
|------|-------|-----|
| `transparent` | `{palette["transparent"]}` | Transparent backgrounds / overlays |
| `current` | `{palette["current"]}` | Inherit parent text colour |
| `inherit` | `{palette["inherit"]}` | Inherit parent colour |
| `shadow` | `{palette["shadow"]}` | Shared shadow tint |

---
"""

design_path = ROOT / "DESIGN.md"
text = design_path.read_text(encoding="utf-8")
text2, n = re.subn(
	r"## Colour Palette\n.*?^---\n",
	colour_section,
	text,
	count=1,
	flags=re.M | re.S,
)
if n != 1:
	raise SystemExit(f"Expected 1 colour section replace, got {n}")
design_path.write_text(text2, encoding="utf-8")
print("palette", len(palette))
print("rewrote DESIGN.md colour section")
