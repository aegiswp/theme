"""Verify style variation palettes after Tailwind alignment."""
import json
from pathlib import Path

styles_dir = Path(__file__).resolve().parent.parent / "styles"
theme = json.loads(
    (Path(__file__).resolve().parent.parent / "theme.json").read_text(encoding="utf-8")
)
theme_pal = {c["slug"]: c["color"].lower() for c in theme["settings"]["color"]["palette"]}

THEME_NEUTRAL = {k: v for k, v in theme_pal.items() if k.startswith("neutral-")}
INFO = ["info-100", "info-500", "info-600"]

TW_PRIMARY = {
    "zinc": {
        "50": "#fafafa",
        "100": "#f4f4f5",
        "200": "#e4e4e7",
        "300": "#d4d4d8",
        "400": "#a1a1aa",
        "500": "#71717a",
        "600": "#52525b",
        "700": "#3f3f46",
        "800": "#27272a",
        "900": "#18181b",
        "950": "#09090b",
    },
    "neutral": {
        "50": "#fafafa",
        "100": "#f5f5f5",
        "200": "#e5e5e5",
        "300": "#d4d4d4",
        "400": "#a3a3a3",
        "500": "#737373",
        "600": "#525252",
        "700": "#404040",
        "800": "#262626",
        "900": "#171717",
        "950": "#0a0a0a",
    },
    "stone": {
        "50": "#fafaf9",
        "100": "#f5f5f4",
        "200": "#e7e5e4",
        "300": "#d6d3d1",
        "400": "#a8a29e",
        "500": "#78716c",
        "600": "#57534e",
        "700": "#44403c",
        "800": "#292524",
        "900": "#1c1917",
        "950": "#0c0a09",
    },
    "slate": {
        "50": "#f8fafc",
        "100": "#f1f5f9",
        "200": "#e2e8f0",
        "300": "#cbd5e1",
        "400": "#94a3b8",
        "500": "#64748b",
        "600": "#475569",
        "700": "#334155",
        "800": "#1e293b",
        "900": "#0f172a",
        "950": "#020617",
    },
    "gray": {
        "50": "#f9fafb",
        "100": "#f3f4f6",
        "200": "#e5e7eb",
        "300": "#d1d5db",
        "400": "#9ca3af",
        "500": "#6b7280",
        "600": "#4b5563",
        "700": "#374151",
        "800": "#1f2937",
        "900": "#111827",
        "950": "#030712",
    },
    "amber": {
        "50": "#fffbeb",
        "100": "#fef3c7",
        "200": "#fde68a",
        "300": "#fcd34d",
        "400": "#fbbf24",
        "500": "#f59e0b",
        "600": "#d97706",
        "700": "#b45309",
        "800": "#92400e",
        "900": "#78350f",
        "950": "#451a03",
    },
    "emerald": {
        "50": "#ecfdf5",
        "100": "#d1fae5",
        "200": "#a7f3d0",
        "300": "#6ee7b7",
        "400": "#34d399",
        "500": "#10b981",
        "600": "#059669",
        "700": "#047857",
        "800": "#065f46",
        "900": "#064e3b",
        "950": "#022c22",
    },
    "fuchsia": {
        "50": "#fdf4ff",
        "100": "#fae8ff",
        "200": "#f5d0fe",
        "300": "#f0abfc",
        "400": "#e879f9",
        "500": "#d946ef",
        "600": "#c026d3",
        "700": "#a21caf",
        "800": "#86198f",
        "900": "#701a75",
        "950": "#4a044e",
    },
    "indigo": {
        "50": "#eef2ff",
        "100": "#e0e7ff",
        "200": "#c7d2fe",
        "300": "#a5b4fc",
        "400": "#818cf8",
        "500": "#6366f1",
        "600": "#4f46e5",
        "700": "#4338ca",
        "800": "#3730a3",
        "900": "#312e81",
        "950": "#1e1b4b",
    },
    "lime": {
        "50": "#f7fee7",
        "100": "#ecfccb",
        "200": "#d9f99d",
        "300": "#bef264",
        "400": "#a3e635",
        "500": "#84cc16",
        "600": "#65a30d",
        "700": "#4d7c0f",
        "800": "#3f6212",
        "900": "#365314",
        "950": "#1a2e05",
    },
    "rose": {
        "50": "#fff1f2",
        "100": "#ffe4e6",
        "200": "#fecdd3",
        "300": "#fda4af",
        "400": "#fb7185",
        "500": "#f43f5e",
        "600": "#e11d48",
        "700": "#be123c",
        "800": "#9f1239",
        "900": "#881337",
        "950": "#4c0519",
    },
    "sky": {
        "50": "#f0f9ff",
        "100": "#e0f2fe",
        "200": "#bae6fd",
        "300": "#7dd3fc",
        "400": "#38bdf8",
        "500": "#0ea5e9",
        "600": "#0284c7",
        "700": "#0369a1",
        "800": "#075985",
        "900": "#0c4a6e",
        "950": "#082f49",
    },
    "teal": {
        "50": "#f0fdfa",
        "100": "#ccfbf1",
        "200": "#99f6e4",
        "300": "#5eead4",
        "400": "#2dd4bf",
        "500": "#14b8a6",
        "600": "#0d9488",
        "700": "#0f766e",
        "800": "#115e59",
        "900": "#134e4a",
        "950": "#042f2e",
    },
    "violet": {
        "50": "#f5f3ff",
        "100": "#ede9fe",
        "200": "#ddd6fe",
        "300": "#c4b5fd",
        "400": "#a78bfa",
        "500": "#8b5cf6",
        "600": "#7c3aed",
        "700": "#6d28d9",
        "800": "#5b21b6",
        "900": "#4c1d95",
        "950": "#2e1065",
    },
}

