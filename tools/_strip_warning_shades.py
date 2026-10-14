#!/usr/bin/env python3
"""One-shot: remove warning-50/200/300/400/700/800/900/950 from style variations; remap CSS."""

from __future__ import annotations

import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
STYLES = ROOT / "styles"

REMOVED = (
	"warning-50",
	"warning-200",
	"warning-300",
	"warning-400",
	"warning-700",
	"warning-800",
	"warning-900",
	"warning-950",
)

PATTERN = re.compile(
	r'(?s)\s*\{\s*"name":\s*"Warning (950|900|800|700|400|300|200|50)",\s*'
	r'"slug":\s*"warning-(950|900|800|700|400|300|200|50)",\s*'
	r'"color":\s*"[^"]+"\s*\},?'
)

CSS_REPLACEMENTS = {
	"warning-950": "warning-600",
	"warning-900": "warning-600",
	"warning-800": "warning-600",
	"warning-700": "warning-600",
	"warning-400": "warning-500",
	"warning-300": "warning-100",
	"warning-200": "warning-100",
	"warning-50": "warning-100",
}


def strip_styles() -> int:
	changed = 0
	for path in STYLES.glob("*.json"):
		raw = path.read_text(encoding="utf-8")
		new = PATTERN.sub("", raw)
		if new == raw:
			continue
		new = re.sub(r",\s*,", ",", new)
		new = re.sub(r",(\s*\])", r"\1", new)
		path.write_text(new, encoding="utf-8")
		changed += 1
	return changed


def remap_css() -> list[str]:
	touched: list[str] = []
	for path in ROOT.rglob("*"):
		if path.suffix.lower() not in {".css", ".scss"}:
			continue
		if "node_modules" in path.parts:
			continue
		text = path.read_text(encoding="utf-8", errors="ignore")
		orig = text
		for old, new in CSS_REPLACEMENTS.items():
			text = text.replace(old, new)
		if text != orig:
			path.write_text(text, encoding="utf-8")
			touched.append(str(path.relative_to(ROOT)))
	return touched


def validate() -> tuple[list[str], list[str]]:
	bad: list[str] = []
	zinc: list[str] = []
	for path in STYLES.glob("*.json"):
		try:
			data = json.loads(path.read_text(encoding="utf-8"))
			slugs = [
				c["slug"]
				for c in data["settings"]["color"]["palette"]
				if c["slug"].startswith("warning-")
			]
			if path.name == "zinc.json":
				zinc = slugs
			if any(s in REMOVED for s in slugs):
				bad.append(f"{path.name}:{','.join(slugs)}")
		except Exception as exc:  # noqa: BLE001
			bad.append(f"{path.name}: {exc}")
	return zinc, bad


def main() -> None:
	print("styles updated", strip_styles())
	print("css touched", remap_css() or "none")
	zinc, bad = validate()
	print("zinc warning", zinc)
	print("bad", bad or "none")
	theme = json.loads((ROOT / "theme.json").read_text(encoding="utf-8"))
	print(
		"theme warning",
		[
			c["slug"]
			for c in theme["settings"]["color"]["palette"]
			if c["slug"].startswith("warning-")
		],
	)


if __name__ == "__main__":
	main()
