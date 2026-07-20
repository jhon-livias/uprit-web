/**
 * Audita marcadores de vendors en vistas web (grep-style).
 * Uso: node scripts/audit-web-vendors.mjs
 */
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const viewsDir = path.join(__dirname, '../resources/views/web');

const markers = {
  magnifypopup: ['video-popup-activation', 'magnificPopup', 'mfp-'],
  odometer: ['odometer', 'counter-item', 'data-odometer', 'edu-counterup', 'counterup'],
  lightbox: ['blog-gallery-activation', 'lightbox', 'animated-thumbnials', 'masonry-gallery'],
  jqueryUi: ['slider-range', 'ui-slider', 'ui-datepicker', 'jquery-ui'],
  tipped: ['feature-card', 'data-tipped', 'Tipped'],
  countdown: ['countdown', 'coming-countdown'],
  isotope: ['isotope', 'masonry-item', 'masonry-gallery', 'isotope-wrapper'],
  svgInject: ['svgInject'],
  parallax: ['scene', 'paralax'],
  vivus: ['edublink-svg-animate', 'feature-icon'],
};

function walk(dir) {
  const out = [];
  for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, entry.name);
    if (entry.isDirectory()) out.push(...walk(full));
    else if (entry.name.endsWith('.blade.php')) out.push(full);
  }
  return out;
}

const files = walk(viewsDir);
const hits = Object.fromEntries(Object.keys(markers).map((k) => [k, new Set()]));

for (const file of files) {
  const content = fs.readFileSync(file, 'utf8');
  const rel = path.relative(path.join(__dirname, '..'), file).replace(/\\/g, '/');
  for (const [vendor, patterns] of Object.entries(markers)) {
    for (const pattern of patterns) {
      if (content.includes(pattern)) hits[vendor].add(rel);
    }
  }
}

console.log('Vendor usage in resources/views/web:\n');
for (const [vendor, set] of Object.entries(hits)) {
  const list = [...set];
  console.log(`${vendor}: ${list.length ? list.join(', ') : '(ninguna vista)'}`);
}
