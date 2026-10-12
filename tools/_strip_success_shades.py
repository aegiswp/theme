#!/usr/bin/env python3
"""One-shot: remove success-50/200/300/400 from style variations; remap CSS refs."""

from __future__ import annotations

import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
STYLES = ROOT / "styles"

PATTERN = re.compile(
	r'(?s)\s*\{\s*"name":\s*"Success (400|300|200|50)",\s*'
	r'"slug":\s*"success-(400|300|200|50)",\s*'
	r'"color":\s*"[^"]+"\s*\},?'
)

REMOVED = ("success-50", "success-200", "success-300", "success-400")
# Lightest remaining light step is success-100; mid accents map to success-500.
CSS_REPLACEMENTS = {
	"success-400": "success-500",
	"success-300": "success-100",
	"success-200": "success-100",
	"success-50": "success-100",
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


def validate() -> list[str]:
	bad: list[str] = []
	zinc_slugs: list[str] = []
	for path in STYLES.glob("*.json"):
		try:
			data = json.loads(path.read_text(encoding="utf-8"))
			slugs = [
				c["slug"]
				for c in data["settings"]["color"]["palette"]
				if c["slug"].startswith("success-")
			]
			if path.name == "zinc.json":
				zinc_slugs = slugs
			if any(s in REMOVED for s in slugs):
				bad.append(f"{path.name}:{','.join(slugs)}")
		except Exception as exc:  # noqa: BLE001
			bad.append(f"{path.name}: {exc}")
	print("zinc success", zinc_slugs)
	return bad


def main() -> None:
	print("styles updated", strip_styles())
	print("css touched", remap_css() or "none")
	print("bad", validate() or "none")


if __name__ == "__main__":
	main()
