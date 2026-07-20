/**
 * Fase 8 — split conservador de app.css
 * - Extrae custom UPRIT (final del archivo) a uprit-custom.css
 * - Elimina bloques claramente no usados: RTL, theme preview (pv-*)
 * - Quita @import duplicado de Google Fonts (ya en principal.blade.php)
 *
 * Uso: node scripts/split-uprit-css.mjs
 */
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const root = path.join(__dirname, '..');
const appPath = path.join(root, 'public/web/assets/css/app.css');
const customPath = path.join(root, 'public/web/assets/css/uprit-custom.css');

/** Rangos 1-indexed inclusive (contenido del archivo original app.css) */
const REMOVE_RANGES = [
  { from: 19163, to: 20315, label: 'Theme preview / landing demo (.pv-*, .edublink-landing-page)' },
  { from: 37991, to: 41879, label: 'RTL (html[dir="rtl"] — no usado en vistas UPRIT)' },
];

const UPRIT_CUSTOM_FROM = 41881;

function spliceRange(lines, from, to) {
  return [...lines.slice(0, from - 1), ...lines.slice(to)];
}

let lines = fs.readFileSync(appPath, 'utf8').split(/\r?\n/);
const originalBytes = fs.statSync(appPath).size;
const originalLines = lines.length;

// 1. Extraer custom UPRIT
const customLines = lines.slice(UPRIT_CUSTOM_FROM - 1);
fs.writeFileSync(customPath, customLines.join('\n').trimEnd() + '\n', 'utf8');
lines = lines.slice(0, UPRIT_CUSTOM_FROM - 1);

// 2. Eliminar bloques demo / RTL (de mayor índice a menor)
for (const range of [...REMOVE_RANGES].sort((a, b) => b.from - a.from)) {
  lines = spliceRange(lines, range.from, range.to);
}

// 3. Quitar @import duplicado de fuentes
if (lines[0]?.startsWith('@import url(https://fonts.googleapis.com')) {
  lines.shift();
  if (lines[0] === '') lines.shift();
}

// 4. Quitar selectores pv-* del reset global (líneas ~185-189 originales)
lines = lines.filter(
  (line) =>
    !/^\.pv-(elementor-area|shop-area|inner-page-area|zoom-demo-area|cta-area)\b/.test(line.trim())
);

fs.writeFileSync(appPath, lines.join('\n').trimEnd() + '\n', 'utf8');

const newBytes = fs.statSync(appPath).size;
const customBytes = fs.statSync(customPath).size;

console.log('split-uprit-css.mjs');
console.log(`  app.css:     ${originalLines} líneas / ${(originalBytes / 1024).toFixed(1)} KB`);
console.log(`            → ${lines.length} líneas / ${(newBytes / 1024).toFixed(1)} KB`);
console.log(`  uprit-custom.css: ${customLines.length} líneas / ${(customBytes / 1024).toFixed(1)} KB`);
console.log(`  Eliminado de app.css: ~${((originalBytes - newBytes) / 1024).toFixed(1)} KB`);
console.log(`  Total descargado (app+custom): ~${((newBytes + customBytes) / 1024).toFixed(1)} KB`);
