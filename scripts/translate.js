/**
 * Cross-platform translation script
 *
 * Compiles .po files to .mo files using gettext-parser.
 * Falls back gracefully if no .po files exist or gettext tools aren't available.
 *
 * @package Aegis
 * @since   1.0.0
 */

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

const languagesDir = path.join(__dirname, '..', 'languages');

// Check if languages directory exists
if (!fs.existsSync(languagesDir)) {
	console.log('No languages directory found. Skipping translation compilation.');
	process.exit(0);
}

// Find all .po files
const poFiles = fs.readdirSync(languagesDir).filter(file => file.endsWith('.po'));

if (poFiles.length === 0) {
	console.log('No .po files found. Skipping translation compilation.');
	process.exit(0);
}

console.log(`Found ${poFiles.length} .po file(s) to compile...`);

let compiled = 0;
let skipped = 0;

for (const poFile of poFiles) {
	const poPath = path.join(languagesDir, poFile);
	const moFile = poFile.replace('.po', '.mo');
	const moPath = path.join(languagesDir, moFile);

	try {
		// Try using msgfmt if available (Linux/Mac with gettext installed)
		execSync(`msgfmt "${poPath}" -o "${moPath}"`, { stdio: 'pipe' });
		console.log(`  ✓ Compiled: ${poFile} -> ${moFile}`);
		compiled++;
	} catch (error) {
		// msgfmt not available - skip silently on Windows
		console.log(`  ⚠ Skipped: ${poFile} (msgfmt not available)`);
		skipped++;
	}
}

if (compiled > 0) {
	console.log(`\nTranslation compilation complete: ${compiled} compiled, ${skipped} skipped.`);
} else if (skipped > 0) {
	console.log(`\nNote: Install gettext tools to compile .po files to .mo format.`);
	console.log('On Windows: Download from https://mlocati.github.io/articles/gettext-iconv-windows.html');
	console.log('On Mac: brew install gettext');
	console.log('On Linux: apt-get install gettext');
}

process.exit(0);