EXPECTED = {
    "zinc": "zinc",
    "neutral": "neutral",
    "stone": "stone",
    "slate": "slate",
    "grayscale": "gray",
    "amber": "amber",
    "emerald": "emerald",
    "fuchsia": "fuchsia",
    "indigo": "indigo",
    "lime": "lime",
    "rose": "rose",
    "sky": "sky",
    "teal": "teal",
    "violet": "violet",
}


def palette_map(path: Path) -> dict[str, str]:
    data = json.loads(path.read_text(encoding="utf-8"))
    return {
        c["slug"]: c["color"].lower()
        for c in data["settings"]["color"]["palette"]
    }


def main() -> None:
    fails: list[str] = []
    neutral_ok = info_ok = warn_ok = 0

    for path in sorted(styles_dir.glob("*.json")):
        p = palette_map(path)
        if all(p.get(k) == v for k, v in THEME_NEUTRAL.items()):
            neutral_ok += 1
        else:
            fails.append(f"{path.stem}: neutral mismatch")
        if all(p.get(s) == theme_pal[s] for s in INFO):
            info_ok += 1
        else:
            fails.append(f"{path.stem}: info mismatch")
        if p.get("warning-100") == theme_pal["warning-100"]:
            warn_ok += 1
        else:
            fails.append(f"{path.stem}: warning-100={p.get('warning-100')}")

    print(f"Neutral aligned: {neutral_ok}/60")
    print(f"Info aligned: {info_ok}/60")
    print(f"warning-100 aligned: {warn_ok}/60")
    print("Tailwind-named primary:")
    for stem, fam in sorted(EXPECTED.items()):
        p = palette_map(styles_dir / f"{stem}.json")
        scale = TW_PRIMARY[fam]
        bad = [
            f"primary-{shade}"
            for shade, hx in scale.items()
            if p.get(f"primary-{shade}") != hx
        ]
        status = "OK" if not bad else "FIX"
        print(f"  {status} {stem}: mismatches={bad}")

    if fails:
        print("FAILURES:")
        for item in fails:
            print(" ", item)
        raise SystemExit(1)
    print("All checks passed")


if __name__ == "__main__":
    main()
