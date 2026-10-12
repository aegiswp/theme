import json
from pathlib import Path

root = Path(__file__).resolve().parents[1]
t = json.loads((root / "theme.json").read_text(encoding="utf-8"))
p = t["settings"]["color"]["palette"]
print("palette_count", len(p))
for c in p:
	slug = c["slug"]
	if slug.startswith(("success-", "info-", "warning-", "error-")) or slug in (
		"transparent",
		"current",
		"inherit",
		"shadow",
	):
		print(slug, c.get("color"))

print("nvmrc", (root / ".nvmrc").read_text(encoding="utf-8").strip())
for line in (root / "style.css").read_text(encoding="utf-8", errors="ignore").splitlines()[:30]:
	if any(k in line for k in ("Version", "Requires", "Tested", "Text Domain")):
		print(line)

for d in [
	"vendor/aegis/framework",
	"vendor/aegis/icons",
	"vendor/aegis/container",
	"vendor/aegis/dom",
	"vendor/aegis/hooks",
	"vendor/aegis/utilities",
	"tests/Unit",
]:
	print(d, (root / d).exists())

# Check README / DESIGN for transparent palette claim vs theme
design = (root / "DESIGN.md").read_text(encoding="utf-8")
print("DESIGN has transparent utility row", "| `transparent`" in design)
print("AGENTS transparent claim", "transparent" in (root / "AGENTS.md").read_text(encoding="utf-8").split("### Colours")[1].split("### Spacing")[0])
