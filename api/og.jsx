import { ImageResponse } from '@vercel/og';

export const config = { runtime: 'edge' };

async function fetchFont(name, weight) {
    const params = new URLSearchParams({ family: `${name}:wght@${weight}`, display: 'swap' });
    const css = await fetch(`https://fonts.googleapis.com/css2?${params}`, {
        headers: { 'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36' },
    }).then(r => r.text());

    const url = css.match(/src: url\((.+?)\) format\('woff2'\)/)?.[1];
    if (!url) throw new Error(`Font not found: ${name} ${weight}`);
    return fetch(url).then(r => r.arrayBuffer());
}

export default async function handler(req) {
    const { searchParams } = new URL(req.url);
    const title    = searchParams.get('title')    ?? 'Matthew Trask';
    const date     = searchParams.get('date')     ?? '';
    const category = searchParams.get('category') ?? '';

    const syneFont = await fetchFont('Syne', 700);

    const fontSize = title.length > 60 ? 42 : title.length > 40 ? 50 : 58;

    return new ImageResponse(
        <div style={{
            width: '100%',
            height: '100%',
            background: '#030712',
            display: 'flex',
            flexDirection: 'column',
            padding: '64px',
            position: 'relative',
        }}>
            {/* Signature gradient bar */}
            <div style={{
                position: 'absolute',
                top: 0, left: 0, right: 0,
                height: '4px',
                background: 'linear-gradient(to right, #06b6d4, #3b82f6, #6366f1)',
            }} />

            {/* Content pushed to bottom */}
            <div style={{ display: 'flex', flexDirection: 'column', flex: 1, justifyContent: 'flex-end' }}>

                {/* Meta: date · category */}
                {(date || category) && (
                    <div style={{ display: 'flex', alignItems: 'center', gap: '12px', marginBottom: '20px' }}>
                        {date && (
                            <span style={{ fontFamily: 'Syne', fontSize: '15px', color: '#4b5563', letterSpacing: '0.08em', textTransform: 'uppercase' }}>
                                {date}
                            </span>
                        )}
                        {date && category && (
                            <span style={{ color: '#1f2937', fontSize: '15px' }}>·</span>
                        )}
                        {category && (
                            <span style={{ fontFamily: 'Syne', fontSize: '15px', color: '#0891b2', letterSpacing: '0.04em' }}>
                                {category}
                            </span>
                        )}
                    </div>
                )}

                {/* Title */}
                <div style={{
                    fontFamily: 'Syne',
                    fontWeight: 700,
                    fontSize: `${fontSize}px`,
                    color: '#f9fafb',
                    lineHeight: 1.1,
                    letterSpacing: '-0.02em',
                    marginBottom: '44px',
                }}>
                    {title}
                </div>

                {/* Author */}
                <div style={{ display: 'flex', alignItems: 'center', gap: '10px' }}>
                    <div style={{ width: '6px', height: '6px', borderRadius: '50%', background: '#22d3ee' }} />
                    <span style={{ fontFamily: 'Syne', fontSize: '16px', color: '#6b7280', letterSpacing: '-0.01em' }}>
                        matthewtrask.com
                    </span>
                </div>

            </div>
        </div>,
        {
            width: 1200,
            height: 630,
            fonts: [{ name: 'Syne', data: syneFont, weight: 700 }],
        }
    );
}
