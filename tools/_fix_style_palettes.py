"""One-off: align style variation palettes to theme.json / Tailwind Neutral."""
import json
from pathlib import Path

styles_dir = Path(__file__).resolve().parent.parent / "styles"

# theme.json Neutral (Tailwind Neutral + AA neutral-400)
NEUTRAL = {
    "neutral-950": "#0a0a0a",
    "neutral-900": "#171717",
    "neutral-800": "#262626",
    "neutral-700": "#404040",
    "neutral-600": "#525252",
    "neutral-500": "#737373",
    "neutral-400": "#666666",
    "neutral-300": "#d4d4d4",
    "neutral-200": "#e5e5e5",
    "neutral-100": "#f5f5f5",
    "neutral-50": "#fafafa",
    "neutral-0": "#ffffff",
}

SEMANTIC = {
    "success-600": "#059669",
    "success-500": "#10b981",
    "success-100": "#d1fae5",
    "info-600": "#1166c2",
    "info-500": "#1e7ff0",
    "info-100": "#f3f9ff",
    "warning-600": "#d97706",
    "warning-500": "#f59e0b",
    "warning-100": "#feeac7",
    "error-600": "#e11d48",
    "error-500": "#f43f5e",
    "error-100": "#ffe4e6",
}

INFO_ENTRIES = [
    {"name": "Info 600", "slug": "info-600", "color": "#1166c2"},
    {"name": "Info 500", "slug": "info-500", "color": "#1e7ff0"},
    {"name": "Info 100", "slug": "info-100", "color": "#f3f9ff"},
]

# Tailwind Gray for grayscale primary
GRAY_PRIMARY = {
    "primary-950": "#030712",
    "primary-900": "#111827",
    "primary-800": "#1f2937",
    "primary-700": "#374151",
    "primary-600": "#4b5563",
    "primary-500": "#6b7280",
    "primary-400": "#9ca3af",
    "primary-300": "#d1d5db",
    "primary-200": "#e5e7eb",
    "primary-100": "#f3f4f6",
    "primary-50": "#f9fafb",
    "primary-25": "#fcfcfd",
}


def main() -> None:
    fixed = []
    for path in sorted(styles_dir.glob("*.json")):
        data = json.loads(path.read_text(encoding="utf-8"))
        palette = data.get("settings", {}).get("color", {}).get("palette")
        if not palette:
            continue

        changed = False
        has_info = any(c.get("slug", "").startswith("info-") for c in palette)
        new_palette = []

        for entry in palette:
            slug = entry.get("slug", "")
            color = entry.get("color", "")

            if slug in NEUTRAL and color.lower() != NEUTRAL[slug].lower():
                entry = {**entry, "color": NEUTRAL[slug]}
                changed = True
            elif slug in SEMANTIC and color.lower() != SEMANTIC[slug].lower():
                entry = {**entry, "color": SEMANTIC[slug]}
                changed = True
            elif (
                path.stem == "grayscale"
                and slug in GRAY_PRIMARY
                and color.lower() != GRAY_PRIMARY[slug].lower()
            ):
                entry = {**entry, "color": GRAY_PRIMARY[slug]}
                changed = True

            new_palette.append(entry)

            if slug == "success-100" and not has_info:
                new_palette.extend(INFO_ENTRIES)
                changed = True
                has_info = True

        if not has_info:
            final = []
            inserted = False
            for entry in new_palette:
                if entry.get("slug") == "warning-600" and not inserted:
                    final.extend(INFO_ENTRIES)
                    inserted = True
                    changed = True
                final.append(entry)
            new_palette = final

        if changed:
            data["settings"]["color"]["palette"] = new_palette
            with open(path, "w", encoding="utf-8", newline="\n") as fh:
                json.dump(data, fh, indent=4)
                fh.write("\n")
            fixed.append(path.name)

    print(f"Updated {len(fixed)} files")
    print(", ".join(fixed))


if __name__ == "__main__":
    main()
