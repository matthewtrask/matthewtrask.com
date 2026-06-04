#!/usr/bin/env node
// Registers new blog posts with standard.site (AT Protocol).
// Skips posts that already have atUri in frontmatter.
// Writes atUri directly into each new post's frontmatter.
// Usage: BSKY_APP_PASSWORD=your-app-password node standard-site-setup.mjs

import { readFileSync, writeFileSync, readdirSync } from 'fs';
import { join, basename } from 'path';
import { fileURLToPath } from 'url';

const HANDLE = 'matthewtrask.com';
const BASE_URL = 'https://matthewtrask.com';
const PUB_URI = 'at://did:plc:6qkqppcvfw5ngci5mvlzlfue/site.standard.publication/3mn5qh46tak2c';

const ROOT = fileURLToPath(new URL('.', import.meta.url));
const POSTS_DIR = join(ROOT, 'source/_posts');

function parseFrontmatter(content) {
  const match = content.match(/^---\n([\s\S]*?)\n---/);
  if (!match) return {};
  const data = {};
  for (const line of match[1].split('\n')) {
    const colon = line.indexOf(':');
    if (colon === -1) continue;
    data[line.slice(0, colon).trim()] = line.slice(colon + 1).trim();
  }
  return data;
}

function writeAtUri(content, uri) {
  // Insert atUri before the closing --- of the frontmatter block
  return content.replace(/(\n---\n)/, `\natUri: ${uri}\n---\n`);
}

async function resolveHandle(handle) {
  const res = await fetch(`https://bsky.social/xrpc/com.atproto.identity.resolveHandle?handle=${handle}`);
  if (!res.ok) throw new Error(`Failed to resolve handle: ${await res.text()}`);
  return (await res.json()).did;
}

async function getPdsEndpoint(did) {
  const res = await fetch(`https://plc.directory/${did}`);
  if (!res.ok) throw new Error(`Failed to fetch DID doc: ${await res.text()}`);
  const doc = await res.json();
  const service = doc.service?.find(s => s.type === 'AtprotoPersonalDataServer');
  if (!service) throw new Error('No PDS service found in DID doc');
  return service.serviceEndpoint;
}

async function createSession(pds, handle, password) {
  const res = await fetch(`${pds}/xrpc/com.atproto.server.createSession`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ identifier: handle, password }),
  });
  if (!res.ok) throw new Error(`Auth failed: ${await res.text()}`);
  return res.json();
}

async function createRecord(pds, token, did, collection, record) {
  const res = await fetch(`${pds}/xrpc/com.atproto.repo.createRecord`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`,
    },
    body: JSON.stringify({ repo: did, collection, record }),
  });
  if (!res.ok) throw new Error(`Failed to create ${collection}: ${await res.text()}`);
  return res.json();
}

async function main() {
  const appPassword = process.env.BSKY_APP_PASSWORD;
  if (!appPassword) {
    console.error('Error: set BSKY_APP_PASSWORD env var to your Bluesky app password.');
    console.error('Create one at: https://bsky.app/settings/app-passwords');
    process.exit(1);
  }

  const postFiles = readdirSync(POSTS_DIR).filter(f => f.endsWith('.md'));

  const newPosts = postFiles
    .map(file => {
      const content = readFileSync(join(POSTS_DIR, file), 'utf8');
      const fm = parseFrontmatter(content);
      return { file, content, fm };
    })
    .filter(({ fm }) => !fm.atUri && fm.published !== 'false');

  if (newPosts.length === 0) {
    console.log('No new posts to register.');
    return;
  }

  console.log(`Found ${newPosts.length} new post(s) to register.\n`);

  const did = await resolveHandle(HANDLE);
  const pds = await getPdsEndpoint(did);
  const { accessJwt: token } = await createSession(pds, HANDLE, appPassword);

  for (const { file, content, fm } of newPosts) {
    const filename = basename(file, '.md');
    const publishedAt = fm.date
      ? new Date(fm.date).toISOString()
      : new Date().toISOString();

    const result = await createRecord(pds, token, did, 'site.standard.document', {
      $type: 'site.standard.document',
      site: { $link: PUB_URI },
      title: fm.title?.replace(/^['"]|['"]$/g, '') ?? filename,
      path: `/blog/${filename}`,
      description: fm.description?.replace(/^['"]|['"]$/g, '') ?? '',
      publishedAt,
    });

    const updated = writeAtUri(content, result.uri);
    writeFileSync(join(POSTS_DIR, file), updated, 'utf8');
    console.log(`  ${file} → ${result.uri}`);
  }

  console.log('\nDone. Post files updated with atUri.');
}

main().catch(err => {
  console.error(err.message);
  process.exit(1);
});
